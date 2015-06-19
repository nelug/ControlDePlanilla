<div class="row">

	<div class="col-md-7">
		{{Form::open(array('data-remote-cliente',"data-success"=>"Cliente creado", 'class'=>"form-horizontal all"))}} 
		
		<input type="hidden" name="imgBase64" id="foto_perfil">

		{{ Form::hidden('user_id', Auth::user()->id ) }}

		{{ Form::_select('cuadrilla_id',Cuadrilla::lists('cuadrilla','id')) }}

		{{ Form::_text('dpi') }}

		{{ Form::_text('nombre') }}

		{{ Form::_text('apellido') }}

		{{ Form::_text('direccion') }}

		{{ Form::_text('direccion_actual','','Direccion Actual') }}

		{{ Form::_text('telefono') }}

		<label class="checkbox-inline">
			<input type="checkbox" name="estado"> Inactivo
		</label>

		<label class="checkbox-inline">
			<input type="checkbox" name="bloqueado" > Bloqueado
		</label>

		<label class="checkbox-inline">
			<input type="checkbox" name="sanjuan"> San Juan
		</label>
		
		{{ Form::_submit('Enviar') }}

		{{ Form::close() }}
	</div>

	<div class="col-md-5">
	<a href="javascript:void(EncenderCamara());"> <i class="fa fa-camera-retro"></i>
Encender </a>

			<a href="javascript:void(take_snapshot());"> <i class="fa fa-camera"></i>
Capturar </a>
		<canvas id="canvas" width="320" height="240"></canvas>
		<div id="my_camera" style="width:320px !important; height:240px  !important;"> </div>

		
	</div>
</div>
<style type="text/css"> 
	.bs-modal .Lightbox{ width: 820px !important; }
</style>

<script>

$('#canvas').hide();
    function EncenderCamara(){
        Webcam.attach( '#my_camera' );
        $('#canvas').hide();
        $('#my_camera').show();
    }

    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            var canvas = document.getElementById("canvas");
            var context = canvas.getContext("2d");
            var img = new Image();
            img.src = data_uri;
            $('#foto_perfil').val(data_uri);
            $('#canvas').delay('slow').fadeOut('slow', function() {
                context.drawImage(img, 0, 0);
                $('#my_camera').hide();
                $('#canvas').fadeIn("slow", function() {
                    
                });
            });
            
        });
    }
</script>

