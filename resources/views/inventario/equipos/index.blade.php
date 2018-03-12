@extends('inventario.equipos')
@section('content')
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Inventario de equipos</h4></div>
                    @if(Session::has('message') && Session::has('bandera'))
                        @if(Session::get('bandera')==='update')
                            @include('mensajes.update')
                        @elseif(Session::get('bandera')==='delete')
                            @include('mensajes.delete')
                        @else
                            @include('mensajes.success')
                        @endif
                    @endif
                    <div class="panel-body">
                        <div class="table table-responsive">
                        <table id="equipo" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Equipo</th>
                                <th>Unidad</th>
                                <th>Centro</th>
                                <th>Localidad</th>
                                <th>Estatus</th>
                                <th>Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($equipos as $equipo)
                                <tr data-id="{{$equipo->id}}">
                                    <td>{{$equipo->id}}</td>
                                    <td>{{$equipo->tipoequipo->tipo_equipo}}</td>
                                    <td>{{$equipo->servicio->nomb_servicio}}</td>
                                    <td>{{$equipo->centro->nomb_centro}}</td>
                                    <td>{{$equipo->centro->localidad->nomb_localidad}}</td>
                                    <td>{{$equipo->estatus_equipo}}</td>
                                    <td>
                                        {!! Html::link(route('inventario.equipos.show',$equipo->id),'Ver') !!}
                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {!! Html::link(route('inventario.equipos.create'),'Incluir',['id'=>'incluir','class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                                {!! Html::link('/','Cancelar',['target'=>'_parent','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    @endsection