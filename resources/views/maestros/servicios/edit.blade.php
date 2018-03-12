@extends('maestros.servicios')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Editar datos del servicio</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::model($servicio,['route'=>['maestros.servicios.update',$servicio->id],'method'=>'PUT','class'=>'']) !!}
                        <input type="hidden" name="centro_id" id="centro_id" value={{$servicio->centro_id}}>
                        <input type="hidden" name="id" id="id" value={{$servicio->id}}>
                        @include('maestros.servicios.partials.fields')
                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {!! Form::button('Editar',['id'=>'editar_serv','class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 editar']) !!}
                            {!! Form::submit('Aceptar',['id'=>'aceptar_serv','class'=>'btn btn-warning col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                            {!! Form::button('Eliminar',['id'=>'eliminar_serv','class'=>'btn btn-danger col-lg-1 col-xs-12 col-sm-2 col-md-2', 'style'=>'margin-bottom:1%;margin-left:0.3%;margin-right:0.3%;']) !!}
                            {!! Html::link(route('maestros.centros.index'),'Cancelar',['id'=>'cancelar_serv','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                            </div>
                            </div>
                        {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
    </div>

@endsection