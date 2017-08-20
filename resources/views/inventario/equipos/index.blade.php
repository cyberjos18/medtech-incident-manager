@extends('inventario.equipos')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Inventario de Equipos</h4></div>
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
                        <table class="table table-responsive">
                            <tbody>
                            <tr>
                                <th>#</th>
                                <th>Equipo</th>
                                <th>Unidad</th>
                                <th>Centro</th>
                                <th>Localidad</th>
                                <th>Accion</th>
                            </tr>
                            @foreach($equipos as $equipo)
                                <tr data-id="{{$equipo->id}}">
                                    <td>{{$equipo->id}}</td>
                                    <td>{{$equipo->nomb_equipo}}</td>
                                    <td>{{$equipo->servicio->nomb_servicio}}</td>
                                    <td>{{$equipo->centro->nomb_centro}}</td>
                                    <td>{{$equipo->centro->localidad->nomb_localidad}}</td>
                                    <td>
                                        {!! Html::link('#','Ver') !!}
                                    </td>

                                </tr>

                                @endforeach

                            </tbody>


                        </table>
                        {!! $equipos->setPath('')->render() !!}
                        <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-9">
                            {!! Html::link(route('inventario.equipos.create'),'Incluir',['class'=>'btn btn-success']) !!}
                            {!! Html::link('#','Cancelar',['class'=>'btn btn-primary']) !!}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    @endsection