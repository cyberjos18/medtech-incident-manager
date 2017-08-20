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
    
});
