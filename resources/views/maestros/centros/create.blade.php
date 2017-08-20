@extends('maestros.centros2')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Datos del Centro de Atención</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::open(['route'=>'maestros.centros.store','method'=>'POST','class'=>'']) !!}

                        @include('maestros.centros.partials.fields')
                        <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-8">
                            {!! Form::submit('Guardar',['id'=>'guardar','class'=>'btn btn-success']) !!}
                            {!! Html::link(route('maestros.centros.index'),'Cancelar',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection