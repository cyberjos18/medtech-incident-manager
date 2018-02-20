/*
 Archivo JS que forma parte de las solciitudes de servicio
 */

$(document).ready(function () {
    inhabilitar();

    function inhabilitar()
    {
        $("#editar").attr("disabled",false);
        $("#aceptar").attr("disabled",true);
        $("#eliminar").attr("disabled",true);
        $("#numero_solicitud").attr("disabled",true);
        $("#fecha_recibo").attr("disabled",true);
        $("#status").attr("disabled",true);
        $("#centro_id").attr("disabled",true);
        $("#jefe_servicio").attr("disabled",true);
        $("#responsable_emision").attr("disabled",true);
    }
    function habilitar()
    {
        $("#aceptar").attr("disabled",false);
        $("#eliminar").attr("disabled",false);
        $("#editar").attr("disabled",true);
        $("#numero_solicitud").attr("disabled",false);
        $("#fecha_recibo").attr("disabled",false);
        $("#status").attr("disabled",false);
        $("#centro_id").attr("disabled",true);
        $("#jefe_servicio").attr("disabled",true);
        $("#responsable_emision").attr("disabled",true);
    }

    $("#editar").click(function(){
       habilitar();
    });

});