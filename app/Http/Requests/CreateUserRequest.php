<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;

class CreateUserRequest extends Request
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
               "name"        => 'required',
               "email"       => 'required|email|unique:users,email',
               "password"    => 'required|confirmed',
               "perfil_user" => 'required'
            ];
    }
    public function messages()
    {
        return 
            [
                "name.required"         => 'Necesitamos el nombre del usuario',
                "email.required"        => 'Necesitamos un correo electronico',
                "email.email"           => 'Este email no cumple con un formato valido ej: email@dominio.com',
                "password.required"     => 'Necesitamos que coloque un password',
                'password.confirmed'    => 'El password ingresado no coincide',
                'perfil_user.required'  => 'Seleccione el perfil del usuario'
            
            ];
    }
}
