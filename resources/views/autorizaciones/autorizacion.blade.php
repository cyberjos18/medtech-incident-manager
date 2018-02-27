<!DOCTYPE html>
<html lang="en">
<head>
    {!! Html::script('/js/jquery-3.1.1.min.js') !!}
    @yield('script')
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/bootstrap-datepicker/bootstrap-datepicker.min.js') !!}
    {!! Html::script('/js/bootstrap-datepicker/bootstrap-datepicker.es.js') !!}
    {!! Html::style('/css/bootstrap-datepicker/bootstrap-datepicker3.min.css') !!}
    {!! Html::script('/js/jquery.dataTables.min.js') !!}
    {!! Html::script('js/dataTables.bootstrap4.min.js') !!}
    {!! Html::style('/css/bootstrap.min.css') !!}
    {!! Html::style('/css/dataTables.bootstrap4.min.css') !!}
    <meta charset="UTF-8">
    <title>Autorizacion</title>
</head>
<body>
</br>
@yield('content')
</body>
</html>