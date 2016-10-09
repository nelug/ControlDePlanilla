<script>

$(document).ready(function()
{
    proccess_table('Clientes');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "width10",              "sTitle": "DPI",       "aTargets": [0]},
            {"sClass": "width10",              "sTitle": "Nombre",    "aTargets": [1]},
            {"sClass": "width10",              "sTitle": "Apellido",  "aTargets": [2]},
            {"sClass": "width45",              "sTitle": "Direccion", "aTargets": [3]},
            {"sClass": "width5" ,              "sTitle": "Pago",      "aTargets": [4]},
            {"sClass": "width5" ,              "sTitle": "Venta",     "aTargets": [5]},
            {"sClass": "align_right width5",   "sTitle": "Cuadrilla", "aTargets": [6]},
            {"sClass": "align_right width10",  "sTitle": "Deuda",     "aTargets": [7]},
        ],

        "fnDrawCallback": function( oSettings ) {
            $( ".DTTT" ).html("");
            $( ".DTTT" ).append( '<button id="_create" class="btn btngrey">Nuevo</button>' );
            $( ".DTTT" ).append( '<button id="_edit_profile" class="btn btngrey btn_edit" disabled>Editar</button>' );
            $( ".DTTT" ).append( '<button id="_delete" class="btn btngrey btn_edit" disabled>Eliminar</button>' );
            $( ".DTTT" ).append( '<button id="_status" class="btn btngrey btn_edit" disabled>Estado</button>' );
            $( ".DTTT" ).append( '<button id="_abonar" class="btn btngrey btn_edit" disabled>Abonar</button>' );
            $( ".DTTT" ).append( '<button id="_vender" class="btn btngrey btn_edit" disabled>Vender</button>' );
            $( ".DTTT" ).append( '<button onclick="_actualizarFoto(this)" class="btn btngrey btn_edit" disabled>Foto</button>' );
            $( ".DTTT" ).append( '<button onclick="imprimirCliente(this)" class="btn btngrey btn_edit" disabled>imprimir</button>' );
        },

        "bJQueryUI": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "user/consultas/clientes_dt"
    });

});

$('#example').addClass('with100');

</script>
