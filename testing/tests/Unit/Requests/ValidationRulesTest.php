<?php

use dgmtm\Http\Requests\CreateUserRequest;
use dgmtm\Http\Requests\LoginValidateRequest;

test('CreateUserRequest exige nombre, email valido y unico, y password confirmado', function () {
    $rules = (new CreateUserRequest())->rules();

    $fails = Validator::make([], $rules)->fails();
    expect($fails)->toBeTrue();

    $this->createUser(['email' => 'existente@example.com']);

    $validator = Validator::make([
        'name' => 'Nuevo Usuario',
        'email' => 'existente@example.com',
        'password' => 'secret123',
        'password_confirmation' => 'otraclave',
        'perfil_user' => 'Usuario',
    ], $rules);

    expect($validator->fails())->toBeTrue()
        ->and($validator->errors()->has('email'))->toBeTrue()
        ->and($validator->errors()->has('password'))->toBeTrue();

    $validator = Validator::make([
        'name' => 'Nuevo Usuario',
        'email' => 'nuevo@example.com',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'perfil_user' => 'Usuario',
    ], $rules);

    expect($validator->passes())->toBeTrue();
});

test('LoginValidateRequest exige email y password', function () {
    $rules = (new LoginValidateRequest())->rules();

    expect(Validator::make([], $rules)->fails())->toBeTrue()
        ->and(Validator::make(['email' => 'a@a.com', 'password' => 'x'], $rules)->passes())->toBeTrue();
});
