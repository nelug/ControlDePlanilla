<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-4">

		<a href="javascript:void(EncenderCamara());"> <i class="fa fa-camera-retro"></i>Encender </a>
		<a href="javascript:void(take_snapshot());"> <i class="fa fa-camera"></i>Capturar </a>
		<canvas id="canvas" width="320" height="240"></canvas>
		<div id="my_camera" style="width:320px !important; height:240px  !important;"> </div>
	</div>
	<div class="col-md-4"></div>
</div>

{{Form::open(array('data-remote-cliente',"data-success"=>"Cliente creado", 'class'=>"form-horizontal all"))}}
<input type="hidden" name="imgBase64" id="foto_perfil">
<input type="hidden" name="dpi" value="{{@$cliente->dpi}}">
{{ Form::_submit('Enviar') }}
{{ Form::close() }}
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
