<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Autorizaciones
 */
class Autorizacion extends Model
{
    protected $table = 'autorizaciones';

    public $timestamps = true;

    protected $fillable = [
        'id',
        'fecha_autorizacion',
        'proveedor_id',
        'status',
        'seguimiento'
    ];

    protected $guarded = [];

    public function solicitud()
    {
        return $this->hasMany('dgmtm\Solicitud');
    }

    public function proveedor()
    {
        return $this->belongsTo('dgmtm\Proveedor');
    }

    public function reporteProveedor()
    {
        return $this->hasOne('dgmtm\ReporteProveedor');
    }

        
}