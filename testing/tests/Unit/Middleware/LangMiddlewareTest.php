<?php

use dgmtm\Http\Middleware\LangMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

test('LangMiddleware aplica el locale guardado en sesion', function () {
    $this->app['session']->start();
    $this->app['session']->put('lang', 'en');

    (new LangMiddleware())->handle(Request::create('/'), function ($request) {
        return new Response();
    });

    expect(App::getLocale())->toBe('en');
});

test('sin idioma en sesion no cambia el locale por defecto', function () {
    $default = App::getLocale();

    (new LangMiddleware())->handle(Request::create('/'), function ($request) {
        return new Response();
    });

    expect(App::getLocale())->toBe($default);
});
