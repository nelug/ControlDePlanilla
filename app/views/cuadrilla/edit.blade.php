{{ Form::_open('Cuadrilla actualizada') }}
	
	{{ Form::hidden('id', $model->id ) }}

    {{ Form::_select('melonera_id',Melonera::lists('melonera','id'),$model->melonera_id) }}

    {{ Form::_text('cuadrilla',$model->cuadrilla) }}

    {{ Form::_text('caporal',$model->caporal) }}

    {{ Form::_text('correlativo',$model->correlativo) }}
  	
  	{{ Form::hidden('user_id', Auth::user()->id ) }}

  	{{ Form::_submit('Enviar') }}

{{ Form::close() }}