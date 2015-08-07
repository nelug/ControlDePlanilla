<?php

class ConsultasController extends \BaseController {

	public function clientes()
	{
        return View::make('consultas.clientes');
	}
	
	public function clientes_dt()
	{
		$table = 'clientes';

		$columns = array("dpi","nombre","apellido","direccion_actual","saldo");

		$Searchable = array("dpi","nombre","apellido","direccion_actual","saldo");

		echo TableSearch::get($table, $columns, $Searchable);
	}

	public function cuadrillas()
	{
        return View::make('consultas.cuadrilas');
	}
	
	public function cuadrillas_dt()
	{
		$table = 'cuadrilas';

		$columns = array("cuadrila","melonera");

		$Searchable = array("cuadrilla","melonera");

		$Join = " Join meloneras on (melonera_id = merloneras.id)"

		echo TableSearch::get($table, $columns, $Searchable, $Join);
	}

	public function meloneras()
	{
        return View::make('consultas.meloneras');
	}
	
	public function meloneras_dt()
	{
		$table = 'users';

		$columns = array("username");

		$Searchable = array("username");

		echo TableSearch::get($table, $columns, $Searchable);
	}



}