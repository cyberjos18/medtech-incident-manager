<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 *
 */
class Proveedor extends Model
{
    protected $table = 'proveedores';

    public $timestamps = true;

    protected $fillable = [
        'rif_proveedor',
        'nomb_proveedor',
        'telf_proveedor',
        'correo_proveedor',
        'contacto_proveedor'
    ];

    protected $guarded = ['id'];

    public function autorizacion()
    {
        return $this->hasMany('dgmtm\Autorizacion');
    }

    public function reporteProveedor()
    {
        return $this->hasMany('dgmtm\ReporteProveedor');
    }

        
}