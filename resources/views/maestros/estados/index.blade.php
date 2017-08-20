@extends('maestros.estados')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-06 col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Lista de Estados</h4></div>
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
                                <th>Nombre del Estado</th>
                                <th>Acción</th>
                            </tr>
                            @foreach($estados as $estado)
                                <tr data-id="{{$estado->id}}">
                                    <td>{{$estado->id}}</td>
                                    <td>{{$estado->nomb_estado}}</td>
                                    <td>
                                        <a href="{{route('maestros.estados.edit',$estado->id)}}">Editar</a>
                                        <a href="#" class="link-eliminar">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {!! $estados->setPath('')->render() !!}
                        <div>
                        <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-9">
                            <a href="{{route('maestros.estados.create')}}" class="btn btn-success" role="button">Incluir</a>
                            <a href="" class="btn btn-primary ">Cancelar</a>
                        </div>
                        </div>

                    </div>




            </div>

        </div>


    </div>

</div>
@endsection