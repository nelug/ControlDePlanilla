<?php

class ClienteController extends \BaseController {

	public function camara()
	{
		return View::make('cliente.cam');
	}

	public function create()
	{
		if (Input::has('_token'))
		{
			$model = new Cliente;
			$imagen = Input::get('imgBase64');
			Input::merge(array('imgBase64' => 'fotos/'.Input::get('dpi').'jpg'));

			if ($model->_create())
			{
                if($imagen != "")
				    $this->Guardar_Foto($imagen);

				return 'success';
			}

			return $model->errors();
		}

		return View::make('cliente.create');
	}

	public function status()
    {
    	if (Input::has('_token'))
        {
	    	$cliente = Cliente::find(Input::get('id'));
	    	$cliente->estado = Input::get('estado');
	    	$cliente->bloqueado = Input::get('bloqueado');
	    	$cliente->sanjuan = Input::get('sanjuan');
			
			if ($cliente->save())
		    	return 'success';
	
			return $cliente->errors();
    	}

    	$cliente = Cliente::find(Input::get('id'));

    	return View::make('cliente.status', compact('cliente'));
    }

    public function vender()
    {
    	if (Input::has('_token'))
        {
        	$cliente = Cliente::find(Input::get('cliente_id'));
        	if (($cliente->saldo + Input::get('monto')) > 1000) 
        		return 'No se puede vender porque su deuda pasaria los mil con la venta....';

        	$venta = new Venta;
        	$venta->user_id = Auth::user()->id;
        	$venta->cliente_id = Input::get('cliente_id');
        	$venta->monto = Input::get('monto');

            if ($cliente->saldo <= 0.00) {
                $pago = new Pago;
                $pago->user_id = Auth::user()->id;
                $pago->cliente_id = Input::get('cliente_id');
                $pago->saldo_anterior = 0 ;
                $pago->monto = 0 ;
                $pago->saldo_actual = 0 ;
                $pago->save();

            }

        	if ($venta->save())
        	{
		    	$cliente->saldo = $cliente->saldo + Input::get('monto');

				if ($cliente->save())
			    	return 'success';
		    }

		    return 'success';
    	}


    	$cliente = Cliente::find(Input::get('id'));

        if ($cliente->estado == 0) 
            return 'no se le puede vender a este cliente porque esta Inactivo';

        else if ($cliente->bloqueado == 1) 
            return 'no se le puede vender a este cliente porque esta Bloqueado';    
        
    	$dias = DB::table('pagos')->select(DB::raw("monto ,DATEDIFF(current_date,max(created_at)) as dias"))
    	->where('cliente_id','=', Input::get('id'))->first();

        $dias_v = DB::table('ventas')->select(DB::raw("monto ,DATEDIFF(current_date,max(created_at)) as dias"))
        ->where('cliente_id','=', Input::get('id'))->first();

        $dia = $dias->dias;
    	$dias_v = $dias->dias;
    	if ($cliente->saldo <= 0)
    		$dia = 0 ;  
    	return Response::json(array(
            'success' => true,
            'view'   => View::make('cliente.vender', compact('cliente' , 'dia' ,'dias_v'))->render()
        ));

    }


    public function abonar()
    {
    	if (Input::has('_token'))
        {
        	$cliente = Cliente::find(Input::get('cliente_id'));
        	if (($cliente->saldo - Input::get('monto'))  < 0) 
        		return 'No se puede ingresar mas que la deuda....';

        	$saldo = $cliente->saldo;

        	$pago = new Pago;
        	$pago->user_id = Auth::user()->id;
        	$pago->cliente_id = Input::get('cliente_id');
        	$pago->saldo_anterior = $saldo;
        	$pago->monto = Input::get('monto');
        	$pago->saldo_actual = $saldo - Input::get('monto');

        	if ($pago->save())
        	{
		    	$cliente->saldo = $cliente->saldo - Input::get('monto');

				if ($cliente->save())
			    	return 'success';
		    }

		    return 'success';
    	}

    	$cliente = Cliente::find(Input::get('id'));
    	$dias = DB::table('pagos')->select(DB::raw("DATEDIFF(current_date,max(created_at)) as dias"))
    	->where('cliente_id','=', Input::get('id'))->first();
        $dias_v = DB::table('ventas')->select(DB::raw("monto ,DATEDIFF(current_date,max(created_at)) as dias"))
        ->where('cliente_id','=', Input::get('id'))->first();

    	$dia = $dias->dias;
        $dias_v = $dias->dias;
    	if ($cliente->saldo <= 0)
    		$dia = 0 ;  
    		

    	return View::make('cliente.abonar', compact('cliente','dia','dias_v'));
    }

	//funcion para guardar la foto en la carpeta fotos

	public function Guardar_Foto($rawData)
	{
		$filteredData = explode(',', $rawData);

		$unencoded = base64_decode($filteredData[1]);
		$dpi =Input::get('dpi');
		$url = "fotos/{$dpi}";

		$fp = fopen($url.'.jpg', 'w');
		fwrite($fp, $unencoded);
		fclose($fp);
	}
}
