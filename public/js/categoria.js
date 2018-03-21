$(document).ready(function () {
    var $categoria=$("#categoria");
    $(".link-eliminar").click(function () {
        var row = $(this).parents('tr');
        var id = row.data('id');
        var form = $('#form-delete');
        var url = form.attr('action').replace(':USER_ID', id);
        var data = form.serialize();
        var conf = confirm('Seguro que deseas eliminar?');

        if (conf == true) {
            $.post(url, data, function (result) {
                row.fadeOut();
                alert(result.message);

            }).fail(function (xhr) {
                alert('No se pudo eliminar el usuarios, ver la consola');
                console.log(xhr.responseText);
                row.show();

            });

        }
    });
    //////////////////////////// Llamamos Funciones //////////////////////////////////

    $categoria.DataTable({
        // "paging": false,
        // "info": false,
        //
        "language": {
            "search": "Buscar: ",
            "searchPlaceholder": "Escriba los datos que desea buscar",
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        }

    });
});
    

