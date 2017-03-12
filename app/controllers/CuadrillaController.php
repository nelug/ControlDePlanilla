<?php

class CuadrillaController extends \BaseController {

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

}
