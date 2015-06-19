<?php
use \NEkman\ModelLogger\Contract\Logable;

class Cuadrilla extends \BaseModel implements Logable{

	protected $table = 'cuadrillas';

	protected $guarded = array('id');

	public function clientes()
    {
        return $this->hasMany('Cliente');    
    }

    public function meloneras()
    {
        return $this->belongsTo('Melonera');    
    }

    public function users()
    {
        return $this->belongsTo('User');    
    }

	public function getLogName()
    {
        return $this->id;
    }
}
