<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;
use Illuminate\Routing\Route;


class EditAutorizacionRequest extends Request
{
    /**
     * @var Route
     */
    private $route;

    public function __construct(Route $route)
    {

        $this->route = $route;
    }
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
                'numero_autorizacion' => 'required|max:11|unique:autorizaciones,numero_autorizacion,'.$this->route->getParameter('autorizacionservicio'),
                'fecha_autorizacion'  => 'required|date_format:d-m-Y',
                'solicitud_id'        => 'required|unique:autorizaciones,solicitud_id,'.$this->route->getParameter('autorizacionservicio'),
                'proveedor_id'        => 'required',
                'status'              => 'required'
                //
            ];
    }
    public function messages()
    {
        return
            [
                'numero_autorizacion.required'     => 'Necesitamos el numero de autorizacion',
                'numero_autorizacion.max'          => 'El numero de autorizacion debe contener maximo 11 caracteres',
                'numero_autorizacion.unique'       => 'El numero de autorizacion ya existe !!!',
                'fecha_autorizacion.required'      => 'Necesitamos la fecha de registro de autorizacion',
                'fecha_autorizacion.date_format'   => 'El formato de la fecha es incorrecto debe ser: DD-MM-YYYY, DD-MM-YY',
                'solicitud_id.required'            => 'Necesitamos que seleccione el numero de solicitud',
                'solicitud_id.unique'              => 'El numero de solicitud que intentas asociar ya esta asignado a una autorizacion !!!',
                'proveedor_id.required'            => 'Necesitamos que seleccione el proveedor responsable',
                'status.required'                  => 'Necesitamos que seleccione el status de la autorizacion'

            ];
    }
}
