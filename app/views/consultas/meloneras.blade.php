<script>

$(document).ready(function()
{
    proccess_table('Meloneras');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "widthM",              "sTitle": "Melonera",       "aTargets": [0]},
            {"sClass": "widthM",              "sTitle": "Cantidad Cuadrillas",    "aTargets": [1]},
            {"sClass": "widthL",              "sTitle": "Fecha de Creacion",  "aTargets": [2]},
        ],

        "fnDrawCallback": function( oSettings ) {
            $( ".DTTT" ).html("");
            $( ".DTTT" ).append( '<button id="_create" class="btn btngrey">New</button>' );
            $( ".DTTT" ).append( '<button id="_edit_profile" class="btn btngrey btn_edit" disabled>Edit</button>' );
        },

        "bJQueryUI": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "user/consultas/meloneras_dt"
    });

});

</script>