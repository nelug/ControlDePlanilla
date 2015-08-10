<script>

$(document).ready(function()
{
    proccess_table('Ventas');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "widthM",              "sTitle": "Cliente",      "aTargets": [0]},
            {"sClass": "widthL",              "sTitle": "Direccion",    "aTargets": [1]},
            {"sClass": "widthS",              "sTitle": "Melonera",    	"aTargets": [2]},
            {"sClass": "widthS",              "sTitle": "Cuadrilla",  	"aTargets": [3]},
            {"sClass": "widthS",              "sTitle": "Monto",  		"aTargets": [4]},
            {"sClass": "widthM",              "sTitle": "Fecha",  		"aTargets": [5]},
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