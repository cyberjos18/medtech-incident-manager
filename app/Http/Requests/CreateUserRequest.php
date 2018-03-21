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
               "name"  => 'required', 
               "email" => 'required|unique'
            ];
    }
    public function messages()
    {
        return 
            [
            
            ];
    }
}
