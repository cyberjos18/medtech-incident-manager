<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditInventarioRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    private $route;
    public function __construct(Route $route)
    {
        $this->route=$route;
    }
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'centro_id'             => 'required',
            'servicio_id'           => 'required',
            'tipoequipo_id'         => 'required',
            'marca_equipo'          => 'required|max:25',
            'modelo_equipo'         => 'required|max:25',
            'serial_equipo'         => 'required|max:30|unique:equipos,serial_equipo,'.$this->route->getParameter('equipos'),
            'bien_nacional'         => 'required|max:30|unique:equipos,bien_nacional,'.$this->route->getParameter('equipos'),
            'estatus_equipo'        => 'required',
            'equipo_garantia'       => 'required'


        ];
    }
    public function messages()
    {
        return
            [
                'centro_id.required'       => 'Necesitamos que elija el centro de atención',
                'servicio_id.required'     => 'Necesitamos que elija el servicio del centro',
                'tipoequipo_id.required'   => 'Necesitamos el tipo de equipo',
                'marca_equipo.required'    => 'Necesitamos la marca del equipo',
                'marca_equipo.max'         => 'La marca del equipo debe contener maximo 25 caracateres',
                'modelo_equipo.required'   => 'Necesitamos el modelo del equipo',
                'modelo_equipo.max'        => 'El modelo del equipo debe contener maximo 25 caracteres',
                'serial_equipo.required'   => 'Necesitamos el serial del equipo',
                'serial_equipo.unique'     => 'Este numero de serial ya esta registrado',
                'serial_equipo.max'        => 'El serial del equipo debe contener maximo 30 caracteres',
                'bien_nacional.required'   => 'Necesitamos el codigo de bien nacional del equipo',
                'bien_nacional.unique'     => 'Este codigo de bien nacional ya esta registrado',
                'bien_nacional.max'        => 'El codigo de bien nacional del equipo debe contener maximo 30 caracteres',
                'estatus_equipo.required'  => 'Necesitamos que indique el estatus operativo del equipo',
                'equipo_garantia.required' => 'Necesitamos que indique el status de garantia del equipo'

            ];


    }
}
