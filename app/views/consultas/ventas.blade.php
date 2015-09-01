<script>

$(document).ready(function()
{
    proccess_table('Ventas');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "widthM",              "sTitle": "DPI",          "aTargets": [0]},
            {"sClass": "widthM",              "sTitle": "Usuario",      "aTargets": [1]},
            {"sClass": "widthM",              "sTitle": "Cliente",      "aTargets": [2]},
            {"sClass": "widthM",              "sTitle": "Direccion",    "aTargets": [3]},
            {"sClass": "widthS",              "sTitle": "Melonera",    	"aTargets": [4]},
            {"sClass": "widthS",              "sTitle": "Cuadrilla",  	"aTargets": [5]},
            {"sClass": "widthS",              "sTitle": "Monto",  		"aTargets": [6]},
            {"sClass": "widthM",              "sTitle": "Fecha",  		"aTargets": [7]},
        ],

        "fnDrawCallback": function( oSettings ) {
            $( ".DTTT" ).html("");
        },

        "bJQueryUI": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "user/consultas/ventas_dt"
    });

});

</script>