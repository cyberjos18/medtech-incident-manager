<?php

test('un Equipo pertenece a un Centro, un Servicio y un TipoEquipo', function () {
    $centro = $this->createCentro();
    $servicio = $this->createServicio(['centro_id' => $centro->id]);
    $tipo = $this->createTipoEquipo();

    $equipo = $this->createEquipo([
        'centro_id' => $centro->id,
        'servicio_id' => $servicio->id,
        'tipoequipo_id' => $tipo->id,
    ]);

    expect($equipo->centro->id)->toBe($centro->id)
        ->and($equipo->servicio->id)->toBe($servicio->id)
        ->and($equipo->tipoequipo->id)->toBe($tipo->id);
});

test('un Equipo puede asociarse a varias Solicitudes con la falla reportada en la tabla pivote', function () {
    $equipo = $this->createEquipo();
    $solicitud = dgmtm\Solicitud::create([
        'numero_solicitud' => 'SOL-'.uniqid(),
        'status' => 'Recibida',
        'fecha_recibo' => '2026-01-01',
        'responsable_emision' => 'Juan',
        'jefe_servicio' => 'Maria',
        'observaciones' => 'NA',
        'centro_id' => $equipo->centro_id,
    ]);

    $equipo->solicitud()->attach($solicitud->id, ['falla_reportada' => 'No enciende']);

    $pivotFalla = $equipo->solicitud()->first()->pivot->falla_reportada;

    expect($equipo->solicitud)->toHaveCount(1)
        ->and($pivotFalla)->toBe('No enciende');
});

test('el serial y el bien nacional del equipo son unicos', function () {
    $this->createEquipo(['serial_equipo' => 'SERIAL-1', 'bien_nacional' => 'BIEN-1']);

    expect(fn () => $this->createEquipo(['serial_equipo' => 'SERIAL-1', 'bien_nacional' => 'BIEN-2']))
        ->toThrow(Illuminate\Database\QueryException::class);
});
