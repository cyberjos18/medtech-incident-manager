@extends('maestros.centros')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Lista de centros</h4></div>
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
                        <table id="centro" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre del Centro</th>
                                <th>Categoría</th>
                                <th>Localidad</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($centros as $centro)
                                <tr>
                                    <td>{{$centro->id}}</td>
                                    <td>{{$centro->nomb_centro}}</td>
                                    <td>{{$centro->categoria->nomb_categoria}}</td>
                                    <td>{{$centro->localidad->nomb_localidad}}</td>
                                    <td>{{$centro->estado->nomb_estado}}</td>
                                    <td>
                                        {!! Html::link(route('maestros.centros.show',$centro->id),'Ver') !!}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        </div>
                        {{--{!! $centros->setPath('')->render() !!}--}}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {!! Html::link(route('maestros.centros.create'),'Incluir',['class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                                {!! Html::link('/','Cancelar',['target'=>'_parent','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection