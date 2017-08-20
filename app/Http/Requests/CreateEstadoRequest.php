<?php

namespace dgmtm\Http\Requests;

use dgmtm\Estado;
use dgmtm\Http\Requests\Request;

class CreateEstadoRequest extends Request
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
            'nomb_estado'=>'required|unique:estados'
        ];
    }
    public function messages()
    {

        return [
            'nomb_estado.required'=>'Necesitamos el nombre de un estado',
            'nomb_estado.unique'=>'El estado que intentas registrar ya existe'
        ];
        
    }
}
