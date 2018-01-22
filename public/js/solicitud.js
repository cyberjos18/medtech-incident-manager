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

    var $c = 0;
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
                    var iden="";
                    var valu="";
                    var $obje=[];


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
                        '<td id="falla" class=""><div class="form-group"><textarea class="form-control" id="exampleTextarea" rows="1"></textarea></div></td>' +
                        "</tr>");

                    /*Convierte un table en un array*/
                    var myArr = $("#equiposreportados").find('tr').map(function(){
                        return [$("td", this).map(function(){
                            return $(this).text();}).get()];
                    }).get();
                    console.log(myArr);
                    Array.prototype.unique=function(a){
                        return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
                    });
                    console.log(myArr.unique());


                    /*Elimina valores duplicados de un array*/
                    function eliminateDuplicates(arr) {
                        var i,
                            len=arr.length,
                            out=[],
                            obj={};

                        for (i=0;i<len;i++) {
                            obj[arr[i]]=0;
                        }
                        for (i in obj) {
                            out.push(i);
                        }
                        return out;
                    }
                    console.log(eliminateDuplicates(myArr));


                    $("#myModal").modal("hide");



                    // var $tipoEquipo = $("td.tipo:first").text();
                    // var $serialEquipo = $("td.serial:first").text();
                    // var $tipoEquipo2 = $("td.tipo:last").text();
                    // var $serialEquipo2 = $("td.serial:last").text();
                    //
                    // if ($objeto.tipoequipo !== $tipoEquipo) {
                    //     alert("En la solicitud de servicio los equipos a reparar deben ser del mismo tipo");
                    //     removerFilas();
                    // }
                    // else if ($objeto.tipoequipo == $tipoEquipo && $objeto.serial == $serialEquipo || $objeto.tipoequipo == $tipoEquipo2 && $objeto.serial == $serialEquipo2)
                    // {
                    //     $c++;
                    //     console.log($c);
                    //     if ($c > 1) {
                    //         alert("Este equipo ya esta reportado en la lista");
                    //         removerFilas();
                    //
                    //
                    //     }
                    //
                    //
                    // }

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