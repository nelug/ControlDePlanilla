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
            $cliente->vip = Input::get('vip');
			$cliente->inactivo = Input::get('inactivo');

			if ($cliente->save())
		    	return Response::json(array('success' => true));

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
		
		if($cliente->bloqueado == 1 && $cliente->vip == 0)
			return "No se puede vender porque el cliente esta bloqueado..!";
        
        if (($cliente->saldo + Input::get('monto')) > 1000 && $cliente->vip == 0)
        	return 'No se puede vender porque su deuda pasaria los mil con la venta....';

        	$venta = new Venta;
        	$venta->user_id = Auth::user()->id;
        	$venta->cliente_id = Input::get('cliente_id');
        	$venta->monto = Input::get('monto');
        	$venta->descripcion = Input::get('descripcion');

		DB::connection('bazar')->table('ventas')->whereId(Input::get('venta_id'))
		->update(array('total' => Input::get('monto'), 'completed' => 1, 'dpi' => $cliente->dpi, 'dpi_id' => $cliente->id));

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
			    $cliente->bloqueado = 1;

				if ($cliente->save())
			    	return Response::json(array(
						'success' => true,
						'id' => $venta->id,
						'venta_id'=> Input::get('venta_id')
					));
		    }

		    return Response::json(array('success' => true));
    	}


    	$cliente = Cliente::find(Input::get('id'));

        if ($cliente->inactivo)
            return 'no se le puede vender a este cliente porque esta bloquado Permanentemente';
            
        if ($cliente->estado == 0)
            return 'no se le puede vender a este cliente porque esta Inactivo';

        else if ($cliente->bloqueado == 1 && $cliente->vip == 0)
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
			if( ($cliente->saldo - Input::get('monto'))  <= 0)
				$cliente->bloqueado = 0;

		    	$cliente->saldo = $cliente->saldo - Input::get('monto');

				if ($cliente->save())
			    	return Response::json(array('success' => true));
		    }

		    return Response::json(array('success' => true));
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

	public function actualizarFoto()
	{
		if (Input::has('_token'))
        {
			$imagen = Input::get('imgBase64');
			if($imagen != "")
				$this->Guardar_Foto($imagen);

			return "success";
		}

		$cliente = Cliente::find(Input::get('cliente_id'));

		return Response::json(array(
            'success' => true,
            'view'   => View::make('cliente.actualizarFoto', compact('cliente'))->render()
        ));


	}


	public function imprimirVenta() {
	     $venta = Venta::find(Input::get('id'));
	     $cliente = Cliente::find($venta->cliente_id);
		  $cuadrilla = Cuadrilla::find($cliente->cuadrilla_id);
		  $melonera = Melonera::find($cuadrilla->melonera_id);

		return View::make('cliente.imprimirVenta', compact('venta', 'cliente', 'cuadrilla', 'melonera'))->render();
	}
	
	public function imprimirCliente()
	{
		$cliente = Cliente::find(Input::get('id'));
		return View::make('cliente.imprimirCliente', compact('cliente'))->render();
	}
}