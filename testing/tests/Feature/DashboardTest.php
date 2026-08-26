<?php

test('un visitante sin sesion es redirigido al login al pedir el dashboard', function () {
    $response = $this->get('/');

    expect($response->getStatusCode())->toBe(302)
        ->and($response->headers->get('Location'))->toBe('http://localhost/auth/login');
});

test('un usuario Activo puede ver el dashboard', function () {
    $this->actingAs($this->createUser(['estatus' => 'Activo']));

    $response = $this->get('/');

    expect($response->getStatusCode())->toBe(200);
});

test('un usuario Inactivo es deslogueado y redirigido al login', function () {
    $this->actingAs($this->createUser(['estatus' => 'Inactivo']));

    $response = $this->get('/');

    expect($response->getStatusCode())->toBe(302)
        ->and($response->headers->get('Location'))->toBe('http://localhost/auth/login')
        ->and(Auth::check())->toBeFalse();
});
