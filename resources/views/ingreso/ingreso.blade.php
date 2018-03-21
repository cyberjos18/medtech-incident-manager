<!DOCTYPE html>
<html lang="en">
<head>
{!! Html::script('/js/jquery-3.1.1.min.js') !!}
<!-- Bootstrap Core JavaScript -->
{!! Html::script('/js/bootstrap.min.js') !!}
<!-- Metis Menu Plugin JavaScript -->
{!! Html::script('/dashboard/vendor/metisMenu/metisMenu.min.js') !!}
<!-- Custom Theme JavaScript -->
{!! Html::script('/dashboard/dist/js/sb-admin-2.js') !!}
<!-- Bootstrap Core CSS -->
{!! Html::style('/css/bootstrap.css') !!}
<!-- MetisMenu CSS -->
{!! Html::style('/dashboard/vendor/metisMenu/metisMenu.min.css') !!}
<!-- Custom CSS -->
{!! Html::style('/dashboard/dist/css/sb-admin-2.css') !!}
<!-- Custom Fonts -->
{!! Html::style('/dashboard/vendor/font-awesome/css/font-awesome.min.css') !!}


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <title>Inicio de sesion</title>
</head>
<body>
@yield('content')
</body>
</html>