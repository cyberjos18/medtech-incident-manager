@extends('auth.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Restaurar datos inicio sesión</h4></div>
                    @include('mensajes.validation')
                    <div class="panel-body">
                        <form method="POST" action={{route('password/email')}}>
                            {!! csrf_field() !!}
                            <div>
                                Email
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-success">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection