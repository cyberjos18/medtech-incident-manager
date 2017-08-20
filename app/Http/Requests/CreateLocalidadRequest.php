<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;

class CreateLocalidadRequest extends Request
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
            'estado_id'=>'required',
            'nomb_localidad'=>'required'
            //
        ];
    }
    public function messages()
    {
        return [
            'estado_id.required'     => 'Necesitamos que elija un estado',
            'nomb_localidad.required'=> 'Necesitamos el nombre de la localidad',
            
        ];
     
    }

}
