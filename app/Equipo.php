<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Equipo
 */
class Equipo extends Model
{
    protected $table = 'equipos';

    public $timestamps = true;

    protected $fillable = [
        'centro_id',
        'servicio_id',
        'tipoequipo_id',
        'marca_equipo',
        'modelo_equipo',
        'serial_equipo',
        'bien_nacional',
        'equipo_garantia',
        'responsable_garantia',
        'duracion_garantia',
        'observaciones_equipo'
    ];

    protected $guarded = ['id'];

    public function centro()
    {
        return $this->belongsTo('dgmtm\Centro');
    }

    public function servicio()
    {
        return $this->belongsTo('dgmtm\Servicio');
    }

    public function solicitud()
    {
        return $this->belongsToMany('dgmtm\Solicitud','equipo_solicitud','equipo_id','numero_solicitud_id')->withPivot('falla_reportada','equipo_id');
    }

    public function tipoequipo()
    {
        return $this->belongsTo('dgmtm\TipoEquipo');
    }

        
}