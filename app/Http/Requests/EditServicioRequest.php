<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;

class EditServicioRequest extends Request
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
            'nomb_servicio' => 'required|unique:servicios,nomb_servicio',
        ];
    }
}
