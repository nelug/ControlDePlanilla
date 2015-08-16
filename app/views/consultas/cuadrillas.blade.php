<script>

$(document).ready(function()
{
    proccess_table('Cuadrillas');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "widthM",              "sTitle": "Cuadrilla",       "aTargets": [0]},
            {"sClass": "widthM",              "sTitle": "Melonera",    "aTargets": [1]},
            {"sClass": "widthL",              "sTitle": "Caporal",  "aTargets": [2]},
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
        "sAjaxSource": "user/consultas/cuadrillas_dt"
    });

});

</script>