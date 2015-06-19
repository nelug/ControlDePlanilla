<?php namespace App\Validators;

use ValidatorAssistant, Input;

class ClienteValidator extends ValidatorAssistant
{
    protected $rules = array(

        'dpi' =>  'required|unique:clientes,dpi, {id}',
        'nombre' =>  'required|alpha_spaces|min:3',
        'apellido' =>  'required|alpha_spaces|min:3',
        'direccion' =>  'required|min:3',
        'direccion_actual' =>  'required|min:3',
        'cuadrilla_id' =>  'required',
        'user_id'    =>  'required'
    );

    protected function before()
    {
        if (Input::has('id'))
        {
            $this->bind('id', Input::get('id'));
        }
    }
}
