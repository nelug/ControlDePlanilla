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

function _actualizarFoto(e){
    $id  = $('.dataTable tbody .row_selected').attr('id');
    $url = $('.dataTable').attr('url') + 'actualizarFoto';
    $.ajax({
        type: "POST",
        url: $url,
        data: {cliente_id: $id},
        success: function (data) {
            if(data.success == true ){
                $('.modal-body').html(data.view);
                $('.modal-title').text( 'Actualizar Foto al  ' + $('.dataTable').attr('title') );
                return $('.bs-modal').modal('show');
            }
            msg.warning(data, 'Advertencia!');
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    });
}
