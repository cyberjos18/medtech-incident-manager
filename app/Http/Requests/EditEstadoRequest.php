<?php

namespace dgmtm\Http\Requests;

use dgmtm\Estado;
use dgmtm\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditEstadoRequest extends Request
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
            'nomb_estado'=>'required|unique:estados,nomb_estado,'.$this->route->getParameter('estados')
        ];
    }
    public function messages()
    {

        return [
            'nomb_estado.required'=>'Necesitamos el nombre de un estado',
            'nomb_estado.unique'=>'El estado que intentas registrar ya existe !!!'
        ];
        
    }
}
