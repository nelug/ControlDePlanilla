
{{ Form::_open('Cliente Actualizado') }}

{{ Form::hidden('id', @$model->id ) }}

{{ Form::hidden('user_id', Auth::user()->id ) }}

{{ Form::_select('cuadrilla_id',Cuadrilla::lists('cuadrilla','id'),@$model->cuadrilla_id) }}

{{ Form::_text('dpi',@$model->dpi) }}

{{ Form::_text('nombre',@$model->nombre) }}

{{ Form::_text('apellido',@$model->apellido) }}

{{ Form::_text('direccion',@$model->direccion) }}

{{ Form::_text('direccion_actual',@$model->direccion_actual,"Direccion_A.") }}

{{ Form::_text('telefono',@$model->telefono) }}

{{ Form::_submit('Enviar') }}

{{ Form::close() }}
