@extends('maestros.tiposequipos')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Editar descripcion del tipo de equipo</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::model($tipoequipo,['route'=>['maestros.tiposequipos.update',$tipoequipo->id],'method'=>'PUT','class'=>'']) !!}

                        @include('maestros.tiposequipos.partials.fields')
                        <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               {!! Form::hidden('data_id',$tipoequipo->id,['id'=>'data_id']) !!}
                                {!! Form::submit('Editar',['id'=>'aceptar','class'=>'btn btn-warning col-lg-1 col-xs-12 col-sm-2 col-md-2 editar']) !!}
                                {!! Form::button('Eliminar',['id'=>'eliminar','class'=>'btn btn-danger col-lg-1 col-xs-12 col-sm-2 col-md-2', 'style'=>'margin-bottom:1%;margin-left:0.3%;margin-right:0.3%;']) !!}
                                {!! Html::link(route('maestros.tiposequipos.index'),'Cancelar',['id'=>'cancelar','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection