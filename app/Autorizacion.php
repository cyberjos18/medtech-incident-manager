<?php

namespace dgmtm;

use Carbon\Carbon;
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
    public static function  convertirFormatoFechaCarbon($date)
    {
        /*CreateFromFormat convierte el dato que estoy recibiend en una fecha, debo especificar el formato de la
        fecha enviada, luego toDateString lo convierte al formato ISO.*/
        $fecha=Carbon::createFromFormat('d-m-Y',$date)->toDateString();
        return $fecha;

    }

        
}