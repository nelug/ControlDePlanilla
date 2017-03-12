
{{ Form::_open('Cuadrilla Movida') }}

    {{ Form::_select('origen', Cuadrilla::lists('cuadrilla','id')) }}
    
    {{ Form::_select('destino', Cuadrilla::lists('cuadrilla','id')) }}
	
  	{{ Form::_submit('Enviar') }}
    
{{ Form::close() }}