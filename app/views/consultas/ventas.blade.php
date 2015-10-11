<script>

$(document).ready(function()
{
    proccess_table('Ventas');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "width10",              "sTitle": "DPI",          "aTargets": [0]},
            {"sClass": "width15",              "sTitle": "Usuario",      "aTargets": [1]},
            {"sClass": "width20",              "sTitle": "Cliente",      "aTargets": [2]},
            {"sClass": "width15",              "sTitle": "Direccion",    "aTargets": [3]},
            {"sClass": "width10",              "sTitle": "Melonera",    	"aTargets": [4]},
            {"sClass": "width5",              "sTitle": "Cuadrilla",  	"aTargets": [5]},
            {"sClass": "width10",              "sTitle": "Monto",  		"aTargets": [6]},
            {"sClass": "width15",              "sTitle": "Fecha",  		"aTargets": [7]},
        ],

        "fnDrawCallback": function( oSettings ) {
            $( ".DTTT" ).html("");
        },
        "order": [7, 'asc'],
        "bJQueryUI": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "user/consultas/ventas_dt"
    });

});

</script>
