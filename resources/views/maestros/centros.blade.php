<!DOCTYPE html>
<html lang="en" >
<head>
    {!! Html::script('/js/jquery-3.0.0.min.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/centro.js') !!}
    {!! Html::script('/js/servicio.js') !!}
    {!! Html::style('/css/bootstrap.min.css') !!}
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <meta charset="UTF-8">
    <title>Maestro de Centros</title>
</head>
<body>
</br>
@yield('content')
</body>
</html>