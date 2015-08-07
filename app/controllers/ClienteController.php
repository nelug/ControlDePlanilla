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
