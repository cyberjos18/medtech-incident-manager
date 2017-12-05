$(document).ready(function(){

    function inhabilitar()
    {
        $("#aceptar_serv").attr("disabled",true);
        $("#eliminar_serv").attr("disabled",true);
        $("#nomb_servicio").attr("disabled",true);
    }
    function habilitar()
    {
        $("#aceptar_serv").attr("disabled",false);
        $("#eliminar_serv").attr("disabled",false);
        $("#nomb_servicio").attr("disabled",false);
    }

  inhabilitar();

  $("#editar_serv").click(function(){
    habilitar();
  });
  $("#eliminar_serv").click(function(){
    var $id=$("#id").val();
    var $conf=confirm("Seguro que desea eliminar?");
    if($conf==true)
    {
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
      $.ajax
        ({
            url:'../../servicioEliminar',
            type:'get',
            data: {'id':$id},
            dataType:'json'
        }).done(function(data){
            alert(data.message);
            $("#cancelar_serv").html("Regresar");
            $("#editar_serv").attr("disabled",true);
            inhabilitar();
      })

    }
  });
});
