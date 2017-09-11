<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tiposequipo
 */
class TipoEquipo extends Model
{
    protected $table = 'tiposequipos';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'tipo_equipo'
    ];

    protected $guarded = [];

        
}