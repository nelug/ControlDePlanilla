
@foreach(@$cuadrilla as $data)
<?php $verificar = Cliente::where('saldo','>','0')
		->where('cuadrilla_id','=', $data->id)->get(); ?>
	@if(count($verificar) > 0)
		<?php $total = 0; ?>
		<div align="center">
			<h2> {{ $data->cuadrilla }} {{ $data->caporal }} </h2> 
		</div>
		<table class="table">
			<thead>
				<tr>
					<th width="15%" style="text-align: center;">DPI</th>
					<th width="45%" style="text-align: center;">Nombre</th>
					<th width="10%" style="text-align: center;">Telefono</th>
					<th width="10%" style="text-align: center;">Saldo</th>
					<th width="10%" style="text-align: center;">Dias</th>
					<th width="10%" style="text-align: center;">Pago</th>
				</tr>
			</thead>
			<tbody>
				@foreach(@$data->clientes as $cliente)
					@if($cliente->saldo > 0 )
						<tr>
							<td> {{ $cliente->dpi }} </td>
							<td> {{ $cliente->nombre . ' ' . $cliente->apellido }} </td>
							<td style="text-align: right;"> {{ f_num::get($cliente->saldo) }} </td>
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
</style>