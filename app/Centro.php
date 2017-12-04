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



    /** Relaciones entre el modelo Centro con las demas tablas del modelo
     *
     *
     */

    public function estado()
    {
        return $this->belongsTo('dgmtm\Estado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function localidad()
    {
        return $this->belongsTo('dgmtm\Localidad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo('dgmtm\Categoria');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipo()
    {
        return $this->hasMany('dgmtm\Equipo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicio()
    {
        return $this->hasMany('dgmtm\Servicio');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function solicitud()
    {
        return $this->hasMany('dgmtm\Solicitud');
    }

        
}