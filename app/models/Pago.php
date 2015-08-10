<?php

class Pago extends \BaseModel {

	protected $table = 'pagos';

	protected $guarded = array('id');

	public function clientes()
    {
        return $this->belongsTo('Cliente');    
    }

    public function users()
    {
        return $this->belongsTo('User');    
    }
}
