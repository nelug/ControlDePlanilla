<?php

class ReporteController extends \BaseController {

	public function general()
	{
		$totalClientes = Cliente::select(DB::raw("count(*) as total"))->first();

		$totalClientesDeudores = Cliente::select(DB::raw("count(*) as total"))->where('saldo','>',0)->first();

		$totalClientesDeudoresPasados = Cliente::select(DB::raw("count(*) as total"))
		->where('saldo','>',1000)->where('saldo','>',0)->first();

		$totalDeuda = Cliente::select(DB::raw('sum(saldo) as total'))->where('saldo','>',0)->first();

		$data ['totalClientes'] = $totalClientes->total;
		$data ['totalClientesDeudores'] = $totalClientesDeudores->total;
		$data ['totalClientesDeudoresPasados'] = $totalClientesDeudoresPasados->total;
		$data ['totalDeuda'] = $totalDeuda->total;

		return View::make('reportes.general', compact('data'));
	}

	public function VentasPorUsuario()
	{
        $ventas = DB::table('ventas')
        ->join('users', 'ventas.user_id', '=', 'users.id')
        ->where(DB::raw('MONTH(ventas.created_at)'), date('m') )
        ->where(DB::raw('YEAR(ventas.created_at)'), date("Y") )
        ->where(DB::raw('monto'), '>', 0 )
        ->select(DB::raw("user_id, CONCAT_WS(' ',users.nombre,users.apellido) as usuario, sum(monto) as total"))
        ->groupBy('user_id')
        ->orderBy('monto')
        ->get();

        foreach ($ventas as $v) {
            $totales[] = (float) $v->total;
            $usuarios[] = $v->usuario;
        }

        $usuarios = json_encode(@$usuarios);
        $totales = json_encode(@$totales);

		return Response::json(array(
			'success' => true,
			'view'    => View::make('reportes.ventasPorUsuario', compact('totales', 'usuarios'))->render()
        ));
	}
}