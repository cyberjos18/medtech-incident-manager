$(document).ready(function(){
   $("#eliminar").click(function(){
       var id=$("#data_id").val();
       var valor=confirm('Seguro que desea eliminar?');
       if(valor==true)
       {
           $.ajaxSetup
           ({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax
           ({
               url:'./tipoEquipoDelete',
               type:'get',
               data:{'id':id},

               success: function(data)
               {
                   alert(data.message);

               },
               error:function(e)
               {
                   alert("No se pudo eliminar el registro: " + e);


               }

           })
       }

   });
});