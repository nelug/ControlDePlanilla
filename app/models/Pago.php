<?php
use \NEkman\ModelLogger\Contract\Logable;

class Pago extends \BaseModel implements Logable{

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

	public function getLogName()
    {
        return $this->id;
    }

}
