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
                        <fieldset>
                            <div class="form-group">
                                {!! Form::email('email', '', ['id'=>'email','class'=> 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', ['class'=> 'form-control']) !!}
                            </div>
                            {{--<div class="checkbox">--}}
                                {{--<label>--}}
                                    {{--<input name="remember" type="checkbox" value="Remember Me">Remember Me--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            <!-- Change this to a button or input when using this as a form -->
                            {!! Form::submit('Iniciar Sesión',['id'=>'login','class'=>'btn btn-lg btn-success btn-block']) !!}
                        </fieldset>
                  {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection