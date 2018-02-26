$(document).ready(function(){

    $.fn.datepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
        daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Hoy",
        monthsTitle: "Meses",
        clear: "Borrar",
        weekStart: 1,
        format: "dd-mm-yyyy"

    };
    $( "#fecha_recibo" ).datepicker({
        language: "es",
        autoclose: true,
        todayBtn: true,
        clearBtn:true,
        todayHighlight:true
    });
    $( "#fecha_autorizacion" ).datepicker({
        language: "es",
        autoclose: true,
        todayBtn: true,
        clearBtn:true,
        todayHighlight:true
    });
});
