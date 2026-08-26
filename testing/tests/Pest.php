<?php

require_once __DIR__.'/TestCase.php';

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| La app (Laravel 5.1) y Pest viven en dos arboles de dependencias
| separados (ver testing/composer.json). TestCase arranca la app a mano
| dentro de cada test y expone helpers de request/BD.
|
*/

uses(TestCase::class)->in('Unit', 'Feature');
