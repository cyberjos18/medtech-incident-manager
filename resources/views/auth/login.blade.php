@extends('auth.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ingrese al sistema</h3>
                </div>
                <div class="panel-body">
                    @include('mensajes.validation')
                    @if(Session::has('message') && Session::has('bandera'))
                        @if(Session::get('bandera')==='info')
                            @include('mensajes.info')
                        @endif
                    @endif
                    {!! Form::open(['route' => 'auth/login', 'class' => 'form','id'=>'formulariousuario']) !!}
                        {!! csrf_field() !!}

                            <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                            <i class="glyphicon glyphicon-envelope"></i>
                           </span>
                            {!! Form::email('email', '', ['id'=>'email','class'=> 'form-control']) !!}
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                            </span>
                               {!! Form::password('password', ['class'=> 'form-control']) !!}
                            </div>
                            </div>
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input name="remember" type="checkbox" value="Remember Me">Remember Me--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            <!-- Change this to a button or input when using this as a form -->
                            <br>
                            {!! Form::submit('Iniciar Sesión',['id'=>'login','class'=>'btn btn-lg btn-success btn-block']) !!}

                  {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection