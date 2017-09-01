$(document).ready(function(){
    function limpiar()
    {
        $("#centro_id").val("Seleccione...");
        $("#servicio_id").val("Seleccione...");
        $("#nomb_equipo").val("");
        $("#marca_equipo").val("");
        $("#modelo_equipo").val("");
        $("#serial_equipo").val("");
        $("#bien_nacional").val("");
        $("#estatus_equipo").val("Seleccione...");
        $("#equipo_garantia").val("Seleccione...");
        $("#responsable_garantia").val("");
        $("#duracion_garantia").val("");
        $("#observaciones_equipo").val("");
    }
    function inhabilitar()
    {
        $("#centro_id").attr("disabled",true);
        $("#servicio_id").attr("disabled",true);
        $("#nomb_equipo").attr("disabled",true);
        $("#marca_equipo").attr("disabled",true);
        $("#modelo_equipo").attr("disabled",true);
        $("#serial_equipo").attr("disabled",true);
        $("#bien_nacional").attr("disabled",true);
        $("#estatus_equipo").attr("disabled",true);
        $("#equipo_garantia").attr("disabled",true);
        $("#aceptar").attr("disabled",true);
        $("#eliminar").attr("disabled",true);
    }
    function habilitar()
    {
        $("#centro_id").attr("disabled",false);
        $("#servicio_id").attr("disabled",false);
        $("#nomb_equipo").attr("disabled",false);
        $("#marca_equipo").attr("disabled",false);
        $("#modelo_equipo").attr("disabled",false);
        $("#serial_equipo").attr("disabled",false);
        $("#bien_nacional").attr("disabled",false);
        $("#estatus_equipo").attr("disabled",false);
        $("#equipo_garantia").attr("disabled",false);
        $("#aceptar").attr("disabled",false);
        $("#eliminar").attr("disabled",false);
    }
   function inhabilitarGarantia()
   {
       $("#responsable_garantia").attr("disabled",true);
       $("#duracion_garantia").attr("disabled",true);


   }
    function habilitarGarantia()
    {
        $("#responsable_garantia").attr("disabled",false);
        $("#duracion_garantia").attr("disabled",false);
    }

    /*Llamado de funciones*/

    inhabilitar();
    inhabilitarGarantia();

    /*Fin de llamado de funciones */
    $("#incluir").click(function(){
       habilitar(); 
    });
    $("#editar").click(function(){
      habilitar()
    });
    $("#eliminar").click(function(){
       var id=$("#equipoid").val();
       var conf=confirm("Seguro que desea eliminar?");
        if(conf==true)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'../equipoEliminar',
                type:'get',
                data:{'id':id},

                success: function(data)
                {
                    alert(data.message);
                    inhabilitar();
                    limpiar();
                    $("#editar").attr("disabled",true);
                    $("#cancelaredit").html("Regresar");

                },
                error: function (e)
                {
                    alert("Ocurrio un error al actualizar la informacion: "+e);
                }
            });
        }
    });

    $("#centro_id").change(function(){
       var id;
        id=$("#centro_id").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(id=="")
        {
            $("#servicio_id").empty();
            return false;
        }
        else
        {
            $.ajax
            ({
                url:'../dropDownBuscarServicios',
                type:'get',
                data:{'id':id},
                
                success: function(data)
                {
                    $("#servicio_id").empty();
                    $.each(data,function(value,element){
                        $("#servicio_id").append("<option value='"+value+"'>"+element+"</option>");
                        
                    });
                    
                },
                error: function(e)
                {
                    alert("Ocurrio un error al cargar la informacion: " + e);  
                }
                
            });
           
        }
    });
   $("#equipo_garantia").change(function(){
       var valor=$("#equipo_garantia").val();
       if(valor=="SI")
       {
           habilitarGarantia();
       }
       else
       {
           inhabilitarGarantia();
       }
   });
    

});
