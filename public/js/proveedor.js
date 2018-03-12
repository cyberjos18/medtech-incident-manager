$(document).ready(function()
{
    var $proveedor=$("#proveedor");

    ///////////////////////////////////// Llamar Funciones ///////////////////////////////////////

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
    $proveedor.DataTable({
        // "paging": false,
        // "info": false,
        //
        "language": {
            "search": "Buscar: ",
            "searchPlaceholder": "Escriba los datos que desea buscar",
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            }
        }

    });

});
