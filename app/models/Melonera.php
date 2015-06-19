<?php
use \NEkman\ModelLogger\Contract\Logable;

class Melonera extends \BaseModel implements Logable{

	protected $table = 'meloneras';

	protected $guarded = array('id');

	public function cuadrillas()
    {
        return $this->hasMany('Cuadrilla');    
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
