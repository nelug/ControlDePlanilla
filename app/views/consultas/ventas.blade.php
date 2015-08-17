<script>

$(document).ready(function()
{
    proccess_table('Ventas');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "widthM",              "sTitle": "Usuario",      "aTargets": [0]},
            {"sClass": "widthM",              "sTitle": "Cliente",      "aTargets": [1]},
            {"sClass": "widthM",              "sTitle": "Direccion",    "aTargets": [2]},
            {"sClass": "widthS",              "sTitle": "Melonera",    	"aTargets": [3]},
            {"sClass": "widthS",              "sTitle": "Cuadrilla",  	"aTargets": [4]},
            {"sClass": "widthS",              "sTitle": "Monto",  		"aTargets": [5]},
            {"sClass": "widthM",              "sTitle": "Fecha",  		"aTargets": [6]},
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