@extends('maestros.localidades')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Datos de la localidad</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::open(['route'=>'maestros.localidades.store','method'=>'POST','class'=>'']) !!}
                        @include('maestros.localidades.partials.fields')
                        <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {!! Form::submit('Guardar',['id'=>'guardar','class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                        {!! Html::link(route('maestros.localidades.index'),'Cancelar',['class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                        </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>


            </div>

        </div>

    </div>
@endsection