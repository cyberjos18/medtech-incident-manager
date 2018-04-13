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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ingrese al sistema</h3>
                </div>
                <div class="panel-body">

                    <form method="POST" action="../auth/login">
                        {!! csrf_field() !!}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            {!! Form::submit('Login',['id'=>'login','class'=>'btn btn-lg btn-success btn-block']) !!}
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
