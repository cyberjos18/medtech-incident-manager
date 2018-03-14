<!DOCTYPE html>
<html lang="en" >
<head>
    {!! Html::script('/js/jquery-3.1.1.min.js') !!}
    {!! Html::script('/js/centro.js') !!}
    {!! Html::script('/js/servicio.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/jquery.dataTables.min.js') !!}
    {!! Html::script('js/dataTables.bootstrap4.min.js') !!}
    {!! Html::style('/css/bootstrap.min.css') !!}
    {!! Html::style('/css/dataTables.bootstrap4.min.css') !!}
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Maestro de Centros</title>
</head>
<body>
</br>
@yield('content')
</body>
</html>