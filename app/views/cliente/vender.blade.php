{{Form::open(array('data-remote-status',"data-success"=>"Cliente Actaulizado", 'class'=>"form-horizontal all"))}}
{{ Form::hidden('cliente_id', $cliente->id ) }}
{{ Form::hidden('user_id', Auth::user()->id ) }}

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading bg-theme">
			</div>
			<div class="panel-body" style="height: 180px;">
				<div class="row">
					<div class="col-md-4"> DPI: </div>
					<div class="col-md-8"> {{ $cliente->dpi }}  </div>
				</div>
				<div class="row">
					<div class="col-md-4"> Nombre: </div>
					<div class="col-md-8"> {{ $cliente->nombre }} </div>
				</div>
				<div class="row">
					<div class="col-md-4"> Direccion: </div>
					<div class="col-md-8"> {{ $cliente->direccion }} </div>
				</div>
				<div class="row">
					<div class="col-md-4"> DireccionA: </div>
					<div class="col-md-8"> {{ $cliente->direccion_actual }} </div>
				</div>
				<div class="row">
					<div class="col-md-4"> Telefono: </div>
					<div class="col-md-8"> {{ $cliente->telefono }} </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<img src="fotos/{{$cliente->dpi}}.jpg" class="img-thumbnail">
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-12">
		{{ Form::_text('descripcion') }}
	</div>
</div>
<div class="row">
	<div class="col-md-6 montoEnviar">
		{{ Form::_text('monto') }}
	</div>
	<div class="col-md-6">
		<strong>Deuda: {{$cliente->saldo}}</strong><br>
		<strong>Dias del ultimo Pago : {{(@$dia == null)? '0':@$dia;}}</strong><br>
		<strong>Dias de la ultima Venta : {{(@$dia_v == null)? '0':@$dia_v;}}</strong>
	</div>
</div>

<div class="row">
	<div class="col-md-6 ventasSinFinalizar">
		<button type="button" name="button" class="btn btn-theme" onclick="CargarVentasEnviadas()">Utilizar Venta</button>
	</div>
</div>

{{ Form::_submit('Enviar') }}
{{ Form::close() }}

<script type="text/javascript">
function CargarVentasEnviadas(){
	$.get( '/ventasSinFinalizar', function( data ) {
			$('.ventasSinFinalizar').html(data);
	});
}

function asignarVenta(venta_id, monto){
	$(".montoEnviar").html('<input type="hidden" name="monto" value="'+monto+'">'+
	'<input type="hidden" name="venta_id" value="'+venta_id+'"> Monto: <strong>'+ monto+'</strong>');
}
</script>
