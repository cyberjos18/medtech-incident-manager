<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ReporteProveedor
 */
class ReporteProveedor extends Model
{
    protected $table = 'reportes_proveedores';

    public $timestamps = true;

    protected $fillable = [
        'proveedor_id',
        'autorizacion_id',
        'fecha_atencion',
        'tecnico_responsable',
        'observaciones'
    ];

    protected $guarded = ['id'];

    public function autorizacion()
    {
        return $this->belongsTo('dgmtm\Autorizacion');
    }

    public function proveedor()
    {
        return $this->belongsTo('dgmtm\Proveedor');
    }

        
}