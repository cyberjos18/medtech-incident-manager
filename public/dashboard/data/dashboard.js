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

    $(':link').click(function(){
       mostrarDivIframe();
    });
    $('dash').click(function(){
       location.reload();
    });
});