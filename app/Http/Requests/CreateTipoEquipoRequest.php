<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;

class CreateTipoEquipoRequest extends Request
{
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
            'tipo_equipo' => 'required|unique:tiposequipos,tipo_equipo'

        ];
    }
    public function messages()
    {
        return [
            'tipo_equipo.required' => 'Necesitamos que describa el tipo de equipo',
            'tipo_equipo.unique'   => 'El tipo de equipo que intentas registrar ya existe'
        ];
    }
}
