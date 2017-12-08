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

    function validarClic($td)
    {
        var $this = $td;
        var $id = $this.attr("id");
        var Value = $this.text();

        /*Se crea un input dinamico*/
        var $input = $('<input type="text" value="' + Value + '"/>');

        /*Finalmente se agrega el input al campo TD y se le crea el foco*/
        $this.html("").append($input);
        $input.focus();

        /*Se crea una funcion para indicar que cuando el input pierda el foco ejecute lo siguiente:*/
        $input.on("blur", function () {

            var text = $input.val();
            $input.remove();
            $this.text(text);
        }).on("click", function (e) {
            e.stopPropagation()
        });
    }

       $("#centro_id").change(function () {
        var $centroId = $("#centro_id").val();
        $.ajax
        ({
            url: 'equipoListar',
            type: 'get',
            data: {'centroId': $centroId},
            dataType: 'json'

        }).done(function (data) {
            var $resultado = data.equipoListar;
            console.log($resultado);
            var $filas = '';
               $.each($resultado, function (index, valor) {
                var $id = '<td id="id" class="">'+ valor.id +'</td>';
                var $tipoequipo = '<td id="tipoequipo" class="">'+ valor.tipoequipo.tipo_equipo +'</td>';
                var $marca = '<td id="marca" class="">'+ valor.marca_equipo+ '</td>';
                var $serial = '<td id="serial" class="">'+ valor.serial_equipo +'</td>';
                var $bien = '<td id="bien" class="">'+ valor.bien_nacional +'</td>';
                var $falla = '<td id="falla" class="edit"><div class="form-group"><textarea class="form-control" id="exampleTextarea" rows="1"></textarea></div></td>';

                $filas += '<tr>';
                $filas += $id;
                $filas += $tipoequipo;
                $filas += $marca;
                $filas += $serial;
                $filas += $bien;
                $filas += $falla;
                $filas += '</tr>';

            });
            $("#equiposreparar tbody").html($filas);
            // $("td.edit").on("click", function () {
            //     validarClic($(this));
            //
            // });
        })

    });

});