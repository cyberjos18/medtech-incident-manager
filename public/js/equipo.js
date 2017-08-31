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
        $("#equipo_garantia").val("Seleccione...");
        $("#responsable_garantia").val("");
        $("#duracion_garantia").val("");
        $("#observaciones_equipo").val("");
    }
   function inhabilitar()
   {
       $("#responsable_garantia").attr("disabled",true);
       $("#duracion_garantia").attr("disabled",true);
       $("#aceptar").attr("disabled",true);
       $("#eliminar").attr("disabled",true);

   }
    function habilitar()
    {
        $("#responsable_garantia").attr("disabled",false);
        $("#duracion_garantia").attr("disabled",false);
    }

    /*Llamado de funciones*/

    inhabilitar();

    /*Fin de llamado de funciones */

    $("#editar").click(function(){
        $("#aceptar").attr("disabled",false);
        $("#eliminar").attr("disabled",false);
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
           habilitar();
       }
       else
       {
           inhabilitar();
       }
   });

  /*Llamado de DataTable de Equuipo*/
    $("#ejemplo").DataTable({
        "paging": false,
        "info": false,

        "language": {
            "search": "Buscar: ",
            "searchPlaceholder": "Escriba los datos que desea buscar"
        }
        
    });

});
