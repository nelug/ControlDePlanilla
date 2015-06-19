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
			Input::except('imgBase64');
			if ($model->_create())
			{
				$this->Guardar_Foto();
				return 'success';
			}

			return $model->errors();
		}

		return View::make('cliente.create');
	}

	//funcion para guardar la foto en la carpeta fotos

	public function Guardar_Foto()
	{
		$rawData = Input::get('imgBase64');
		$filteredData = explode(',', $rawData);

		$unencoded = base64_decode($filteredData[1]);
		$dpi =Input::get('dpi');
		$url = "fotos/{$dpi}";

		$fp = fopen($url.'.png', 'w');
		fwrite($fp, $unencoded);
		fclose($fp);
	}
}
