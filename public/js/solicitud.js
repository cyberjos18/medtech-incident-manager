/*
 Archivo JS que forma parte de las solciitudes de servicio
 */

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function (jqXHR, textStatus, errorThrown) {

            if (jqXHR.status === 0) {

                console.log('Not connect: Verify Network.');

            } else if (jqXHR.status == 404) {

                console.log('Requested page not found [404]');

            } else if (jqXHR.status == 500) {

                console.log('Internal Server Error [500].');

            } else if (textStatus === 'parsererror') {

                console.log('Requested JSON parse failed.');

            } else if (textStatus === 'timeout') {

                console.log('Time out error.');

            } else if (textStatus === 'abort') {

                console.log('Ajax request aborted.');

            } else {

                console.log('Uncaught Error: ' + jqXHR.responseText);

            }

        }
    });
    $("#mas").click(function () {
        var $centroId = $("#centro_id").val();
        $.ajax
        ({
            url: 'equipoListar',
            type: 'get',
            data: {'centroId': $centroId},
            dataType: 'json'

        }).done(function (data) {
            var $resultado = data.equipoListar;

            /* Mostramos la lista de equipos que pertenecen al centro */

            var $filas = '';
            $.each($resultado, function (index, valor) {
                var $id = '<td id="id" class="clic"><a href="#">' + valor.id + '</a></td>';
                var $tipoequipo = '<td id="tipoequipo" class="">' + valor.tipoequipo.tipo_equipo + '</td>';
                var $marca = '<td id="marca" class="">' + valor.marca_equipo + '</td>';
                var $serial = '<td id="serial" class="">' + valor.serial_equipo + '</td>';
                var $bien = '<td id="bien" class="">' + valor.bien_nacional + '</td>';


                $filas += '<tr>';
                $filas += $id;
                $filas += $tipoequipo;
                $filas += $marca;
                $filas += $serial;
                $filas += $bien;
                $filas += '</tr>';

            });
            $("#equiposreparar tbody").html($filas);

            $("td.clic").click(function () {
                var valores = "";
                var identy = "";
                var $objeto = [];

                // Obtenemos todos los valores contenidos en los <td> de la fila
                // seleccionada

                $(this).parents("tr").find("td").each(function () {
                    identy = $(this).attr("id");
                    valores = $(this).text();
                    $objeto[identy] = valores;

                });

                /* Creamos el datatble que indica cuales son los equipos que se repararan del centro esto se obtiene al hacer clic de la lista
                 * de los equipos que son del centro */

                $("#equiposreportados tbody").append(
                    "<tr>" +
                    "<td>" + $objeto.id + "</td>" +
                    "<td>" + $objeto.tipoequipo + "</td>" +
                    "<td>" + $objeto.marca + "</td>" +
                    "<td>" + $objeto.serial + "</td>" +
                    "<td>" + $objeto.bien + "</td>" +
                    '<td id="falla" class=""><div class="form-group"><textarea class="form-control" id="exampleTextarea" rows="1"></textarea></div></td>' +
                    "</tr>");

                $("#myModal").modal("hide");


            });

        });

    });

    $("#menos").click(function () {
        $("#equiposreportados tbody tr:last").fadeOut(function () {
            $(this).remove();
        })
    });


});