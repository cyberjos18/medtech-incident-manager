/*
 Archivo JS que forma parte de las solciitudes de servicio
 */

$(document).ready(function () {
    inhabilitar();
    $status=$("#status");
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

    $("#editar").click(function(){
       habilitar();
    });
    $status.change(function()
    {
        var $status=$(this).val();

        if($status!=='No Procede')
        {

            observacionOculta();

        }
        else
        {
            observacionVisible();

        }

    });

    if($status.val()==='Autorizada')
    {
        $("#editar").attr("disabled",true);
    }

});