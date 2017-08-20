<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditLocalidadRequest extends Request
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
            'estado_id' => 'required',
            'nomb_localidad' => 'required|unique:localidades,nomb_localidad,'.$this->route->getParameter('localidades')
        ];
    }
    public function messages()
    {
     return [
         'estado_id.required' => 'Necesitamos que elija un estado',
         'nomb_localidad.required' => 'Necesitamos el nombre de la localidad',
         'nomb_localidad.unique' => 'La localidad ya esta registrada para este estado'
     ];
    }
}
