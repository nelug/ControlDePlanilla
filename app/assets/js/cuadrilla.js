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

function mover_cuadrilla() {
    var url = 'user/cuadrilla/mover';
    $.get( url, function( data ) {
        $('.modal-body').html(data);
        $('.modal-title').html( 'Mover Cuadrilla');
        $('.bs-modal').modal('show');
    });
}


function bloquear_cuadrilla() {
    var url = 'user/cuadrilla/bloquear';
    $.get( url, function( data ) {
        $('.modal-body').html(data);
        $('.modal-title').html( 'Bloquear Cuadrilla');
        $('.bs-modal').modal('show');
    });
}