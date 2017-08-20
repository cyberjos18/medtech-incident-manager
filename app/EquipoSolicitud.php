<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EquipoSolicitud
 */
class EquipoSolicitud extends Model
{
    protected $table = 'equipo_solicitud';

    public $timestamps = true;

    protected $fillable = [
        'solicitud_id',
        'equipo_id'
    ];

    protected $guarded = ['id'];

        
}