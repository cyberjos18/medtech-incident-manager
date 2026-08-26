<?php

use Illuminate\Contracts\Console\Kernel as ConsoleKernelContract;
use Illuminate\Contracts\Http\Kernel as HttpKernelContract;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Base de test propia: Illuminate\Foundation\Testing\TestCase (la de Laravel 5.1)
 * extiende PHPUnit_Framework_TestCase, la clase sin namespace de PHPUnit 4/5.
 * Pest usa PHPUnit 9, donde esa clase ya no existe, así que no se puede reutilizar
 * la base de tests de Laravel aqui: arrancamos la app a mano y replicamos solo
 * lo que necesitamos (dispatch de requests, reset de BD).
 */
class TestCase extends BaseTestCase
{
    /** @var \Illuminate\Foundation\Application */
    protected $app;

    /** @var \Illuminate\Http\Response */
    protected $response;

    protected function setUp(): void
    {
        parent::setUp();

        $appRoot = dirname(__DIR__, 2);

        require_once $appRoot.'/vendor/autoload.php';

        putenv('APP_ENV=testing');

        $app = require $appRoot.'/bootstrap/app.php';
        $app->make(ConsoleKernelContract::class)->bootstrap();

        $app['config']->set('database.default', 'mysql_testing');
        $app['config']->set('database.connections.mysql_testing', [
            'driver'    => 'mysql',
            'host'      => getenv('DB_TEST_HOST') ?: '127.0.0.1',
            'database'  => getenv('DB_TEST_DATABASE') ?: 'dgmtm_testing',
            'username'  => getenv('DB_TEST_USERNAME') ?: 'dgmtm_test',
            'password'  => getenv('DB_TEST_PASSWORD') ?: 'dgmtm_test',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,
        ]);

        $app['config']->set('session.driver', 'array');
        $app['config']->set('cache.driver', 'array');

        $this->app = $app;

        $this->resetDatabase($appRoot);
    }

    protected function tearDown(): void
    {
        if ($this->app) {
            $this->app->flush();
            $this->app = null;
        }

        if (class_exists('Mockery')) {
            Mockery::close();
        }

        parent::tearDown();
    }

    /**
     * Recrea la base de datos de test desde cero y aplica las migraciones
     * "a mano" (instanciando cada Migration y llamando a up()), sin pasar
     * por Artisan: el Kernel de consola de Laravel carga clases de
     * Symfony Console, que en este proceso son las de Pest (v5.x) y no las
     * de la app (v2.7), y no son compatibles entre si.
     */
    protected function resetDatabase($appRoot)
    {
        $host = getenv('DB_TEST_HOST') ?: '127.0.0.1';
        $database = getenv('DB_TEST_DATABASE') ?: 'dgmtm_testing';

        $pdo = new PDO(
            'mysql:host='.$host,
            getenv('DB_TEST_ROOT_USERNAME') ?: 'root',
            getenv('DB_TEST_ROOT_PASSWORD') ?: ''
        );
        $pdo->exec('DROP DATABASE IF EXISTS `'.$database.'`');
        $pdo->exec('CREATE DATABASE `'.$database.'` CHARACTER SET utf8 COLLATE utf8_unicode_ci');

        $files = glob($appRoot.'/database/migrations/*.php');
        sort($files);

        foreach ($files as $file) {
            require_once $file;

            $name = preg_replace('/^\d{4}_\d{2}_\d{2}_\d{6}_/', '', basename($file, '.php'));
            $class = Str::studly($name);

            (new $class())->up();
        }
    }

    public function get($uri, array $headers = [])
    {
        return $this->call('GET', $uri, [], [], [], $this->transformHeaders($headers));
    }

    public function post($uri, array $data = [], array $headers = [])
    {
        return $this->call('POST', $uri, $data, [], [], $this->transformHeaders($headers));
    }

    /**
     * Equivalente simplificado de Illuminate\Foundation\Testing\CrawlerTrait::call().
     */
    public function call($method, $uri, $parameters = [], $cookies = [], $files = [], $server = [], $content = null)
    {
        $kernel = $this->app->make(HttpKernelContract::class);

        $request = Request::create($uri, $method, $parameters, $cookies, $files, $server, $content);

        $response = $kernel->handle($request);

        $kernel->terminate($request, $response);

        return $this->response = $response;
    }

