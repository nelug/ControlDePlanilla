function mostrarTablaClientes() {
    $.get( "user/consultas/clientes", function( data ) {
        makeTable(data, 'user/cliente/', 'Clientes');
    });
}

function mostrarTablaCuadrillas() {
    $.get( "user/consultas/cuadrillas", function( data ) {
        makeTable(data, 'user/cuadrilla/', 'Cuadrillas');
    });
}

function mostrarTablaMelonera() {
    $.get( "user/consultas/meloneras", function( data ) {
        makeTable(data, 'user/melonera/', 'Meloneras');
    });
} 