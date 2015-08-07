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
			Input::merge(array('imgBase64' => 'fotos/'.Input::get('dpi')));

			if ($model->_create())
			{
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
        {/*
	    	$cliente = Cliente::find(Input::get('id'));
	    	$cliente->estado = Input::get('estado');
	    	$cliente->bloqueado = Input::get('bloqueado');
	    	$cliente->sanjuan = Input::get('sanjuan');
			
			if ($cliente->save())
		    	return 'success';
	
			return $cliente->errors();*/

    	}

    	$cliente = Cliente::find(Input::get('id'));

    	return View::make('cliente.vender', compact('cliente'));
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
