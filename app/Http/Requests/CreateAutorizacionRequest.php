<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;

class CreateAutorizacionRequest extends Request
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
        return
            [
                'numero_autorizacion' => 'required|max:11|unique:autorizaciones',
                'fecha_autorizacion'  => 'required|date_format:d-m-Y',
                'proveedor'           => 'required',
                'status'              => 'required'
            //
            ];
    }
    public function messages()
    {
        return
            [
                'numero_autorizacion.required'     => 'Necesitamos el numero de autorizacion',
                'numero_autorizacion.max'          => 'El numero de autorizacion debe contener maximo 11 caracteres',
                'fecha_autorizacion.required'      => 'Necesitamos la fecha de registro de autorizacion',
                'fecha_autorizacion.date_format'   => 'El formato de la fecha es incorrecto debe ser: DD-MM-YYYY, DD-MM-YY',
                'proveedor.required'               => 'Necesitamos que seleccione el proveedor responsable',
                'status.required'                  => 'Necesitamos que seleccione el status de la autorizacion'

            ];
    }
}
