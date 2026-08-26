# DGMTM

Web application for **managing equipment maintenance requests**: equipment registration by center/location, creation and tracking of service requests, authorizations, and provider reports.

Built on **Laravel 5.1** (PHP), following the framework's classic **MVC** pattern.

## Contents

- [Tech stack](#tech-stack)
- [Architecture and modules](#architecture-and-modules)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Useful commands](#useful-commands)
- [Project structure](#project-structure)
- [Multilanguage](#multilanguage)
- [Tests](#tests)

## Tech stack

| Component | Technology |
|---|---|
| Framework | Laravel 5.1 (`laravel/framework`) |
| Language | PHP >= 5.5.9 |
| Authentication | `laravel/framework` Auth (session guard) |
| Views | Blade — **SB Admin 2** admin template (Bootstrap) |
| Assets | Gulp + Laravel Elixir (LESS compilation) |
| Database | MySQL (see `config/database.php`) |
| Multilanguage | Custom `LangMiddleware` middleware (es/en) |
| Model generation | `ignasbernotas/laravel-model-generator` |
| Testing | [Pest](https://pestphp.com) (see [Tests](#tests)) |

## Architecture and modules

The project follows **MVC**: `app/Http/Controllers` (Controllers), `app/*.php` (Eloquent models in the root `dgmtm` namespace), and `resources/views` (Blade views).

Controllers are organized by business module under `app/Http/Controllers`:

- **`Auth/`** — Login, logout, and password recovery.
- **`Home/`** — Main dashboard (`HomeController`), validates the user's status (Active/Inactive) before showing the panel.
- **`Maestros/`** — Master catalogs: `Centro`, `Estado`, `Localidad`, `Categoria`, `Proveedor`, `Servicio`, `TipoEquipo`, `User` (users).
- **`Inventario/`** — Management of the `Equipo` inventory.
- **`Solicitudes/`** — Creation and tracking of `Solicitud`es (service requests) for one or more pieces of equipment (pivot table `EquipoSolicitud`).
- **`Autorizaciones/`** — Approval/authorization of requests (`Autorizacion`).

### Domain model (summary)

`Centro` (with `Localidad`) → has `Equipo`s (of a `TipoEquipo`, in a `Categoria`, serviced by a `Proveedor`) → on which `Solicitud`es for a `Servicio` are opened → which go through `Estado`s and require `Autorizacion` → and generate a `ReporteProveedor`.

Routes (`app/Http/routes.php`) are grouped by prefix and namespace per module (`maestros`, `inventario`, `solicitudes`, `autorizaciones`), all under the `language` middleware.

## Requirements

- **PHP 7.4** (recommended). Laravel 5.1 uses internal APIs (reflection-based dependency resolution) that are incompatible with PHP 8+: under PHP 8.x, `php artisan` fails with a fatal error. Use a PHP 7.x installation for `artisan`, Composer, and this project's tests (with WAMP: `wamp64/bin/php/php7.4.33/php.exe`).
- Composer
- MySQL
- Node.js + npm (only if assets need to be recompiled with Gulp)
- Web server (Apache/WAMP or `php artisan serve`)

## Installation

```bash
# 1. Install PHP dependencies (using PHP 7.4, see Requirements)
composer install

# 2. Copy the environment file and generate the app key
cp .env.example .env
php artisan key:generate

# 3. Configure the database in .env (see the Configuration section)

# 4. Run the migrations
php artisan migrate

# 5. (Optional) Load sample data
php artisan db:seed

# 6. Install front-end dependencies and compile assets (optional)
npm install
gulp
```

Start the development server with:

```bash
php artisan serve
```

Or configure a VirtualHost pointing to the `public/` folder.

## Configuration

Main variables in the `.env` file:

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

> The initial admin user and password are set when running the database seeder; credentials are not documented in this README for security reasons.

## Useful commands

```bash
php artisan migrate            # Run pending migrations
php artisan migrate:rollback   # Roll back the last batch of migrations
php artisan db:seed            # Load initial data
php artisan route:list         # List all registered routes
php artisan clear-compiled     # Clear compiled classes
php artisan optimize           # Optimize the autoloader/framework
```

## Project structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/            # Authentication and passwords
│   │   ├── Home/            # Dashboard
│   │   ├── Maestros/        # Catalogs: centers, states, locations, etc.
│   │   ├── Inventario/      # Equipment
│   │   ├── Solicitudes/     # Service requests
│   │   └── Autorizaciones/  # Authorizations
│   ├── Middleware/          # Auth, LangMiddleware, CSRF, etc.
│   └── routes.php
├── *.php                    # Eloquent models (Centro, Equipo, Solicitud, ...)
database/
├── migrations/
└── seeds/
resources/
├── lang/                    # es/en
└── views/                   # Blade, SB Admin 2 template
```

## Multilanguage

The application supports **Spanish** and **English**. The language is stored in the session and changed via the `lang/{es|en}` route; the `LangMiddleware` middleware applies the locale on every request. Translations live in `resources/lang/es` and `resources/lang/en`.

## Tests

Tests use **[Pest](https://pestphp.com)**, but live in an **isolated Composer project** inside `testing/`, with its own `vendor/`. This is necessary because Pest depends (via `nunomaduro/collision`) on `symfony/console` ^5, while Laravel 5.1 pins `symfony/console` to v2.7: the two cannot coexist in the same `vendor/`. `testing/tests/TestCase.php` boots the real app (`bootstrap/app.php`) manually within each test and exposes request helpers (`get`, `post`) and session helpers (`actingAs`, `withCsrfToken`).

Tests run against a dedicated MySQL test database (recreated from scratch on each test by applying the migrations), not SQLite, to avoid compatibility differences with `ENUM`, the `InnoDB` engine, and foreign keys.

### Setting up the test environment (one-time)

```bash
# Dedicated database and user for tests
mysql -u root -e "CREATE DATABASE IF NOT EXISTS dgmtm_testing CHARACTER SET utf8 COLLATE utf8_unicode_ci;
CREATE USER IF NOT EXISTS 'dgmtm_test'@'localhost' IDENTIFIED BY 'dgmtm_test';
GRANT ALL PRIVILEGES ON dgmtm_testing.* TO 'dgmtm_test'@'localhost';"

# Install Pest in its isolated dependency tree
cd testing
php7.4 composer.phar install   # or: composer install, using PHP 7.4
```

Credentials can be overridden with the environment variables `DB_TEST_HOST`, `DB_TEST_DATABASE`, `DB_TEST_USERNAME`, `DB_TEST_PASSWORD` (app connection) and `DB_TEST_ROOT_USERNAME`/`DB_TEST_ROOT_PASSWORD` (used only to recreate the database before each test).

### Running the suite

```bash
cd testing
php7.4 vendor/bin/pest
```

(replace `php7.4` with the path to your PHP 7.x binary if it's not on the `PATH`, e.g. `wamp64/bin/php/php7.4.33/php.exe`).

### Structure

```
testing/
├── composer.json      # only pestphp/pest and mockery, isolated from the root composer.json
├── phpunit.xml
└── tests/
    ├── Pest.php
    ├── TestCase.php    # boots the app, request/DB/factory helpers
    ├── Unit/           # Models, validation rules, middleware
    └── Feature/        # Login, dashboard, end-to-end via the HTTP Kernel
```

## Credits

Admin template based on [SB Admin 2](http://startbootstrap.com/template-overviews/sb-admin-2/) by Start Bootstrap, on top of the [Laravel](https://laravel.com) framework.
