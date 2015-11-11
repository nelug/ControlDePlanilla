<script>

$(document).ready(function()
{
    proccess_table('Clientes');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "widthM",              "sTitle": "DPI",       "aTargets": [0]},
            {"sClass": "widthM",              "sTitle": "Nombre",    "aTargets": [1]},
            {"sClass": "widthM",              "sTitle": "Apellido",  "aTargets": [2]},
            {"sClass": "widthL",              "sTitle": "Direccion", "aTargets": [3]},
            {"sClass": "align_right widthS",  "sTitle": "Cuadrilla", "aTargets": [4]},
            {"sClass": "align_right widthS",  "sTitle": "Deuda",     "aTargets": [5]},
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
        },

        "bJQueryUI": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "user/consultas/clientes_dt"
    });

});

$('#example').addClass('with100');

</script>
