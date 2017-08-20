<!DOCTYPE html>
<html lang="en">
<head>
    {!! Html::script('/js/jquery-3.1.1.min.js')!!}
    {!! Html::script('/js/bootstrap.min.js')!!}
    {!! Html::style('/css/bootstrap.min.css') !!}
    {!! Html::script('/js/localidad.js') !!}
    <meta name="csrf-token" content="{{csrf_token()}}" >

    <meta charset="UTF-8">
    <title>Maestro de Localidades</title>
</head>
<body>
<p></p>
@yield('content');
</body>
</html>