@extends('inventario.equiposedit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Editar datos del equipo</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::model($equipo,['route'=>['inventario.equipos.update',$equipo->id],'method'=>'PUT','class'=>'']) !!}
                        {!! Form::hidden('equipo',$equipo->id,['id'=>'equipoid']) !!}
                        @include('inventario.equipos.partials.fieldedit')
                        <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-6">
                            {!! Form::button('Editar',['id'=>'editar','class'=>'btn btn-success','style'=>'margin-right:4px']) !!}
                            {!! Form::submit('Aceptar',['id'=>'aceptar','class'=>'btn btn-warning','style'=>'margin-right:-4px']) !!}
                            {!! Form::button('Eliminar',['id'=>'eliminar','class'=>'btn btn-danger']) !!}
                            {!! Html::link(route('inventario.equipos.index'),'Cancelar',['id'=>'cancelaredit','class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>

            </div>

        </div>

    </div>
    @endsection