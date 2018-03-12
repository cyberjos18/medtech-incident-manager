@extends('maestros.categorias')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Lista de categorías</h4></div>
                    {!! Form::open(['route' => ['maestros.categorias.destroy',':USER_ID'],'method' => 'DELETE','id'=>'form-delete']) !!}
                    {!! Form::close() !!}
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
                        <table id="categoria" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Categoría del centro</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categorias as $categoria)
                                <tr data-id="{{$categoria->id}}">
                                    <td>{{$categoria->id}}</td>
                                    <td>{{$categoria->nomb_categoria}}</td>
                                    <td>
                                        {!! Html::link(route('maestros.categorias.edit',$categoria->id),'Editar') !!}
                                        {!! Html::link('#','Eliminar',['class'=>'link-eliminar']) !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        {{--{!! $categorias->setPath('')->render() !!}--}}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {!! Html::link(route('maestros.categorias.create'),'Incluir',['class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                                {!! Html::link('','Cancelar',['class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection