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

    function removerFilas() {
        $("#equiposreportados tbody tr:last").fadeOut(function () {
            $(this).remove();
        });
    }
    function insertarInput($td)
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

    $("#mas").click(function () {
        var $centroId = $("#centro_id").val();
        if ($centroId !== "") {
            $("#myModal").modal("show");

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

                    $("#equiposreportados tbody").append(
                        "<tr>" +
                        "<td class='id'>" + $objeto.id + "</td>" +
                        "<td class='tipo'>" + $objeto.tipoequipo + "</td>" +
                        "<td>" + $objeto.marca + "</td>" +
                        "<td class='serial'>" + $objeto.serial + "</td>" +
                        "<td>" + $objeto.bien + "</td>" +
                        '<td class="falla" title="Describa la falla, haga clic aqui"></td>' +
                        "</tr>");
                    $("td.falla").click(function(){
                       insertarInput($(this));
                    });

                    /*Se convierte la tabla equipos reportados en un arreglo despues de cargar los equipos*/

                    var TableData = new Array();
                    $('#equiposreportados tr').each(function (row, tr) {
                        TableData[row] = {
                            "id": $(tr).find('td:eq(0)').text(),  // id.
                            "tipo": $(tr).find('td:eq(1)').text(),  // tipoequipo
                            "marca": $(tr).find('td:eq(2)').text(),  // marca
                            "serial": $(tr).find('td:eq(3)').text(),  // serial
                            "bien": $(tr).find('td:eq(4)').text(),  // bien
                            "falla": $(tr).find('td:eq(5)').text()   // falla
                        };
                    });
                    TableData.shift();

                    var $c = 0;
                    $.each(TableData, function (i, v) {
                        if (v.id === $objeto.id) {
                            $c++;
                        }
                        if ($c === 2) {
                            removerFilas();
                        }
                    });

                    /*Seguir leyendo esto: https://www.fourfront.us/blog/store-html-table-data-to-javascript-array*/
                    $("#myModal").modal("hide");

                    var $tipoEquipo = $("td.tipo:first").text();
                    if ($objeto.tipoequipo !== $tipoEquipo) {
                        alert("En la solicitud de servicio los equipos a reparar deben ser del mismo tipo");
                        removerFilas();
                    }
                });
            });
        }
        else {
            alert("Debe elegir el centro de atencion");
        }
    });
    $("#menos").click(function () {
        removerFilas();
    });
});