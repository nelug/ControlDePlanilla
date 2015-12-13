$(function() {
    $(document).on("click", "#crear_melonera", function(){ crear_melonera(this); });
});

function crear_melonera() {

    var url = 'user/melonera/create';

    $.get( url, function( data ) {
        $('.modal-body').html(data);
        $('.modal-title').html( 'Crear Melonera');
        $('.bs-modal').modal('show');
    });
}

function imprimirMelonera()
{
	var url = 'user/melonera/imprimirMelonera';
    $.get( url, function( data ) {
        $('.modal-body').html(data);
        $('.modal-title').html( 'Crear Melonera');
        $('.bs-modal').modal('show');
    });
}

function imprimirMeloneraSeleccionada()
{
	var id = $('select[name=melonera_id]').val();
	var url = 'user/melonera/imprimirMeloneraSeleccionada?melonera_id='+id;

    $.get( url, function( data ) {
    	$(".imprimirContenedor").html(data);
    	$(".imprimirContenedor").show();
         $.print(".imprimirContenedor");
    	$(".imprimirContenedor").hide();
    });
}

function imprimirMeloneraDeudores()
{
	var url = 'user/melonera/imprimirMeloneraDeudores';
    $.get( url, function( data ) {
        $('.modal-body').html(data);
        $('.modal-title').html( 'Imprimir Deudores');
        $('.bs-modal').modal('show');
    });
}

function imprimirDeudoresSeleccionados()
{
	var $direccion = $('#textoImprimirDeudores').val();
	var url = 'user/melonera/imprimirDeudoresSeleccionados?direccion='+$direccion;

    $.get( url, function( data ) {
    	$(".imprimirContenedor").html(data);
    	$(".imprimirContenedor").show();
         $.print(".imprimirContenedor");
    	$(".imprimirContenedor").hide();
    });
}
