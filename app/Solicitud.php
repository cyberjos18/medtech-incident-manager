<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicitud
 */
class Solicitud extends Model
{
    protected $table = 'solicitudes';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'autorizacion_id',
        'numero_solicitud',
        'fecha_recibo',
        'status',
        'centro_id',
        'responsable_emision',
        'jefe_servicio'
    ];

    protected $guarded = [];

    public function centro()
    {
        return $this->belongsTo('dgmtm\Centro');
    }
    
    public function autorizacion()
    {
        return $this->belongsTo('dgmtm\Autorizacion');
    }
    
    public function equipo()
    {
        return $this->belongsToMany('dgmtm\Equipo','equipo_solicitud','solicitud_id','equipo_id')->withPivot('falla_reportada');
    }

        
}