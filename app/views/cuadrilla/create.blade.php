
{{ Form::_open('Cuadrilla creada') }}

    {{ Form::_select('melonera_id',Melonera::lists('melonera','id')) }}

    {{ Form::_text('cuadrilla') }}

    {{ Form::_text('caporal') }}

    {{ Form::_text('correlativo') }}
  	
  	{{ Form::hidden('user_id', Auth::user()->id ) }}

  	{{ Form::_submit('Enviar') }}

{{ Form::close() }}