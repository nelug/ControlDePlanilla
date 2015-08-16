<script>

$(document).ready(function()
{
    proccess_table('Pagos');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "widthM",              "sTitle": "Cliente",      "aTargets": [0]},
            {"sClass": "widthM",              "sTitle": "Direccion",    "aTargets": [1]},
            {"sClass": "widthS",              "sTitle": "Melonera",    	"aTargets": [2]},
            {"sClass": "widthS",              "sTitle": "Cuadrilla",  	"aTargets": [3]},
            {"sClass": "widthS",              "sTitle": "S. Anterior",  "aTargets": [4]},
            {"sClass": "widthS",              "sTitle": "Monto",        "aTargets": [5]},
            {"sClass": "widthS",              "sTitle": "S. Actual",  	"aTargets": [6]},
            {"sClass": "widthM",              "sTitle": "Fecha",  		"aTargets": [7]},
        ],

        "fnDrawCallback": function( oSettings ) {
            $( ".DTTT" ).html("");
        },

        "bJQueryUI": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "user/consultas/pagos_dt"
    });

});

</script>