<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicitud
 */
class Solicitude extends Model
{
    protected $table = 'solicitudes';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'autorizacion_id',
        'numero_solicitud',
        'fecha_solicitud',
        'centro_id',
        'falla_reportada',
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
        return $this->belongsToMany('dgmtm\Equipo');
    }

        
}