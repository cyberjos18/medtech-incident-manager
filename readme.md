# DGMTM

Aplicación web para la **gestión de solicitudes de mantenimiento de equipos**: registro de equipos por centro/localidad, creación y seguimiento de solicitudes de servicio, autorizaciones y reportes de proveedores.

Construida sobre **Laravel 5.1** (PHP), siguiendo el patrón **MVC** clásico del framework.

## Contenido

- [Stack técnico](#stack-técnico)
- [Arquitectura y módulos](#arquitectura-y-módulos)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Comandos útiles](#comandos-útiles)
- [Estructura del proyecto](#estructura-del-proyecto)
- [Multilenguaje](#multilenguaje)
- [Tests](#tests)

## Stack técnico

| Componente | Tecnología |
|---|---|
| Framework | Laravel 5.1 (`laravel/framework`) |
| Lenguaje | PHP >= 5.5.9 |
| Autenticación | `laravel/framework` Auth (guard por sesión) |
| Vistas | Blade — plantilla admin **SB Admin 2** (Bootstrap) |
| Assets | Gulp + Laravel Elixir (compilación de LESS) |
| Base de datos | MySQL (ver `config/database.php`) |
| Multilenguaje | Middleware propio `LangMiddleware` (es/en) |
| Generación de modelos | `ignasbernotas/laravel-model-generator` |
| Testing | [Pest](https://pestphp.com) (ver [Tests](#tests)) |

## Arquitectura y módulos

El proyecto sigue **MVC**: `app/Http/Controllers` (Controladores), `app/*.php` (Modelos Eloquent en el namespace raíz `dgmtm`) y `resources/views` (Vistas Blade).

Los controladores están organizados por módulo de negocio bajo `app/Http/Controllers`:

- **`Auth/`** — Login, logout y recuperación de contraseña.
- **`Home/`** — Dashboard principal (`HomeController`), valida el estatus del usuario (Activo/Inactivo) antes de mostrar el panel.
- **`Maestros/`** — Catálogos maestros: `Centro`, `Estado`, `Localidad`, `Categoria`, `Proveedor`, `Servicio`, `TipoEquipo`, `User` (usuarios).
- **`Inventario/`** — Gestión del inventario de `Equipo`s.
- **`Solicitudes/`** — Alta y seguimiento de `Solicitud`es de servicio sobre uno o varios equipos (tabla pivote `EquipoSolicitud`).
- **`Autorizaciones/`** — Aprobación/autorización de solicitudes (`Autorizacion`).

### Modelo de dominio (resumen)

`Centro` (con `Localidad`) → tiene `Equipo`s (de un `TipoEquipo`, en una `Categoria`, atendidos por un `Proveedor`) → sobre los que se abren `Solicitud`es de `Servicio` → que pasan por `Estado`s y requieren `Autorizacion` → y generan `ReporteProveedor`.

Las rutas (`app/Http/routes.php`) están agrupadas por prefijo y namespace por módulo (`maestros`, `inventario`, `solicitudes`, `autorizaciones`), todas bajo el middleware `language`.

## Requisitos

- **PHP 7.4** (recomendado). Laravel 5.1 usa APIs internas (resolución de dependencias por reflexión) incompatibles con PHP 8+: bajo PHP 8.x, `php artisan` falla con un error fatal. Usa una instalación de PHP 7.x para `artisan`, Composer y los tests de este proyecto (con WAMP: `wamp64/bin/php/php7.4.33/php.exe`).
- Composer
- MySQL
- Node.js + npm (solo si se van a recompilar los assets con Gulp)
- Servidor web (Apache/WAMP o `php artisan serve`)

## Instalación

```bash
# 1. Instalar dependencias PHP (usando un PHP 7.4, ver Requisitos)
composer install

# 2. Copiar el archivo de entorno y generar la clave de la app
cp .env.example .env
php artisan key:generate

# 3. Configurar la base de datos en .env (ver sección Configuración)

# 4. Ejecutar las migraciones
php artisan migrate

# 5. (Opcional) Cargar datos de prueba
php artisan db:seed

# 6. Instalar dependencias front-end y compilar assets (opcional)
npm install
gulp
```

Levanta el servidor de desarrollo con:

```bash
php artisan serve
```

O configura un VirtualHost apuntando a la carpeta `public/`.

## Configuración

Variables principales del archivo `.env`:

```
APP_ENV=local
APP_DEBUG=true
APP_KEY=

DB_HOST=localhost
DB_DATABASE=nombre_bd
DB_USERNAME=usuario
DB_PASSWORD=clave

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

MAIL_DRIVER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
```

> El usuario administrador inicial y su contraseña se definen al ejecutar el seeder de la base de datos; no se documentan credenciales en este README por seguridad.

## Comandos útiles

```bash
php artisan migrate            # Ejecutar migraciones pendientes
php artisan migrate:rollback   # Revertir última tanda de migraciones
php artisan db:seed            # Cargar datos iniciales
php artisan route:list         # Ver todas las rutas registradas
php artisan clear-compiled     # Limpiar clases compiladas
php artisan optimize           # Optimizar el autoloader/framework
```

## Estructura del proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/            # Autenticación y contraseñas
│   │   ├── Home/            # Dashboard
│   │   ├── Maestros/        # Catálogos: centros, estados, localidades, etc.
│   │   ├── Inventario/      # Equipos
│   │   ├── Solicitudes/     # Solicitudes de servicio
│   │   └── Autorizaciones/  # Autorizaciones
│   ├── Middleware/          # Auth, LangMiddleware, CSRF, etc.
│   └── routes.php
├── *.php                    # Modelos Eloquent (Centro, Equipo, Solicitud, ...)
database/
├── migrations/
└── seeds/
resources/
├── lang/                    # es/en
└── views/                   # Blade, plantilla SB Admin 2
```

## Multilenguaje

La aplicación soporta **español** e **inglés**. El idioma se guarda en sesión y se cambia desde la ruta `lang/{es|en}`; el middleware `LangMiddleware` aplica el locale en cada request. Las traducciones están en `resources/lang/es` y `resources/lang/en`.

## Tests

Los tests usan **[Pest](https://pestphp.com)**, pero viven en un **proyecto Composer aislado** dentro de `testing/`, con su propio `vendor/`. Es necesario porque Pest depende (vía `nunomaduro/collision`) de `symfony/console` ^5, mientras que Laravel 5.1 fija `symfony/console` en la v2.7: ambos no pueden convivir en el mismo `vendor/`. `testing/tests/TestCase.php` arranca la app real (`bootstrap/app.php`) a mano dentro de cada test y expone helpers de request (`get`, `post`) y de sesión (`actingAs`, `withCsrfToken`).

Los tests corren contra una base de datos MySQL de prueba dedicada (se recrea desde cero en cada test aplicando las migraciones), no contra SQLite, para evitar diferencias de compatibilidad con `ENUM`, motor `InnoDB` y claves foráneas.

### Preparar el entorno de test (una sola vez)

```bash
# Base de datos y usuario dedicados para los tests
mysql -u root -e "CREATE DATABASE IF NOT EXISTS dgmtm_testing CHARACTER SET utf8 COLLATE utf8_unicode_ci;
CREATE USER IF NOT EXISTS 'dgmtm_test'@'localhost' IDENTIFIED BY 'dgmtm_test';
GRANT ALL PRIVILEGES ON dgmtm_testing.* TO 'dgmtm_test'@'localhost';"

# Instalar Pest en su arbol de dependencias aislado
cd testing
php7.4 composer.phar install   # o: composer install, usando un PHP 7.4
```

Las credenciales se pueden sobrescribir con las variables de entorno `DB_TEST_HOST`, `DB_TEST_DATABASE`, `DB_TEST_USERNAME`, `DB_TEST_PASSWORD` (conexión de la app) y `DB_TEST_ROOT_USERNAME`/`DB_TEST_ROOT_PASSWORD` (usadas solo para recrear la base de datos antes de cada test).

### Ejecutar la suite

```bash
cd testing
php7.4 vendor/bin/pest
```

(sustituye `php7.4` por la ruta a tu binario de PHP 7.x si no está en el `PATH`, p. ej. `wamp64/bin/php/php7.4.33/php.exe`).

### Estructura

```
testing/
├── composer.json      # solo pestphp/pest y mockery, aislado del composer.json raiz
├── phpunit.xml
└── tests/
    ├── Pest.php
    ├── TestCase.php    # arranca la app, helpers de request/BD/factories
    ├── Unit/           # Modelos, reglas de validacion, middleware
    └── Feature/        # Login, dashboard, end-to-end via el HTTP Kernel
```

## Créditos

Plantilla de administración basada en [SB Admin 2](http://startbootstrap.com/template-overviews/sb-admin-2/) por Start Bootstrap, sobre el framework [Laravel](https://laravel.com).
