function reporteGeneral () {
	$.get( "admin/reportes/general", function( data ) {
        $('.table').html(data);
		$('.dt-container').show();	
		$('.dt-panel').show();	
    });
}

function chartVentasPorUsuario() {
    $.ajax({
        type: "GET",
        url: 'admin/reportes/VentasPorUsuario',
    }).done(function(data) {
        if (data.success == true)
        {
            clean_panel();
            $('.dt-container').show();
            return $('.table').html(data.view);
        }
        msg.warning(data, 'Advertencia!');
    }); 
}