@extends('maestros.usuarios')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12, col-sm-12, col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Lista de usuarios</h4></div>
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
                        <div class="panel-body">
                            <div class="table table-responsive">
                                <table id="usuario" class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Accion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>{{$usuario->id}}</td>
                                            <td>{{$usuario->name}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>
                                                <a href="{{route('maestros.usuarios.edit',$usuario->id)}}">Ver</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            {{--{!! $usuarios->setPath('')->render() !!}--}}
                            <div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        {!! Html::link(route('maestros.usuarios.create'),'Incluir',['id'=>'incluir','class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                                        {!! Html::link('/','Cancelar',['target'=>'_parent','id'=>'Cancelar','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
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