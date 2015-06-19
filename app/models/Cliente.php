<?php
use \NEkman\ModelLogger\Contract\Logable;

class Cliente extends \BaseModel implements Logable{

	protected $table = 'clientes';

	protected $guarded = array('id');

	public function ventas()
    {
        return $this->hasMany('Venta');    
    }

    public function pagos()
    {
        return $this->hasMany('Pago');    
    }

	public function cuadrillas()
    {
        return $this->belongsTo('Cuadrilla');    
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
