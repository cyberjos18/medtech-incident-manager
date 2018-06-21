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
    function observacionOculta()
    {
        $observaciones=$("#observaciones");
        $observaciones.hide();
        $observaciones.val("NA");
        $("#lblObservaciones").hide();

    }
    function observacionVisible()
    {
        $observaciones.fadeIn(function()
        {
            $(this).show();
            $observaciones.val("");
        });
        $("#lblObservaciones").fadeIn(function()
        {
           $(this).show();
        });

    }

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
    function limpiarSolicitud()
    {
        $("#numero_solicitud").val('');
        $("#fecha_recibo").val('');
        $("#status").val('');
        $("#centro_id").val('');
        $("#jefe_servicio").val('');
        $("#responsable_emision").val('');

    }
    function tablaToArray(tablaId, numero, fecha, estatus,centro,jefe,responsable,observaciones)
    {
        //tenemos 2 variables, la primera será el Array principal donde estarán nuestros datos y la segunda es el objeto tabla
        var DATA 	= [];
        var TABLA 	= $(tablaId);

        //una vez que tenemos la tabla recorremos esta misma recorriendo cada TR y por cada uno de estos se ejecuta el siguiente codigo
        TABLA.each(function(e){
            //por cada fila o TR que encuentra rescatamos 2 datos, el ID de cada fila y la Descripción que tiene asociada en el input text
            var $id		= $(this).find("td[id='id']").text();
            var $falla 	= $(this).find("td[id='falla']").text();
            if($falla==="")
            {
                alert("No hay falla reportada");
                e.stop();
            }
            else
                if($falla!=="")
            {
                //entonces declaramos un array para guardar estos datos, lo declaramos dentro del each para así reemplazarlo y cada vez
                item = {};
                item ["id"] 	= $id;
                item ["falla"] 	= $falla;
                //una vez agregados los datos al array "item" declarado anteriormente hacemos un .push() para agregarlos a nuestro array principal "DATA".
                DATA.push(item);
            }

        });

        if($.isEmptyObject(DATA))
        {
            alert("No hay equipos reportados")
        }
        else
        {
            //eventualmente se lo vamos a enviar por PHP por ajax de una forma bastante simple y además convertiremos el array en json para evitar cualquier incidente con compatibilidades.
            aInfo 	= JSON.stringify(DATA);
            console.log(aInfo);
            $.ajax
            ({
                url:'../solicitudGuardar',
                type:'get',
                data:{'numerosolicitud':numero,'fecharecibo':fecha,'status':estatus,'centroid':centro,'jefeservicio':jefe,'responsable':responsable,'ereportados':aInfo,'observaciones':observaciones}

            }).done(function(data){
                console.log(data.mensaje);
                limpiarSolicitud();
                location.href='../solicitudservicio';

            })
        }

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
                        "<td id='id' class='id'>" + $objeto.id + "</td>" +
                        "<td id='tipo' class='tipo'>" + $objeto.tipoequipo + "</td>" +
                        "<td id='marca'>" + $objeto.marca + "</td>" +
                        "<td id='serial' class='serial'>" + $objeto.serial + "</td>" +
                        "<td id='bien'>" + $objeto.bien + "</td>" +
                        "<td id='falla' class='falla' title='Describa la falla, haga clic aqui'></td>" +
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
    $("#formularioajax").submit(function(e){
        e.preventDefault();
        var $formdata=new FormData($("#formularioajax")[0]);
        $.ajax
        ({
            url:'../validarCampos',
            type:'POST',
            data:$formdata,
            dataType:'json',
            cache: false,
            contentType: false,
            processData: false

        }).done(function(data){
            if(data.bandera===0)
            {
                location.reload();
            }

            else
            {
                    var $numerosolicitud=$("#numero_solicitud").val();
                    var $fecharecibo=$("#fecha_recibo").val();
                    var $status=$("#status").val();
                    var $centroid=$("#centro_id").val();
                    var $jefeservicio=$("#jefe_servicio").val();
                    var $responsable=$("#responsable_emision").val();
                    var $observaciones=$("#observaciones").val();
                    var tabla=$("#equiposreportados tbody > tr");
                    tablaToArray(tabla,$numerosolicitud,$fecharecibo,$status,$centroid,$jefeservicio,$responsable,$observaciones);

            }

        });

    });
    $("#solicitud").DataTable({
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
    observacionOculta();
    $("#status").change(function()
    {
        var $status=$("#status").val();

        if($status==='No Procede')
        {
           observacionVisible();

        }
        else
        {
            observacionOculta();
        }

    });

});