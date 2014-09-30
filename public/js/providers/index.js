$(document).ready(function () {
    $('#providers').dataTable(
        {

            "language": {

                "emptyTable":     "No hay información para mostrar",
                "info":           "Mostrando página  _PAGE_ de _PAGES_",
                "infoEmpty":      "No hay datos disponibles",
                "infoFiltered":   "(Filtrado de un total de _MAX_ registros)",
                "infoPostFix":    "",
                "thousands":      ".",
                "lengthMenu":     "Mostrando _MENU_ datos",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search":         "Buscar:",
                "zeroRecords":    "No se encontraron coincidencias",
                "paginate": {
                    "first":      "Primera",
                    "last":       "Última",
                    "next":       "Próxima",
                    "previous":   "Anterior"
                },
                "aria": {
                    "sortAscending":  ": activar para ordenar de forma ascendente",
                    "sortDescending": ": activar para ordenar de forma descendente"
                }

            }
        }


    );
});

