@extends('inventario.equiposedit')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Editar datos del equipo</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::model($equipo,['route'=>['inventario.equipos.update',$equipo->id],'method'=>'PUT','class'=>'']) !!}
                        {!! Form::hidden('equipo',$equipo->id,['id'=>'equipoid']) !!}
                        @include('inventario.equipos.partials.fieldedit')
                        <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {!! Form::button('Editar',['id'=>'editar','class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 editar']) !!}
                            {!! Form::submit('Aceptar',['id'=>'aceptar','class'=>'btn btn-warning col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                            {!! Form::button('Eliminar',['id'=>'eliminar','class'=>'btn btn-danger col-lg-1 col-xs-12 col-sm-2 col-md-2','style'=>'margin-bottom:1%;margin-left:0.3%;margin-right:0.3%;']) !!}
                            {!! Html::link(route('inventario.equipos.index'),'Cancelar',['id'=>'cancelaredit','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                        </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

        </div>

    </div>
    @endsection