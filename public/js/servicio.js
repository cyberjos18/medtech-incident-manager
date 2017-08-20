$(document).ready(function(){

    function limpiar()
    {
        $("#nomb_servicio").val("");
    }

  $("#incluir").click(function(){
       var centroID=$("#centroId").val();
       var servicio=$("#nomb_servicio").val();
       if(servicio=="")
       {
           alert("El nombre del servicio no puede ser blanco")
       }
       else {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               url: '../servicioAgregar',
               type: 'GET',
               data: {'centroId': centroID, 'nombServicio': servicio},

               success: function (data) {
                   alert(data.message);
                   limpiar();
                   $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                   });
                   $.ajax({
                       url: '../servicioListar',
                       type: 'GET',
                       data: {'centroId': centroID},


                       success: function (data) {

                           $("#contenido").html('');
                           $.each(data.resultado,function (index,value) {
                               $("#contenido").append("<tr><td>"+value.id+"</td><td>"+value.nomb_servicio+"</td><td><a  href='http://127.0.0.1/dgmtm/public/maestros/servicios/"+value.id+"/edit'>Editar</a></td></tr>").fadeIn();
                               
                           })

                       },
                       error: function (e) {
                           alert("Ocurrio un error al listar la informacion: " + e);
                       }

                   });

               },
               error: function (e) {
                   alert("Ocurrio un error al insertar la informacion: " + e);
               }

           });
       }
   });
  $("#ver").click(function(){
      var centroID=$("#centroId").val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url: '../servicioListar',
          type: 'GET',
          data: {'centroId': centroID},


          success: function (data) {
              
            $("#contenido").html('');
              $.each(data.resultado,function (index,value) {
                  $("#contenido").append("<tr><td>"+value.id+"</td><td>"+value.nomb_servicio+"</td><td><a  href='http://127.0.0.1/dgmtm/public/maestros/servicios/"+value.id+"/edit'>Editar</a></td></tr>");
              })

          },
          error: function (e) {
              alert("Ocurrio un error al listar la informacion: " + e);
          }

      });
  });

    
});
