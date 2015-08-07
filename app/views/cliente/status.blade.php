{{Form::open(array('data-remote-status',"data-success"=>"Cliente Actaulizado", 'class'=>"form-horizontal all"))}} 
{{ Form::hidden('id', $cliente->id ) }}
<div class="row">
	<div class="col-md-6">
		<h4>{{$cliente->dpi}}</h4>
	</div>
	<div class="col-md-4">
	</div>
	<div class="col-md-2"></div>
</div>
<div class="row">
	<div class="col-md-10">
		<h4>{{ $cliente->nombre .' '. $cliente->apellido}}</h4>
	</div>
	<div class="col-md-2"></div>
</div>
<hr>
<div class="row">
	<div class="col-md-4">
		@if($cliente->estado == 1)
		<div class="radio">
			<label> <input type="radio" name="estado" value="1" checked> Activo </label>
		</div>
		<div class="radio">
			<label> <input type="radio" name="estado" value="0"> Inactivo </label>
		</div>
		@else
		<div class="radio">
			<label> <input type="radio" name="estado" value="1" > Activo </label>
		</div>
		<div class="radio">
			<label> <input type="radio" name="estado" value="0" checked> Inactivo </label>
		</div>
		@endif
	</div>
	<div class="col-md-4">
		@if($cliente->bloqueado == 1)
		<div class="radio">
			<label> <input type="radio" name="bloqueado" value="1" checked> Bloqueado </label>
		</div>
		<div class="radio">
			<label> <input type="radio" name="bloqueado" value="0"> Desbloqueado </label>
		</div>
		@else
		<div class="radio">
			<label> <input type="radio" name="bloqueado" value="1" > Bloqueado </label>
		</div>
		<div class="radio">
			<label> <input type="radio" name="bloqueado" value="0" checked> Desbloqueado </label>
		</div>
		@endif
	</div>

	<div class="col-md-4">
		@if($cliente->sanjuan == 1)
		<div class="radio">
			<label> <input type="radio" name="sanjuan" value="1" checked> San Juan </label>
		</div>
		<div class="radio">
			<label> <input type="radio" name="sanjuan" value="0"> No San Juan </label>
		</div>
		@else
		<div class="radio">
			<label> <input type="radio" name="sanjuan" value="1" > San Juan </label>
		</div>
		<div class="radio">
			<label> <input type="radio" name="sanjuan" value="0" checked> No San Juan </label>
		</div>
		@endif
	</div>
</div>
<hr>
{{ Form::_submit('Enviar') }}
{{ Form::close() }}