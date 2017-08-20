<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;

class CreateProveedorRequest extends Request
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
            'rif_proveedor'      =>'required | regex:/^[vejg]{1}[0-9]+/i | max:10| min:9 | unique:proveedores,rif_proveedor',
            'nomb_proveedor'     => 'required',
            'telf_proveedor'     => 'required',
            'correo_proveedor'   => 'email|unique:proveedores,correo_proveedor',
            'contacto_proveedor' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'rif_proveedor.required'      => 'Necesitamos el RIF del proveedor',
            'rif_proveedor.unique'        => 'El RIF que intenta registrar ya existe !!!',
            'rif_proveedor.regex'         => 'El formato de RIF es invalido verifiquelo',
            'rif_proveedor.max'           => 'El RIF debe contener maximo 10 caracteres',
            'rif_proveedor.min'           => 'El RIF debe contener minimo 9 caracteres',
            'nomb_proveedor.required'     => 'Necesitamos el nombre del proveedor',
            'telf_proveedor.required'     => 'Necesitamos el telefono del proveedor',
            'correo_proveedor.email'      => 'El correo ingresado no tiene un formato valido ej: correo@dominio.com',
            'correo_proveedor.unique'     => 'El correo que intenta registrar ya existe !!!',
            'contacto_proveedor.required' => 'Necesitamos una persona de contacto en el proveedor'
            
        ];
        
    }
}
