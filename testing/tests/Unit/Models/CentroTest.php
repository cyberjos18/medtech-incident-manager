<?php

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

test('Centro define sus relaciones belongsTo con Estado, Localidad y Categoria', function () {
    $centro = $this->createCentro();

    expect($centro->estado())->toBeInstanceOf(BelongsTo::class)
        ->and($centro->localidad())->toBeInstanceOf(BelongsTo::class)
        ->and($centro->categoria())->toBeInstanceOf(BelongsTo::class)
        ->and($centro->estado)->toBeInstanceOf(dgmtm\Estado::class)
        ->and($centro->localidad)->toBeInstanceOf(dgmtm\Localidad::class)
        ->and($centro->categoria)->toBeInstanceOf(dgmtm\Categoria::class);
});

test('Centro define sus relaciones hasMany con Equipo, Servicio y Solicitud', function () {
    $centro = $this->createCentro();

    expect($centro->equipo())->toBeInstanceOf(HasMany::class)
        ->and($centro->servicio())->toBeInstanceOf(HasMany::class)
        ->and($centro->solicitud())->toBeInstanceOf(HasMany::class);
});

test('el nombre del director del centro es unico', function () {
    $this->createCentro(['director_centro' => 'Director Repetido']);

    expect(fn () => $this->createCentro(['director_centro' => 'Director Repetido']))
        ->toThrow(Illuminate\Database\QueryException::class);
});
