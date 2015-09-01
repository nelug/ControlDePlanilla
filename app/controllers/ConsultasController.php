<?php

class ConsultasController extends \BaseController {

	public function clientes()
	{
        return View::make('consultas.clientes');
	}
	
	public function clientes_dt()
	{
		$table = 'clientes';

		$columns = array("dpi","nombre","apellido","direccion_actual",'cuadrilla',"saldo");

		$Searchable = array("dpi","nombre","apellido","direccion_actual","saldo",'cuadrilla');

		$join = "Join cuadrillas on (cuadrillas.id = cuadrilla_id) ";

		echo TableSearch::get($table, $columns, $Searchable , $join);
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

	public function ventas()
	{
        return View::make('consultas.ventas');
	}
	
	public function ventas_dt()
	{
		$table = 'ventas';

		$columns = array(
			"clientes.dpi as dpi",
			"CONCAT_WS(' ',users.nombre,users.apellido) as usuario",
			"CONCAT_WS(' ',clientes.nombre,clientes.apellido) as cliente",
			"clientes.direccion as direccion",
			"meloneras.melonera as melonera",
			"cuadrillas.cuadrilla as cuadrilla",
			"ventas.monto as monto",
			"ventas.created_at as fecha"
			);

		$Searchable = array(
			"clientes.dpi",
			"clientes.nombre",
			"clientes.apellido",
			"clientes.direccion_actual",
			"meloneras.melonera",
			"cuadrillas.cuadrilla",
			"ventas.monto",
			"ventas.created_at");

		$Join  = " JOIN users ON (ventas.user_id = users.id) ";
		$Join .= " JOIN clientes ON (ventas.cliente_id = clientes.id) ";
		$Join .= " JOIN cuadrillas ON (cuadrilla_id = cuadrillas.id) ";
		$Join .= " JOIN meloneras ON (melonera_id = meloneras.id) ";

		$where = " ventas.monto > 0 ";

		echo TableSearch::get($table, $columns, $Searchable, $Join, $where);
	}

	public function pagos()
	{
        return View::make('consultas.pagos');
	}
	
	public function pagos_dt()
	{
		$table = 'pagos';

		$columns = array(
			"clientes.dpi as dpi",
			"CONCAT_WS(' ',users.nombre,users.apellido) as usuario",
			"CONCAT_WS(' ',clientes.nombre,clientes.apellido) as cliente",
			"clientes.direccion_actual as direccion",
			"meloneras.melonera as melonera",
			"cuadrillas.cuadrilla as cuadrilla",
			"pagos.saldo_anterior as saldo_anterior",
			"pagos.monto as monto",
			"pagos.saldo_actual as saldo_actual",
			"pagos.created_at as fecha"
			);

		$Searchable = array(
			"clientes.dpi",
			"clientes.nombre",
			"clientes.apellido",
			"clientes.direccion",
			"meloneras.melonera",
			"cuadrillas.cuadrilla",
			"pagos.monto",
			"pagos.created_at");

		$Join  = " JOIN users ON (pagos.user_id = users.id) ";
		$Join .= " JOIN clientes ON (pagos.cliente_id = clientes.id) ";
		$Join .= " JOIN cuadrillas ON (cuadrilla_id = cuadrillas.id) ";
		$Join .= " JOIN meloneras ON (melonera_id = meloneras.id) ";
		$where = " pagos.monto > 0 ";

		echo TableSearch::get($table, $columns, $Searchable, $Join, $where);
	}


}