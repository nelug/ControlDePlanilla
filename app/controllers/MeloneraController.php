<?php

class MeloneraController extends \BaseController {

	public function imprimirMelonera()
	{
		return View::make('melonera.imprimirMelonera');
	}

	public function imprimirMeloneraDeudores()
	{
		return View::make('melonera.imprimirDeudores');
	}

	public function imprimirMeloneraSeleccionada()
	{
		$cuadrilla = Cuadrilla::with('meloneras','clientes')
		->where('melonera_id','=',Input::get('melonera_id'))->orderBy('correlativo')->get();
		return View::make('melonera.imprimirMeloneraSeleccionada', compact('cuadrilla'))->render();
	}

	public function imprimirDeudoresSeleccionados()
	{
		$direccion = Input::get('direccion');

		$cuadrilla = Cuadrilla::with('meloneras','clientes')
		->join('clientes','cuadrilla_id','=','cuadrillas.id')
		->where("direccion_actual", "LIKE", "%{$direccion}%")
		->whereRaw('(select DATEDIFF(current_date,max(created_at)) from pagos where cliente_id = clientes.id) >= 30')
		->orderBy('correlativo')->get();


		return View::make('melonera.imprimirMeloneraSeleccionada', compact('cuadrilla'))->render();
	}
}
