{{ Form::_open('Cuadrilla actualizada') }}
	
	{{ Form::hidden('id', @$cuadrilla->id ) }}

    {{ Form::_select('melonera_id',Melonera::lists('melonera','id'),@$cuadrilla->melonera_id) }}

    {{ Form::_text('cuadrilla',@$cuadrilla->cuadrilla) }}

    {{ Form::_text('caporal',@$cuadrilla->caporal) }}

    {{ Form::_text('correlativo',@$cuadrilla->correlativo) }}
  	
  	{{ Form::hidden('user_id', Auth::user()->id ) }}

  	{{ Form::_submit('Enviar') }}

{{ Form::close() }}