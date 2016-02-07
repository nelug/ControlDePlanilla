<?php namespace App\Validators;

use ValidatorAssistant, Input;

class CuadrillaValidator extends ValidatorAssistant
{
    protected $rules = array(

        'cuadrilla' =>  'required|unique:cuadrillas,cuadrilla, {id}',
        'correlativo' =>  'required|min:1',
        'caporal' =>  'required|min:5',
        'melonera_id' =>  'required',
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
