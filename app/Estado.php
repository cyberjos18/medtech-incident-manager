<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 */
class Estado extends Model
{
    protected $table = 'estados';

    public $timestamps = true;

    protected $fillable = [
        'nomb_estado'
    ];

    protected $guarded = ['id'];

    public function localidad()
    {
        return $this->hasMany('dgmtm\Localidad');
    }
    public function centro()
    {
        return $this->hasMany('dgmtm\Centro');
    }
        
}