@extends('maestros.estados')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Datos del estado</h4></div>

                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::open(['route'=>'maestros.estados.store','method'=>'POST','class'=>'']) !!}
                        @include('maestros.estados.partials.fields')
                        <div class="">
                            {!! Form::submit('Guardar',['id'=>'guardar','class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-06 col-md-10']) !!}
                            <a href="{{route('maestros.estados.index')}}" class="btn btn-primary col-lg-1 col-xs-12 col-sm-06 col-md-10" style="margin-left:0.5%">Cancelar</a>
                        </div>
                        {!! Form::close() !!}








                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection