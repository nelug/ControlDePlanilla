
{{ Form::_open('Cuadrilla Bloqueada') }}

    {{ Form::_select('cuadrilla', Cuadrilla::lists('cuadrilla','id')) }}

  	{{ Form::_submit('Enviar') }}
    
{{ Form::close() }}