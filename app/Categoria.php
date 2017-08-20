<?php

namespace dgmtm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 */
class Categoria extends Model
{
    protected $table = 'categorias';

    public $timestamps = true;

    protected $fillable = [
        'nomb_categoria'
    ];

    protected $guarded = ['id'];
    
    public function centro()
    {
        return $this->hasMany('dgmtm\Centro');
    }

        
}