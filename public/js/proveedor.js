$(document).ready(function()
{
   $('.link-eliminar').click(function()
   {
       var row=$(this).parents('tr');
       var id=row.data('id');
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
               url:'./proveedorDelete',
               type:'get',
               data:{'id':id},
               
               success: function(data)
               {
                alert(data.message);
                   row.fadeOut();
               },
               error:function(e)
               {
                   alert("No se pudo eliminar el registro: " + e);
                   row.fadeIn();
                   
               }
               
           })
       }

   });
});
