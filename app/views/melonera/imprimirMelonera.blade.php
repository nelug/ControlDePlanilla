
{{ Form::select('melonera_id', Melonera::lists('melonera', 'id') ,'', array('class'=>'form-control')) }}
<br>
<div class="modal-footer">
	<button class="btn btn-default" data-dismiss="modal" type="button">Cerrar!</button>
	<input class="btn theme-button" type="submit" value="Imprimir!"  onclick="imprimirMeloneraSeleccionada()" autocomplete="off">
</div>



