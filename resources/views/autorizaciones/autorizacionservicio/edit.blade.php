@extends('autorizaciones.autorizacion')
@section('script')
{!! Html::script('/js/autorizacionEdit.js') !!}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Registro de Autorizacion</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::model($autorizaciones,['route'=>['autorizaciones.autorizacionservicio.update',$autorizaciones->id],'method'=>'PUT','class'=>'','id'=>'formularioautorizacionedit']) !!}
                        @include('autorizaciones.autorizacionservicio.partials.fieldsEdit')
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

        </div>

    </div>
    @endsection