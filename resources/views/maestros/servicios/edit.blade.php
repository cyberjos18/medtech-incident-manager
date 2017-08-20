@extends('maestros.servicios')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Editar datos del servicio</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::model($servicio,['route'=>['maestros.servicios.update',$servicio->id],'method'=>'PUT','class'=>'']) !!}
                        <input type="hidden" name="centro_id" id="centro_id" value={{$servicio->centro_id}}>
                        <input type="hidden" name="id" id="id" value={{$servicio->id}}>
                        @include('maestros.servicios.partials.fields')
                        <div class="col-md-offset-5">

                            <div class="col-xs-12 col-sm-12  col-md-10">
                            {!! Form::button('Editar',['id'=>'editar_serv','class'=>'btn btn-success']) !!}
                            {!! Form::submit('Aceptar',['id'=>'aceptar_serv','class'=>'btn btn-warning']) !!}
                            {!! Form::button('Eliminar',['id'=>'eliminar_serv','class'=>'btn btn-danger']) !!}
                            {!! Html::link(route('maestros.centros.index'),'Cancelar',['id'=>'cancelar_serv','class'=>'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection