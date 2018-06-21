$(document).ready(function(){
    var $divIframe=$("#iframe");
    var $tarjetas=$("#tarjetas");
    var $chartarea=$("#chartarea");
    var $chartbarra=$("#chartbarra");
    var $timeline=$("#timeline");
    var $notificacionpanel=$("#notificacionpanel");
    var $chardonut=$("#chartdonut");
    var $chat=$("#chat");
    var $cabecera=$("#cabecera");
    var $rcancelar=$("#rca");

    // Nos preocupamos por conocer el perfil de usuario asi como identificar los distintos modulos de la aplicacion

    var $perfil=$("#perfil");
    var $maestros=$("#maestros");
    var $inventarios=$("#inventarios");

    function ocultarDivIframe()
    {
        $divIframe.hide();
    }
    function mostrarDivIframe()
    {
       $divIframe.show();
       $tarjetas.hide();
       $chartarea.hide();
       $chartbarra.hide();
       $timeline.hide();
       $notificacionpanel.hide();
       $chardonut.hide();
       $chat.hide();
       $cabecera.hide();

    }
////////////////////////////////////// Llamar funciones ///////////////////////////////////

    ocultarDivIframe();

    // switch($perfil.val())
    // {
    //     case 'Usuario':
    //         $maestros.hide();
    //         $inventarios.hide();
    //         break;
    //     case 'Administrador':
    //         $maestros.show();
    //         $inventarios.show();
    //         break;
    //     default:alert("Este perfil de usuario no existe en los registros");
    //         location.href='auth/login';
    //
    // }
    

    $(':link').click(function(){
       mostrarDivIframe();
    });
    $('reload').click(function(){
       location.reload();
    });

});