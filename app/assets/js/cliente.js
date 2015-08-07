$(function() {
    $(document).on("click", "#crear_cliente", function(){ crear_cliente(this); });
});

function crear_cliente() {

    var url = 'user/cliente/create';

    $.get( url, function( data ) {
        $('.modal-body').html(data);
        $('.modal-title').html( 'Crear Cliente');
        $('.bs-modal').modal('show');
    });
}