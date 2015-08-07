$(function() {
    $(document).on("click", "#crear_cuadrilla", function(){ crear_cuadrilla(this); });
});

function crear_cuadrilla() {
    var url = 'user/cuadrilla/create';
    $.get( url, function( data ) {
        $('.modal-body').html(data);
        $('.modal-title').html( 'Crear Cuadrilla');
        $('.bs-modal').modal('show');
    });
}