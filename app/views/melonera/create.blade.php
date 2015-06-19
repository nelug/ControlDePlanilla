
{{ Form::_open('Melonera creada') }}

    {{ Form::_text('melonera') }}
  	
  	{{ Form::hidden('user_id', Auth::user()->id ) }}

  	{{ Form::_submit('Enviar') }}

{{ Form::close() }}