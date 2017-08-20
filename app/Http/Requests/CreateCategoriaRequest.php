<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;

class CreateCategoriaRequest extends Request
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
            'nomb_categoria' => 'required|unique:categorias,nomb_categoria'
        ];
    }

    public function messages()
    {
        return [
            'nomb_categoria.required' => 'Necesitamos el nombre de la categoria',
            'nomb_categoria.unique' => 'La categoria que intentas registrar ya existe'
           
        ];
    }
}
