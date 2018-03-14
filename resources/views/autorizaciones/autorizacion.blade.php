<!DOCTYPE html>
<html lang="en">
<head>
    <!--
    - Primero se debe instanciar la libreria jquery
    - Luego la libreria propia del componente
    - bootstrap.js
    - Si hay datatable los js del datatable van primero, si hay un estilo en particular (theme del datatable) debe ir despues del js del datatable
    - Por ultimo el bootstrap css y lo demas estilos bootstrap existentes
    -->
    {!! Html::script('/js/jquery-3.1.1.min.js') !!}
    @yield('script')
    {!! Html::script('/js/autorizacion.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/bootstrap-datepicker/bootstrap-datepicker.min.js') !!}
    {!! Html::script('/js/bootstrap-datepicker/bootstrap-datepicker.es.js') !!}
    {!! Html::style('/css/bootstrap-datepicker/bootstrap-datepicker3.min.css') !!}
    {!! Html::script('/js/jquery.dataTables.min.js') !!}
    {!! Html::script('js/dataTables.bootstrap4.min.js') !!}
    {!! Html::style('/css/bootstrap.min.css') !!}
    {!! Html::style('/css/dataTables.bootstrap4.min.css') !!}
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autorizacion</title>
</head>
<body>
</br>
@yield('content')
</body>
</html>