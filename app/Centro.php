<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Centro
 */
class Centro extends Model
{
    protected $table = 'centros';

    public $timestamps = true;

    protected $fillable = [
        'nomb_centro',
        'estado_id',
        'localidad_id',
        'categoria_id',
        'director_centro'
    ];

    protected $guarded = ['id'];

    public function estado()
    {
        return $this->belongsTo('dgmtm\Estado');
    }

    public function localidad()
    {
        return $this->belongsTo('dgmtm\Localidad');
    }

    public function categoria()
    {
        return $this->belongsTo('dgmtm\Categoria');
    }

    public function equipo()
    {
        return $this->hasMany('dgmtm\Equipo');
    }
    
    public function servicio()
    {
        return $this->hasMany('dgmtm\Servicio');
    }
    
    public function solicitud()
    {
        return $this->hasMany('dgmtm\Solicitud');
    }

        
}