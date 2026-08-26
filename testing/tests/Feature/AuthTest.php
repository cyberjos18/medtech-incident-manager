<?php

test('la pantalla de login carga para un visitante', function () {
    $response = $this->get('/auth/login');

    expect($response->getStatusCode())->toBe(200);
});

test('un usuario activo con credenciales correctas puede iniciar sesion', function () {
    $user = $this->createUser([
        'email' => 'activo@example.com',
        'password' => Hash::make('secret123'),
        'estatus' => 'Activo',
    ]);

    $response = $this->post('/auth/login', $this->withCsrfToken([
        'email' => 'activo@example.com',
        'password' => 'secret123',
    ]));

    expect($response->getStatusCode())->toBe(302)
        ->and($response->headers->get('Location'))->toBe('http://localhost');

    expect(Auth::check())->toBeTrue()
        ->and(Auth::user()->id)->toBe($user->id);
});

test('con credenciales incorrectas no inicia sesion', function () {
    $this->createUser([
        'email' => 'activo2@example.com',
        'password' => Hash::make('secret123'),
    ]);

    $this->post('/auth/login', $this->withCsrfToken([
        'email' => 'activo2@example.com',
        'password' => 'incorrecta',
    ]));

    expect(Auth::check())->toBeFalse();
});
