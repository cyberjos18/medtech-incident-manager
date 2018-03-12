@extends('maestros.proveedores')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Lista de proveedores</h4></div>
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
                        <table id="proveedor" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>RIF</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Contacto</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($proveedores as $proveedor)
                                <tr data-id="{{$proveedor->id}}">
                                    <td>{{$proveedor->id}}</td>
                                    <td>{{$proveedor->rif_proveedor}}</td>
                                    <td>{{$proveedor->nomb_proveedor}}</td>
                                    <td>{{$proveedor->telf_proveedor}}</td>
                                    <td>{{$proveedor->correo_proveedor}}</td>
                                    <td>{{$proveedor->contacto_proveedor}}</td>
                                    <td>
                                        <a href="{{route('maestros.proveedores.edit',$proveedor->id)}}">Editar</a>
                                        <a href="#" class="link-eliminar">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        </div>
                        {{--{!! $proveedores->setPath('')->render() !!}--}}
                        <div>
                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="{{route('maestros.proveedores.create')}}" class="btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir" role="button">Incluir</a>
                                {!! Html::link('/','Cancelar',['target'=>'_parent','id'=>'Cancelar','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                            </div>
                            </div>
                        </div>

                    </div>




                </div>

            </div>


        </div>

    </div>

@endsection