    protected function transformHeaders(array $headers)
    {
        $server = [];

        foreach ($headers as $name => $value) {
            $name = strtoupper(str_replace('-', '_', $name));

            $server[Str::startsWith($name, 'CONTENT_') ? $name : 'HTTP_'.$name] = $value;
        }

        return $server;
    }

    protected function createUser(array $attributes = [])
    {
        // estatus no esta en $fillable, se asigna a mano (igual que estatus_equipo en Equipo).
        $estatus = $attributes['estatus'] ?? 'Activo';
        unset($attributes['estatus']);

        $user = new dgmtm\User(array_merge([
            'name' => 'Usuario de prueba',
            'email' => 'user'.uniqid().'@example.com',
            'password' => Hash::make('secret123'),
            'perfil_user' => 'Administrador',
        ], $attributes));

        $user->estatus = $estatus;
        $user->save();

        return $user;
    }

    /**
     * VerifyCsrfToken es middleware global en esta version de Laravel (no hay
     * bypass automatico para tests), asi que los POST necesitan un token
     * valido tomado de la misma sesion que usara la request.
     */
    protected function withCsrfToken(array $data = [])
    {
        $session = $this->app['session']->driver();
        $session->start();

        $data['_token'] = $session->token();

        return $data;
    }

    protected function actingAs($user, $driver = null)
    {
        $this->app['auth']->driver($driver)->setUser($user);

        return $this;
    }

    protected function createEstado(array $attributes = [])
    {
        return dgmtm\Estado::create(array_merge([
            'nomb_estado' => 'Estado '.uniqid(),
        ], $attributes));
    }

    protected function createLocalidad(array $attributes = [])
    {
        return dgmtm\Localidad::create(array_merge([
            'estado_id' => $this->createEstado()->id,
            'nomb_localidad' => 'Localidad '.uniqid(),
        ], $attributes));
    }

    protected function createCategoria(array $attributes = [])
    {
        // nomb_categoria es varchar(10) en la BD real.
        return dgmtm\Categoria::create(array_merge([
            'nomb_categoria' => substr(uniqid(), -8),
        ], $attributes));
    }

    protected function createCentro(array $attributes = [])
    {
        return dgmtm\Centro::create(array_merge([
            'nomb_centro' => 'Centro '.uniqid(),
            'estado_id' => $this->createEstado()->id,
            'localidad_id' => $this->createLocalidad()->id,
            'categoria_id' => $this->createCategoria()->id,
            'director_centro' => 'Director '.uniqid(),
        ], $attributes));
    }

    protected function createProveedor(array $attributes = [])
    {
        return dgmtm\Proveedor::create(array_merge([
            'rif_proveedor' => 'J-'.rand(10000000, 99999999),
            'nomb_proveedor' => 'Proveedor '.uniqid(),
            'telf_proveedor' => '0212-1234567',
            'correo_proveedor' => 'proveedor'.uniqid().'@example.com',
            'contacto_proveedor' => 'Contacto '.uniqid(),
        ], $attributes));
    }

    protected function createServicio(array $attributes = [])
    {
        return dgmtm\Servicio::create(array_merge([
            'centro_id' => $this->createCentro()->id,
            'nomb_servicio' => 'Servicio '.uniqid(),
        ], $attributes));
    }

    protected function createTipoEquipo(array $attributes = [])
    {
        return dgmtm\TipoEquipo::create(array_merge([
            'tipo_equipo' => 'Tipo '.uniqid(),
        ], $attributes));
    }

    protected function createEquipo(array $attributes = [])
    {
        // estatus_equipo no esta en $fillable (el controlador lo asigna a mano,
        // ver InventarioController), asi que no se puede pasar por create().
        $estatus = $attributes['estatus_equipo'] ?? 'Activo';
        unset($attributes['estatus_equipo']);

        $equipo = new dgmtm\Equipo(array_merge([
            'centro_id' => $this->createCentro()->id,
            'servicio_id' => $this->createServicio()->id,
            'tipoequipo_id' => $this->createTipoEquipo()->id,
            'marca_equipo' => 'Marca',
            'modelo_equipo' => 'Modelo',
            'serial_equipo' => 'S'.uniqid(),
            'bien_nacional' => 'B'.uniqid(),
            'equipo_garantia' => 'NO',
        ], $attributes));

        $equipo->estatus_equipo = $estatus;
        $equipo->save();

        return $equipo;
    }
}
