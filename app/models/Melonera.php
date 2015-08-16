<?php

class Melonera extends \BaseModel {

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

}
