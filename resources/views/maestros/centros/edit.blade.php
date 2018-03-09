@extends('maestros.centros')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
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
                                <div class="">

                                    {!! Form::button('Editar',['id'=>'editar','class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-bottom:1%; margin-left:0.5%;']) !!}
                                    {!! Form::submit('Aceptar',['id'=>'aceptar','class'=>'btn btn-warning col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-left:0.3%;margin-bottom:1%;']) !!}
                                    {!! Form::button('Eliminar',['id'=>'eliminar','class'=>'btn btn-danger col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-left:0.3%;margin-bottom:1%;']) !!}
                                    {!! Html::link(route('maestros.centros.index'),'Cancelar',['id'=>'cancelar','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-left:0.3%']) !!}

                                  {!! Form::close() !!}
                                </div>
                            </div>
                            <div id="serviciosdelcentro" class="tab-pane fade ">
                               <p>@include('maestros.centros.partials.fields2')</p>
                                <div class="row">
                                <div class="">
                                {!! Form::button('Ver',['id'=>'ver','class'=>'btn btn-warning col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-bottom:1%; margin-left:0.5%;']) !!}
                                {!! Form::button('Guardar',['id'=>'guardar','class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-left:0.3%;margin-bottom:1%;']) !!}
                                {!! Html::link(route('maestros.centros.index'),'Regresar',['id'=>'cancelar','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-left:0.3%']) !!}
                                </div>
                                </div>
                                </br>
                                </br>
                                <div class="panel-body">
                                    <div id="table" class="table table-responsive">
                                        <table class="table table-bordered" >
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre del Servicio</th>
                                                <th>Accion</th>
                                            </tr>
                                            <tbody id="contenido">
                                            <tr>
                                                <td colspan="3" align="center">No hay registros</td>
                                            </tr>

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
    </div>
@endsection