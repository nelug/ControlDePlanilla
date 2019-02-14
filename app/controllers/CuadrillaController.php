<?php

class CuadrillaController extends \BaseController {

    public function getCuadrillas($id)
    {
        return DB::table('cuadrillas')->whereMeloneraId($id)->get();
    }
    public function mover()
	{
        if (Input::has('_token'))
        {
            DB::table('clientes')
            ->where('cuadrilla_id', Input::get('origen'))
            ->update(array('cuadrilla_id' => Input::get('destino')));
            
            return 'success';
    	}
		return View::make('cuadrilla.mover');
	}
    
    public function bloquear()
	{
        if (Input::has('_token'))
        {
            DB::table('clientes')
            ->where('cuadrilla_id', Input::get('cuadrilla'))
            ->where('inactivo', 0)
            ->update(array('bloqueado' => 1));
            
            return 'success';
    	}
		return View::make('cuadrilla.bloquear');
	}

}
