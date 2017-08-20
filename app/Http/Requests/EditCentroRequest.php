<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditCentroRequest extends Request
{
    private $route;
    public function __construct(Route $route)
    {
        $this->route=$route;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'nomb_centro'     => 'required|max:100',
            'director_centro' => 'required|max:25|unique:centros,director_centro,'.$this->route->getParameter('centros'),
            'categoria_id'    => 'required',
            'estado_id'       => 'required',
            'localidad_id'    => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nomb_centro.required'     => 'Necesitamos el nombre del centro asistencial',
            'nomb_centro.max'          => 'El nombre del centro debe contener maximo 100 caracteres',
            'director_centro.required' => 'Necesitamos el nombre del director del centro asistencial',
            'director_centro.unique'   => 'Este director ya esta asignado a un centro asistencial !!!',
            'director_centro.max'      => 'El nombre del director debe contener maximo 25 caracteres',
            'categoria_id.required'    => 'Indique  el tipo de centro asistencial',
            'estado_id.required'       => 'Necesitamos el estado en donde esta ubicado el centro asistencial',
            'localidad_id.required'    => 'Necesitamos la localidad a la cual pertenece el centro asistencial'
            
        ];
     
    }
}
