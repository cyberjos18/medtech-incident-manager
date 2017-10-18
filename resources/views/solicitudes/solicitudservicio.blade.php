<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    {!! Html::script('/js/jquery-3.1.1.min.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/angular.js') !!}
    {!! Html::script('/js/datepicker.js') !!}
    {!! Html::script('/js/datepicker/jquery-ui.js') !!}
    {!! Html::style('/css/datepicker/jquery-ui.css') !!}
    {!! Html::style('/css/bootstrap.min.css') !!}

    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta charset="UTF-8">
    <title>Solicitud de Servicio</title>
</head>
<body>
</br>
@yield('content');
</body>
</html>