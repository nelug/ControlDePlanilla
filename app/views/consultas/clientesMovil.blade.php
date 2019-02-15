<input type="hidden" value="{{ $cuadrilla_id }}" id="cuadrilla_id">

<script>
$(document).ready(function()
{

    proccess_table('Clientes');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "width10",              "sTitle": "Nombre",    "aTargets": [0]},
            {"sClass": "width10",              "sTitle": "Apellido",  "aTargets": [1]},
            {"sClass": "width5" ,              "sTitle": "Quincena",  "aTargets": [2]},
            {"sClass": "width5" ,              "sTitle": "Pago",      "aTargets": [3]},
            {"sClass": "width5" ,              "sTitle": "Venta",     "aTargets": [4]},
            {"sClass": "align_right width10",  "sTitle": "Deuda",     "aTargets": [5]},
        ],

        "fnDrawCallback": function( oSettings ) {
            $( ".DTTT" ).html("");
            $( ".DTTT" ).append( '<button id="_create" class="btn btngrey">Nuevo</button>' );
            $( ".DTTT" ).append( '<button id="_edit_profile" class="btn btngrey btn_edit" disabled>Editar</button>' );
            $( ".DTTT" ).append( '<button id="_status" class="btn btngrey btn_edit" disabled>Estado</button>' );
            $( ".DTTT" ).append( '<button id="_abonar" class="btn btngrey btn_edit" disabled>Abonar</button>' );
            $( ".DTTT" ).append( '<button id="_vender" class="btn btngrey btn_edit" disabled>Vender</button>' );
            $( ".DTTT" ).append( '<button onclick="_actualizarFoto(this)" class="btn btngrey btn_edit" disabled>Foto</button>' );
        },

        "bJQueryUI": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "user/consultas/clientes_dt_where/"+idCuadrillaMovil
    });

});

$('#example').addClass('with100');

</script>
