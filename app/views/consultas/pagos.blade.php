<script>

$(document).ready(function()
{
    proccess_table('Pagos');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "width10",              "sTitle": "DPI",          "aTargets": [0]},
            {"sClass": "width15",              "sTitle": "Usuario",      "aTargets": [1]},
            {"sClass": "width20",              "sTitle": "Cliente",      "aTargets": [2]},
            {"sClass": "width15",              "sTitle": "Direccion",    "aTargets": [3]},
            {"sClass": "width10",              "sTitle": "Melonera",    	"aTargets": [4]},
            {"sClass": "width5",              "sTitle": "Cuadrilla",  	"aTargets": [5]},
            {"sClass": "width5",              "sTitle": "S. Anterior",  "aTargets": [6]},
            {"sClass": "width5",              "sTitle": "Monto",        "aTargets": [7]},
            {"sClass": "width5",              "sTitle": "S. Actual",  	"aTargets": [8]},
            {"sClass": "width10",              "sTitle": "Fecha",  		"aTargets": [9]},
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