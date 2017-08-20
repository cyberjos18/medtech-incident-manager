@extends('maestros.proveedores')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-06 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Lista de Proveedores</h4></div>
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
                                <th>RIF</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Contacto</th>
                                <th>Acción</th>
                            </tr>

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
                        {!! $proveedores->setPath('')->render() !!}
                        <div>
                            <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-9">
                                <a href="{{route('maestros.proveedores.create')}}" class="btn btn-success" role="button">Incluir</a>
                                <a href="" class="btn btn-primary ">Cancelar</a>
                            </div>
                        </div>

                    </div>




                </div>

            </div>


        </div>

    </div>

@endsection