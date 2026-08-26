<?php

use dgmtm\User;

test('perfil_user y estatus se pueden asignar de forma masiva y password/remember_token quedan ocultos', function () {
    $user = $this->createUser([
        'name' => 'Ana Perez',
        'email' => 'ana@example.com',
        'perfil_user' => 'Usuario',
        'estatus' => 'Activo',
    ]);

    expect($user->name)->toBe('Ana Perez')
        ->and($user->perfil_user)->toBe('Usuario')
        ->and($user->estatus)->toBe('Activo')
        ->and($user->toArray())->not->toHaveKeys(['password', 'remember_token']);
});

test('el email es unico', function () {
    $this->createUser(['email' => 'duplicado@example.com']);

    expect(fn () => $this->createUser(['email' => 'duplicado@example.com']))
        ->toThrow(Illuminate\Database\QueryException::class);
});
