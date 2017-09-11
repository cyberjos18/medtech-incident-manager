@extends('maestros.tiposequipos')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Editar descripcion del tipo de equipo</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::model($tipoequipo,['route'=>['maestros.tiposequipos.update',$tipoequipo->id],'method'=>'PUT','class'=>'']) !!}

                        @include('maestros.tiposequipos.partials.fields')
                           <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-5">
                               {!! Form::hidden('data_id',$tipoequipo->id,['id'=>'data_id']) !!}
                                {!! Form::submit('Editar',['id'=>'aceptar','class'=>'btn btn-warning','style'=>'margin-right:-4px']) !!}
                                {!! Form::button('Eliminar',['id'=>'eliminar','class'=>'btn btn-danger']) !!}
                                {!! Html::link(route('maestros.tiposequipos.index'),'Cancelar',['id'=>'cancelar','class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection