<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    {!! Html::script('/js/jquery-3.1.1.min.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/angular.js') !!}
    {!! Html::script('/js/solicitud.js') !!}
    {!! Html::script('/js/bootstrap-datepicker/bootstrap-datepicker.min.js') !!}
    {!! Html::script('/js/bootstrap-datepicker/bootstrap-datepicker.es.js') !!}
    {!! Html::style('/css/bootstrap-datepicker/bootstrap-datepicker3.min.css') !!}
    {!! Html::style('/css/bootstrap.min.css') !!}

    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta charset="UTF-8">
    <title>Solicitud de Servicio</title>
</head>
<body>
</br>
@yield('content')
</body>
</html>