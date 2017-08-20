$(document).ready(function () {
    
    $('#estado_id').change(function () {
        //$('#localidad_id').attr("disabled",false);
        var id = $('#estado_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(id=="")
        {
            $('#localidad_id').empty();
            return false;
        }

        else
        {
            $.ajax({
                url: '../dropdown',
                type: 'get',
                data: {'id': id},

                success: function (data) {
                    $('#localidad_id').empty();

                    $.each(data, function (value, element) {
                        $('#localidad_id').append("<option value='" + value + "'>" + element + "</option>");
                    });
                },
                error: function (e) {
                    alert("Ocurrio un error al cargar la informacion: " + e);
                }
            });
        }

    });
   
});

