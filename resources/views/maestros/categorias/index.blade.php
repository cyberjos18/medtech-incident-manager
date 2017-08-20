@extends('maestros.categorias')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Lista de Categorias</h4></div>
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
                        <table class="table table-responsive">
                            <tbody>
                            <tr>
                                <th>#</th>
                                <th>Categoria del centro</th>
                                <th>Acción</th>
                            </tr>
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
                        {!! $categorias->setPath('')->render() !!}
                        <div>
                            <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-9">
                                {!! Html::link(route('maestros.categorias.create'),'Incluir',['class'=>'btn btn-success']) !!}
                                {!! Html::link('','Cancelar',['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection