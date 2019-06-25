<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-4">

    <a href="javascript:void(initCam());"> <i class="fa fa-camera-retro"></i>
Encender </a>

			<a href="javascript:void(take_snapshot());"> <i class="fa fa-camera"></i>
Capturar </a>
		<canvas id="canvas" width="320" height="240"></canvas>
		<div id="my_camera" style="width:320px !important; height:240px  !important;"> 
			<video id="video" playsinline autoplay></video>
		</div>

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
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const snap = document.getElementById("snap");
const errorMsgElement = document.querySelector('span#errorMsg');

const constraints = {
  audio: true,
  video: {
    width: 320, height: 240
  }
};

async function initCam() {
  try {
	$('#canvas').hide();
    $('#my_camera').show();
    const stream = await navigator.mediaDevices.getUserMedia(constraints);
    handleSuccess(stream);
  } catch (e) {
    errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
  }
}


function handleSuccess(stream) {
  window.stream = stream;
  video.srcObject = stream;
}

var context = canvas.getContext('2d');

function take_snapshot () {
    context.drawImage(video, 0, 0, 320, 240);
	$('#canvas').delay('slow').fadeOut('slow', function() {
    	$('#my_camera').hide();
        $('#canvas').fadeIn("slow", function() {
			$('#foto_perfil').val(canvas.toDataURL());
		});
    });
};
</script>
