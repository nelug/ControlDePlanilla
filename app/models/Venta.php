<?php
class Venta extends \BaseModel{

	protected $table = 'ventas';

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
