<?php

class MeloneraController extends \BaseController {

	public function imprimirMelonera()
	{
		return View::make('melonera.imprimirMelonera');
	}

	public function imprimirMeloneraSeleccionada()
	{
		$cuadrilla = Cuadrilla::with('meloneras','clientes')
		->where('melonera_id','=',Input::get('melonera_id'))->orderBy('correlativo')->get();
		return View::make('melonera.imprimirMeloneraSeleccionada', compact('cuadrilla'))->render();
	}
}
