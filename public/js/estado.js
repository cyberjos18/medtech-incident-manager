$(document).ready(function(){
   $(".link-eliminar").click(function () {
       var row=$(this).parents('tr');
       var id=row.data('id');
       var ob=confirm('Seguro que deseas eliminar?');

      if(ob==true) {

         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
         $.ajax({
            url: './centroEliminar',
            type: 'get',
            data: {'id': id},
            


            success: function (data) {
               alert(data.message);
               row.fadeOut();


            },
            error: function (e) {
               alert("No se pudo eliminar el registro: " + e);
               row.show();
            }

         })
      }
      });
   });

