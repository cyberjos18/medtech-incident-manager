<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;

class CreateServicioRequest extends Request
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
     * Nota: los nombres de campo son camelCase (centroId, nombServicio)
     * porque asi los envia public/js/servicio.js via AJAX. No son
     * consistentes con el resto del modulo (centro_id, nomb_servicio),
     * pero deben respetarse para no romper el flujo AJAX existente.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'centroId'     => 'required|integer|exists:centros,id',
            'nombServicio' => 'required|max:100|unique:servicios,nomb_servicio',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'centroId.required'     => 'Necesitamos el centro de atención',
            'centroId.exists'       => 'El centro de atención seleccionado no es válido',
            'nombServicio.required' => 'Necesitamos el nombre del servicio',
            'nombServicio.max'      => 'El nombre del servicio debe contener máximo 100 caracteres',
            'nombServicio.unique'   => 'El servicio ya esta registrado',
        ];
    }
}
