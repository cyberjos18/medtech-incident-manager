<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;

class CreateSolicitudRequest extends Request
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
            'numero_solicitud'   => 'required|max:25|unique:solicitudes',
            'fecha_recibo'       => 'required|date_format:d/m/Y',
            'estatus'            => 'required',
            'centro_id'          => 'required',
            'jefe_servicio'      => 'required|max:25',
            'responsable_emisor' => 'required|max:25'

        ];
    }
    public function messages()
    {
        return [
            'numero_solicitud.required'   => 'Necesitamos el número de solicitud',
            'numero_solicitud.max'        => 'El numero de solicitud debe contener maximo 25 caracteres',
            'numero_solicitud.unique'     => 'EL numero de solicitud ya existe !!!',
            'fecha_recibo.required'       => 'Necesitamos la fecha de recibo de la solicitud',
            'fecha_recibo.date_format'    => 'El formato de la fecha es incorrecto debe ser: DD/MM/YYYY, DD/MM/YY',
            'estatus.required'            => 'Necesitamos que indique el estatus de la solicitud',
            'centro_id.required'          => 'Necesitamos el nombre del centro',
            'jefe_servicio.required'      => 'Necesitamos el nombre del jefe de servicio',
            'jefe_servicio.max'           => 'El nombre del jefe de servicio debe contener maximo 25 caracteres',
            'responsable_emisor.required' => 'Necesitamos el nombre del emisor de la solicitud',
            'responsable_emisor.max'      => 'El nombre del emisor debe contener maximo 25 caracteres'

        ];

    }
}
