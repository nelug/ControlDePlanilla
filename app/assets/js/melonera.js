$(function() {
    $(document).on("click", "#crear_melonera", function(){ crear_melonera(this); });
});

function crear_melonera() {

    var url = 'user/melonera/create';

    $.get( url, function( data ) {
        $('.modal-body').html(data);
        $('.modal-title').text( 'Crear Melonera');
        $('.bs-modal').modal('show');
    });
}