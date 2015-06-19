
{{ Form::_open('Cliente Actualizado') }}

{{ Form::hidden('id', @$cuadrilla->id ) }}

{{ Form::hidden('user_id', Auth::user()->id ) }}

{{ Form::_select('cuadrilla_id',Cuadrilla::lists('cuadrilla','id'),@$cliente->cuadrilla_id) }}

{{ Form::_text('dpi',@$cliente->dpi) }}

{{ Form::_text('nombre',@$cliente->nombre) }}

{{ Form::_text('apellido',@$cliente->apellido) }}

{{ Form::_text('direccion',@$cliente->direccion) }}

{{ Form::_text('direccion_actual',@$cliente->direccion_actual) }}

{{ Form::_text('telefono',@$cliente->telefono) }}

<label class="checkbox-inline">
  <input type="checkbox" name="estado" {{($cliente->estado == 1) ? 'checked' : '';}}> Inactivo
</label>

<label class="checkbox-inline">
  <input type="checkbox" name="bloqueado" {{($cliente->bloqueado == 1) ? 'checked' : '';}}> Bloqueado
</label>

<label class="checkbox-inline">
  <input type="checkbox" name="sanjuan" {{($cliente->sanjuan == 1) ? 'checked' : '';}}> San Juan
</label>

{{ Form::_submit('Enviar') }}

{{ Form::close() }}
