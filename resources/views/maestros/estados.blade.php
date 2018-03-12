<!DOCTYPE html>
<html lang="en">
<head>
    {!! Html::script('/js/jquery-3.1.1.min.js') !!}
    {!! Html::script('/js/estado.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/jquery.dataTables.min.js') !!}
    {!! Html::script('js/dataTables.bootstrap4.min.js') !!}
    {!! Html::style('/css/bootstrap.min.css') !!}
    {!! Html::style('/css/dataTables.bootstrap4.min.css') !!}
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <meta charset="UTF-8">
    <title>Maestro de Estados</title>
</head>
<body>
</br>
@yield('content')
</body>
</html>