
@foreach(@$cuadrilla as $data)
<?php $verificar = Cliente::where('saldo','>','0')
->where('cuadrilla_id','=', $data->id)->get(); ?>
@if(count($verificar) > 0)
<?php $total = 0; ?>
<div align="center">
	<h3> {{ $data->cuadrilla }} {{ $data->caporal }} </h3>
</div>
<table class="table">
	<thead>
		<tr>
			<th width="14%" style="text-align: center;">DPI</th>
			<th width="23%" style="text-align: center;">Nombre</th>
			<th width="23%" style="text-align: center;">Direccion Actual</th>
			<th width="9%" style="text-align: center;">Telefono</th>
			<th width="10%" style="text-align: center;">Saldo</th>
			<th width="5%" style="text-align: center;">D.P</th>
			<th width="4%" style="text-align: center;">D.V</th>
			<th width="12%" style="text-align: center;">Pago</th>
		</tr>
	</thead>
	<tbody>
		@foreach(@$data->clientes as $cliente)
		@if($cliente->saldo > 0 )
		<?php
		$dias = DB::table('pagos')
		->select(DB::raw("DATEDIFF(current_date,max(created_at)) as dias"))
		->where('cliente_id','=', $cliente->id)->first();
		$diasV = DB::table('ventas')
		->select(DB::raw("DATEDIFF(current_date,max(created_at)) as dias"))
		->where('cliente_id','=', $cliente->id)->first();

		?>
		<tr class="imprimirMelonera">
			<td> {{ $cliente->dpi }} </td>
			<td> {{ $cliente->nombre . ' ' . $cliente->apellido }} </td>
			<td> {{ $cliente->direccion_actual}} </td>
			<td> {{ $cliente->telefono}} </td>
			<td style="text-align: right;"> {{ f_num::get($cliente->saldo) }} </td>
			<td style="text-align: right;">
				{{(@$dias->dias == null)? '0':@$dias->dias;}}
			</td>
			<td style="text-align: right;">
				{{(@$diasV->dias == null)? '0':@$diasV->dias;}}
			</td>
			<td></td>
		</tr>
		<?php $total = $total + $cliente->saldo ?>
		@endif
		@endforeach
		<tr class="active">
			<td> </td>
			<td> Total : </td>
			<td style="text-align: right;"> {{ f_num::get($total) }} </td>
			<td> </td>
			<td> </td>
			<td> </td>
		</tr>
	</tbody>
	<tfoot>

	</tfoot>
</table>
<div class="saltopagina"></div>
@endif
@endforeach

<style>
	@media all {
		div.saltopagina{
			display: none;
		}
	}

	@media print{
		div.saltopagina{
			display:block;
			page-break-before:always;
		}
	}

	.imprimirMelonera td{
		line-height: 100% !important;
		font-size: 11px !important;
	}
</style>
