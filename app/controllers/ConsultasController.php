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
        return View::make('consultas.cuadrillas');
	}
	
	public function cuadrillas_dt()
	{
		$table = 'cuadrillas';

		$columns = array("cuadrilla","melonera","caporal");

		$Searchable = array("cuadrilla","melonera","caporal");

		$Join = " Join meloneras on (melonera_id = meloneras.id)";

		echo TableSearch::get($table, $columns, $Searchable, $Join);
	}

	public function meloneras()
	{
        return View::make('consultas.meloneras');
	}
	
	public function meloneras_dt()
	{
		$table = 'meloneras';

		$columns = array("melonera",
			"(select count(*) from cuadrillas where melonera_id = meloneras.id) as catidad",
			"created_at");

		$Searchable = array("melonera");

		echo TableSearch::get($table, $columns, $Searchable);
	}



}