<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Localidad
 */
class Localidad extends Model
{
    protected $table = 'localidades';

    public $timestamps = true;

    protected $fillable = [
        'estado_id',
        'nomb_localidad'
    ];

    protected $guarded = ['id'];

    public function estado()
    {
        return $this->belongsTo('dgmtm\Estado');
    }

    public function centro()
    {
        return $this->hasMany('dgmtm\Centro');
    }


        
}