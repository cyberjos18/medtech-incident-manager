$(document).ready(function () {
    //$('#localidad_id').attr("disabled",true);
    function inhabilitar()
    {
        $('#nomb_centro').attr("disabled",true);
        $("#director_centro").attr("disabled",true);
        $("#categoria_id").attr("disabled",true);
        $("#estado_id").attr("disabled",true);
        $("#aceptar").attr("disabled",true);
        $("#editar").attr("disabled",false);
        $("#eliminar").attr('disabled',true);
        $('#localidad_id').attr("disabled",true);
    }
    function limpiar()
    {
        $('#nomb_centro').val("");
        $("#director_centro").val("");
        $("#categoria_id").val("Seleccione...");
        $("#estado_id").val("Seleccione...");
        $('#localidad_id').val("Seleccione...");
    }
    function habilitar()
    {
        $('#nomb_centro').attr("disabled",false);
        $("#director_centro").attr("disabled",false);
        $("#categoria_id").attr("disabled",false);
        $("#estado_id").attr("disabled",false);
        $("#aceptar").attr("disabled",false);
        $("#editar").attr("disabled",true);
        $("#eliminar").attr('disabled',false);
        $('#localidad_id').attr("disabled",false);
    }

    inhabilitar();

    $('#editar').click(function(){
       habilitar();
    });

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
    $("#eliminar").click(function(){
       var id=$("#centroId").val();
       var conf=confirm("Seguro que desea eliminar?");
        if(conf==true)
        {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'../centroEliminar',
            type:'get',
            data:{'id':id},
            
            success: function(data)
            {
                alert(data.message);
                inhabilitar();
                limpiar();
                $("#editar").attr("disabled",true);
                $("#cancelar").html("Regresar");
                
            },
            error: function (e)
            {
                alert("Ocurrio un error al actualizar la informacion: "+e);
            }
        });
        }
        else
        {
            inhabilitar();
        }
    });
    /*$("#formulario").submit(function(){
       return true;
    });*/
});

