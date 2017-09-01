$(document).ready(function(){
   
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

    inhabilitarGarantia();

    /*Fin de llamado de funciones */

   
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
