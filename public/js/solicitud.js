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
            console.log($resultado);
            var $filas = '';
               $.each($resultado, function (index, valor) {
                var $id = '<td id="id" class="clic"><a href="#">'+ valor.id +'</a></td>';
                var $tipoequipo = '<td id="tipoequipo" class="">'+ valor.tipoequipo.tipo_equipo +'</td>';
                var $marca = '<td id="marca" class="">'+ valor.marca_equipo+ '</td>';
                var $serial = '<td id="serial" class="">'+ valor.serial_equipo +'</td>';
                var $bien = '<td id="bien" class="">'+ valor.bien_nacional +'</td>';
                // var $falla = '<td id="falla" class=""><div class="form-group"><textarea class="form-control" id="exampleTextarea" rows="1"></textarea></div></td>';

                $filas += '<tr>';
                $filas += $id;
                $filas += $tipoequipo;
                $filas += $marca;
                $filas += $serial;
                $filas += $bien;
                // $filas += $falla;
                $filas += '</tr>';

            });
            $("#equiposreparar tbody").html($filas);

            $("td.clic").click(function(){
                var valores="";
                // Obtenemos todos los valores contenidos en los <td> de la fila
                // seleccionada

                $(this).parents("tr").find("td").each(function(){

                    valores+=$(this).text()+"\n";
                    alert($(this).attr("id"));

                });
               console.log(valores);

            });

        })

    });


});