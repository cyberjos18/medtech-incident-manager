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
    {!! Html::style('/css/bootstrap.min.css') !!}
    <!-- MetisMenu CSS -->
    {!! Html::style('/dashboard/vendor/metisMenu/metisMenu.min.css') !!}
    <!-- Custom CSS -->
    {!! Html::style('/dashboard/dist/css/sb-admin-2.css') !!}
    <!-- Custom Fonts -->
    {!! Html::style('/dashboard/vendor/font-awesome/css/font-awesome.min.css') !!}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <title>Dirección General de Tecnología Médica</title>
<!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@yield('content')
</body>
</html>