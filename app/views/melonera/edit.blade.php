
{{ Form::_open('Melonera Actualizada') }}
	
	{{ Form::hidden('id', @$melonera->id) }}

    {{ Form::_text('melonera',$melonera->melonera) }}
  	
  	{{ Form::hidden('user_id', Auth::user()->id ) }}

  	{{ Form::_submit('Enviar') }}
  	
{{ Form::close() }}