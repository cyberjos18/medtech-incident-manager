<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 */
class Servicio extends Model
{
    protected $table = 'servicios';

    public $timestamps = true;

    protected $fillable = [
        'centro_id',
        'nomb_servicio'
    ];

    protected $guarded = ['id'];

    public function centro()
    {
        return $this->belongsTo('dgmtm\Centro');
    }
    
    public function equipo()
    {
        return $this->hasMany('dgmtm\Equipo');
    }

        
}