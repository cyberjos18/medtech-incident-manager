@extends('maestros.centros')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel panel-heading"><h4>Centro de atención {!! $centro->nomb_centro !!}</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')

                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#datosdelcentro">Datos del centro</a></li>
                            <li><a data-toggle="tab" href="#serviciosdelcentro">Servicios</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="datosdelcentro" class="tab-pane fade in active">

                                {!! Form::model($centro,['id'=>'formulario2','route'=>['maestros.centros.update',$centro->id],'method'=>'PUT','class'=>'']) !!}
                                {!!Form::hidden('centro',$centro->id,['id'=>'centroId'])!!}
                                @include('maestros.centros.partials.fields_view')
                                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-5">

                                    {!! Form::button('Editar',['id'=>'editar','class'=>'btn btn-success','style'=>'margin-right:4px']) !!}
                                    {!! Form::submit('Aceptar',['id'=>'aceptar','class'=>'btn btn-warning','style'=>'margin-right:-4px']) !!}
                                    {!! Form::button('Eliminar',['id'=>'eliminar','class'=>'btn btn-danger']) !!}
                                    {!! Html::link(route('maestros.centros.index'),'Cancelar',['id'=>'cancelar','class'=>'btn btn-primary']) !!}

                                  {!! Form::close() !!}
                                </div>
                            </div>
                            <div id="serviciosdelcentro" class="tab-pane fade ">
                               <p>@include('maestros.centros.partials.fields2')</p>
                                <div class="col-xs-12 col-sm-8 col-md-10 col-md-offset-8">
                                {!! Form::button('Incluir',['id'=>'incluir','class'=>'btn btn-success']) !!}
                                {!! Form::button('Ver',['id'=>'ver','class'=>'btn btn-warning']) !!}
                                {!! Html::link(route('maestros.centros.index'),'Regresar',['id'=>'cancelar','class'=>'btn btn-primary']) !!}
                                </div>

                                </br>
                                </br>
                                <div class="panel-body">
                                    <table class="table table-responsive" >
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre del Servicio</th>
                                            <th>Accion</th>
                                        </tr>
                                        <tbody id="contenido">

                                        </tbody>
                                        </table>

                            </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection