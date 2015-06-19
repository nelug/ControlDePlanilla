<?php namespace App\Validators;

use ValidatorAssistant, Input;

class MeloneraValidator extends ValidatorAssistant
{
    protected $rules = array(
        'melonera' =>  'required|unique:meloneras,melonera, {id}',
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
