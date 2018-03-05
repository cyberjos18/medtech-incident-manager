$(document).ready(function(){

    var $numero_autorizacion=$("#numero_autorizacion");
    var $fecha_autorizacion=$("#fecha_autorizacion");
    var $solicitud_id=$("#solicitud_id");
    var $proveedor_id=$("#proveedor_id");
    var $status=$("#status");
    var $seguimiento=$("#seguimiento");
    var $editar=$("#editar");
    var $aceptar=$("#aceptar");
    function inhabilitar()
    {
        $numero_autorizacion.attr("disabled",true);
        $fecha_autorizacion.attr("disabled",true);
        $solicitud_id.attr("disabled",true);
        $proveedor_id.attr("disabled",true);
        $status.attr("disabled",true);
        $seguimiento.attr("disabled",true);
        $editar.attr("disabled",false);
        $aceptar.attr("disabled",true);

    }
    function habilitar()
    {
        $numero_autorizacion.attr("disabled",false);
        $fecha_autorizacion.attr("disabled",false);
        $solicitud_id.attr("disabled",false);
        $proveedor_id.attr("disabled",false);
        $status.attr("disabled",false);
        $seguimiento.attr("disabled",false);
        $editar.attr("disabled",true);
        $aceptar.attr("disabled",false);

    }

    //////////////////////////////////////////*Llamamos a las funciones*///////////////////////////////////////////////

    inhabilitar();

    $editar.click(function(){
        habilitar();
    });
});