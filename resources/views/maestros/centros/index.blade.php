@extends('maestros.centros')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">
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
                        <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-9">
                            {!! Html::link(route('maestros.centros.create'),'Incluir',['class'=>'btn btn-success']) !!}
                            {!! Html::link('#','Cancelar',['class'=>'btn btn-primary']) !!}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection