<?php

namespace dgmtm\Http\Requests;

use dgmtm\Http\Requests\Request;

class CreateInventarioEntradaRequest extends Request
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
            'nomb_equipo'           => 'required|max:25',
            'marca_equipo'          => 'required|max:25',
            'modelo_equipo'         => 'required|max:25',
            'serial_equipo'         => 'required|unique:equipos,serial_equipo|max:30',
            'bien_nacional'         => 'required|unique:equipos,bien_nacional|max:30',
            'equipo_garantia'       => 'required'
             

        ];
    }
    public function messages()
    {
        return
        [
            'nomb_equipo.required'     => 'Necesitamos el nombre del equipo',
            'nomb_equipo.max'          => 'El nombre del equipo debe contener maximo 25 caracteres',
            'marca_equipo.required'    => 'Necesitamos la marca del equipo',
            'marca_equipo.max'         => 'La marca del equipo debe contener maximo 25 caracateres',
            'modelo_equipo.required'   => 'Necesitamos el modelo del equipo',
            'modelo_equipo.max'        => 'El modelo del equipo debe contener maximo 25 caracteres',
            'serial_equipo.required'   => 'Necesitamos el serial del equipo',
            'serial_equipo.unique'     => 'Este numero de serial ya esta registrado',
            'serial_equipo.max'        => 'El serial del equipo debe contener maximo 30 caracteres',
            'bien_nacional.required'   => 'Necesitamos el codigo de bien nacional del equipo',
            'bien_nacional.unique'     => 'Este codigo de bien nacional ya esta registrado',
            'bien_nacional.max'        => 'El codigo de bien nacional del equipo debe contener maximo 30 caracteres',
            'equipo_garantia.required' => 'Necesitamos que indique el status de garantia del equipo'
            
        ];
        
     
    }
}
