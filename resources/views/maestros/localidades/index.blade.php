@extends('maestros.localidades')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Lista de localidades</h4> </div>
                    {!! Form::open(['route' => ['maestros.localidades.destroy',':USER_ID'],'method' => 'DELETE','id'=>'form-delete']) !!}
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
                            <table id="localidad" class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Estado</th>
                                    <th>Localidad</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($localidades as $localidad)
                                    <tr data-id="{{$localidad->id}}">
                                        <td>{{$localidad->id}}</td>
                                        <td>{{$localidad->estado->nomb_estado}}</td>
                                        <td>{{$localidad->nomb_localidad}}</td>
                                        <td>
                                            {!! Html::link(route('maestros.localidades.edit',$localidad->id),'Editar') !!}
                                            {!! Html::link('#','Eliminar',['class'=>'link-eliminar']) !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            {{--{!! $localidades->setPath('')->render()!!}--}}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {!! Html::link(route('maestros.localidades.create'),'Incluir',['class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                                    {!! Html::link('/','Cancelar',['target'=>'_parent','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}

                                </div>
                            </div>
                        </div>



                </div>

            </div>

        </div>

    </div>
    @endsection