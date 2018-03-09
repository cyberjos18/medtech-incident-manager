@extends('maestros.centros')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Lista de Centros</h4></div>
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
                                <th>Nombre del Centro</th>
                                <th>Categoria</th>
                                <th>Localidad</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
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
                        {!! $centros->setPath('')->render() !!}
                        <div class="">
                            {!! Html::link(route('maestros.centros.create'),'Incluir',['class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-bottom:1%; margin-left:0.5%;']) !!}
                            {!! Html::link('/','Cancelar',['target'=>'_parent','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-06 col-md-10', 'style'=>'margin-left:0.3%;']) !!}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection