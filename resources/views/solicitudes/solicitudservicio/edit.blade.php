@extends('solicitudes.solicitudservicioedit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel panel-heading"><h4>Registro de solicitud</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::model($solicitudes,['route'=>['solicitudes.solicitudservicio.update',$solicitudes->id],'method'=>'PUT','class'=>'','id'=>'formularioajax']) !!}
                        @include('solicitudes.solicitudservicio.partials.fieldsEdit')
                        @include('inventario.equipos.modal.modalequipos')
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
    </div>
    @endsection