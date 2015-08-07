<script>

$(document).ready(function()
{
    proccess_table('Usuarios');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "widthM",              "sTitle": "DPI",       "aTargets": [0]},
            {"sClass": "widthM",              "sTitle": "Nombre",    "aTargets": [1]},
            {"sClass": "widthM",              "sTitle": "Apellido",  "aTargets": [2]},
            {"sClass": "widthL",  "sTitle": "Direccion", "aTargets": [3]},
            {"sClass": "align_right widthS",  "sTitle": "Deuda",     "aTargets": [4]},
        ],

        "fnDrawCallback": function( oSettings ) {
            $( ".DTTT" ).html("");
            $( ".DTTT" ).append( '<button id="_create" class="btn btngrey">New</button>' );
            $( ".DTTT" ).append( '<button id="_edit_profile" class="btn btngrey btn_edit" disabled>Edit</button>' );
            $( ".DTTT" ).append( '<button id="_delete" class="btn btngrey btn_edit" disabled>Delete</button>' );
        },

        "bJQueryUI": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "user/consultas/clientes_dt"
    });

});

</script>