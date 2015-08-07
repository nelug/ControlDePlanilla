function mostrarTablaClientes() {
    $.get( "user/consultas/clientes", function( data ) {
        makeTable(data, 'user/cliente/', 'Usuario');
    });
}

function mostrarTablaCuadrillas() {
    $.get( "user/consultas/cuadrillas", function( data ) {
        makeTable(data, 'user/cuadrilla/', 'Usuario');
    });
}

function mostrarTablaMelonera() {
    $.get( "user/consultas/melonera", function( data ) {
        makeTable(data, 'user/melonera/', 'Usuario');
    });
}