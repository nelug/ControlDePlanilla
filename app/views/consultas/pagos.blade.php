<script>

$(document).ready(function()
{
    proccess_table('Pagos');

    $('#example').dataTable({
        "aoColumnDefs": [
            {"sClass": "width10 pagos",              "sTitle": "DPI",          "aTargets": [0]},
            {"sClass": "width10 pagos",              "sTitle": "Usuario",      "aTargets": [1]},
            {"sClass": "width20 pagos",              "sTitle": "Cliente",      "aTargets": [2]},
            {"sClass": "width15 pagos",              "sTitle": "Direccion",    "aTargets": [3]},
            {"sClass": "width10 pagos",              "sTitle": "Melonera",    	"aTargets": [4]},
            {"sClass": "width5  pagos",              "sTitle": "Cuadrilla",  	"aTargets": [5]},
            {"sClass": "width5",              "sTitle": "Anterior",  "aTargets": [6]},
            {"sClass": "width5",              "sTitle": "Monto",        "aTargets": [7]},
            {"sClass": "width5",              "sTitle": "Actual",  	"aTargets": [8]},
            {"sClass": "width15 pagos",              "sTitle": "Fecha",  		"aTargets": [9]},
        ],

        "fnDrawCallback": function( oSettings ) {
            $( ".DTTT" ).html("");
        },
        "order": [9, 'desc'],
        "bJQueryUI": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "user/consultas/pagos_dt"
    });
    $('#example').addClass('with100');
});

</script>
