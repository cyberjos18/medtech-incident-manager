<?php

use dgmtm\Solicitud;

test('convertirFormatoFechaCarbon convierte una fecha d-m-Y a formato ISO', function () {
    expect(Solicitud::convertirFormatoFechaCarbon('26-02-2018'))->toBe('2018-02-26');
});

test('convertirFormatoFechaMysql invierte los segmentos de una fecha separada por guiones', function () {
    $solicitud = new Solicitud();

    expect($solicitud->convertirFormatoFechaMysql('2018-02-26'))->toBe('26-02-2018');
});

test('una Solicitud pertenece a un Centro y puede tener varios Equipos', function () {
    $equipo = $this->createEquipo();

    $solicitud = Solicitud::create([
        'numero_solicitud' => 'SOL-'.uniqid(),
        'status' => 'Recibida',
        'fecha_recibo' => '2026-01-01',
        'responsable_emision' => 'Juan',
        'jefe_servicio' => 'Maria',
        'observaciones' => 'NA',
        'centro_id' => $equipo->centro_id,
    ]);

    $solicitud->equipo()->attach($equipo->id, ['falla_reportada' => 'No enciende']);

    expect($solicitud->centro->id)->toBe($equipo->centro_id)
        ->and($solicitud->equipo)->toHaveCount(1);
});
