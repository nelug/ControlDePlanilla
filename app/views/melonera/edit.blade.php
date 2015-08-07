
{{ Form::_open('Melonera Actualizada') }}
	
	{{ Form::hidden('id', @$model->id) }}

    {{ Form::_text('melonera',$model->melonera) }}
  	
  	{{ Form::hidden('user_id', Auth::user()->id ) }}

  	{{ Form::_submit('Enviar') }}
  	
{{ Form::close() }}