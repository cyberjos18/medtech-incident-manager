@extends('maestros.centros2')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Datos del Centro de Atención</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::open(['route'=>'maestros.centros.store','method'=>'POST','class'=>'']) !!}

                        @include('maestros.centros.partials.fields')
                        <div class="">
                            {!! Form::submit('Guardar',['id'=>'guardar','class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-bottom:1%; margin-left:0.5%;']) !!}
                            {!! Html::link(route('maestros.centros.index'),'Cancelar',['class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-left:0.3%;']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection