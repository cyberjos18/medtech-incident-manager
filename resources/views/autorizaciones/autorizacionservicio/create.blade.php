@extends('autorizaciones.autorizacion')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Registro de Autorizacion</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::open(['route'=>'autorizaciones.autorizacionservicio.store','method'=>'POST','class'=>'','id'=>'formularioautorizacion']) !!}
                        @include('autorizaciones.autorizacionservicio.partials.fields')
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

        </div>

    </div>
    @endsection