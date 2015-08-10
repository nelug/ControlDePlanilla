<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends \BaseModel implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, HasRole;
    protected $table = 'users';
	protected $guarded = array('id');
    protected $hidden = array('password', 'remember_token');

    public function meloneras()
    {
        return $this->hasMany('Melonera');    
    }

    public function clientes()
    {
        return $this->hasMany('Cliente');    
    }

    public function cuadrillas()
    {
        return $this->hasMany('Cuadrilla');    
    }

    public function pagos()
    {
        return $this->hasMany('Pago');    
    }

    public function ventas()
    {
        return $this->hasMany('Venta');    
    }

    public function setPasswordAttribute($pass) 
    {
        $this->attributes['password'] = Hash::make($pass);
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
 
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
