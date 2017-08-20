$(document).ready(function () {
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

            }).fail(function () {
                alert('No se pudo eliminar el registro');
                row.show();

            });

        }
    });
});
    

