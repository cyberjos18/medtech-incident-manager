<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;
use Illuminate\Routing\Route;


class EditCategoriaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /**
     * @var Route
     */
    private $route;


    /**
     * EditCategoriaRequest constructor.
     * @param \Route $
     */

    public function __construct(Route $route)
    {

        $this->route = $route;
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
            'nomb_categoria' => 'required|unique:categorias,nomb_categoria,'.$this->route->getParameter('categorias')
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
