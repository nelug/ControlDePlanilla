<script>

$(document).ready(function()
{
    proccess_table('Pagos');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "widthM",              "sTitle": "DPI",          "aTargets": [0]},
            {"sClass": "widthM",              "sTitle": "Usuario",      "aTargets": [1]},
            {"sClass": "widthM",              "sTitle": "Cliente",      "aTargets": [2]},
            {"sClass": "widthM",              "sTitle": "Direccion",    "aTargets": [3]},
            {"sClass": "widthS",              "sTitle": "Melonera",    	"aTargets": [4]},
            {"sClass": "widthS",              "sTitle": "Cuadrilla",  	"aTargets": [5]},
            {"sClass": "widthS",              "sTitle": "S. Anterior",  "aTargets": [6]},
            {"sClass": "widthS",              "sTitle": "Monto",        "aTargets": [7]},
            {"sClass": "widthS",              "sTitle": "S. Actual",  	"aTargets": [8]},
            {"sClass": "widthM",              "sTitle": "Fecha",  		"aTargets": [9]},
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