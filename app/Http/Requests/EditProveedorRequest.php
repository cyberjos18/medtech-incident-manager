<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;
use Illuminate\Routing\Route;
class EditProveedorRequest extends Request
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
            'rif_proveedor'      => 'required|unique:proveedores,rif_proveedor,'.$this->route->getParameter('proveedores').',|regex:/^[vejg]{1}[0-9]+/i|max:10|min:9',
            'nomb_proveedor'     => 'required|unique:proveedores,nomb_proveedor,'.$this->route->getParameter('proveedores'),
            'telf_proveedor'     => 'required',
            'correo_proveedor'   => 'email|unique:proveedores,correo_proveedor,'.$this->route->getParameter('proveedores'),
            'contacto_proveedor' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'rif_proveedor.required'      => 'Necesitamos el RIF del proveedor',
            'rif_proveedor.unique'        => 'El RIF que intenta actualizar ya existe !!!',
            'rif_proveedor.regex'         => 'El formato de RIF es invalido verifiquelo',
            'rif_proveedor.max'           => 'El RIF debe contener maximo 10 caracteres',
            'rif_proveedor.min'           => 'El RIF debe contener minimo 9 caracteres',
            'nomb_proveedor.required'     => 'Necesitamos el nombre del proveedor',
            'nomb_proveedor.unique'       => 'El nombre que intenta actualizar ya existe !!!',
            'telf_proveedor.required'     => 'Necesitamos el telefono del proveedor',
            'correo_proveedor.email'      => 'El correo ingresado no tiene un formato valido ej: correo@dominio.com',
            'correo_proveedor.unique'     => 'El correo que intenta actualizar ya existe !!!',
            'contacto_proveedor.required' => 'Necesitamos una persona de contacto en el proveedor'
        ];

    }
}
