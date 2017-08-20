<!DOCTYPE html>
<html lang="en">
<head>
    {!! Html::script('/js/jquery-3.1.1.min.js') !!}
    {!! Html::script('/js/bootstrap.min.js')!!}
    {!! Html::script('/js/proveedor.js') !!}
    {!! Html::style('/css/bootstrap.min.css') !!}
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <meta charset="UTF-8">
    <title>Maestros de Proveedores</title>
</head>
<body>
<p></p>
@yield('content')
</body>
</html>