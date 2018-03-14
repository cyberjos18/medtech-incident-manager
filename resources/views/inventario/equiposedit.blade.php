<!DOCTYPE html>
<html lang="en">
<head>
    {!! Html::script('/js/jquery-3.0.0.min.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::style('/css/bootstrap.min.css') !!}
    {!! Html::script('/js/equipoedit.js') !!}
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Inventario - Entradas</title>
</head>
<body>
<p></p>
@yield('content')
</body>
</html>