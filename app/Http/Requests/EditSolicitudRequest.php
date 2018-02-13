<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditSolicitudRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     *
     */
    private $route;

    /**
     * EditSolicitudRequest constructor.
     * @param Route $route
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
            'numero_solicitud'   => 'required|max:25|unique:solicitudes,numero_solicitud,'.$this->route->getParameter('solicitudservicio'),
            'fecha_recibo'       => 'required',
            'status'             => 'required',
            'centro_id'          => 'required',
            'jefe_servicio'      => 'required|max:25',
            'responsable_emision' => 'required|max:25'

        ];
    }
    public function messages()
    {
        return [
            'numero_solicitud.required'   => 'Necesitamos el número de solicitud',
            'numero_solicitud.max'        => 'El numero de solicitud debe contener maximo 25 caracteres',
            'numero_solicitud.unique'     => 'EL numero de solicitud ya existe !!!',
            'fecha_recibo.required'       => 'Necesitamos la fecha de recibo de la solicitud',
            'status.required'             => 'Necesitamos que indique el estatus de la solicitud',
            'centro_id.required'          => 'Necesitamos el nombre del centro',
            'jefe_servicio.required'      => 'Necesitamos el nombre del jefe de servicio',
            'jefe_servicio.max'           => 'El nombre del jefe de servicio debe contener maximo 25 caracteres',
            'responsable_emision.required' => 'Necesitamos el nombre del emisor de la solicitud',
            'responsable_emision.max'      => 'El nombre del emisor debe contener maximo 25 caracteres'

        ];

    }
}
