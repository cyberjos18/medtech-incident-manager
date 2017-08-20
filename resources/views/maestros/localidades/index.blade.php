@extends('maestros.localidades')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Lista de Localidades</h4> </div>
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
                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <td>#</td>
                                    <td>Estado</td>
                                    <td>Localidad</td>
                                    <td>Acción</td>
                                </tr>
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
                            {!! $localidades->setPath('')->render()!!}
                            <div>
                                <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-9">
                                    {!! Html::link(route('maestros.localidades.create'),'Incluir',['class'=>'btn btn-success']) !!}
                                    {!! Html::link('#','Cancelar',['class'=>'btn btn-primary']) !!}

                                </div>
                            </div>
                        </div>



                </div>

            </div>

        </div>

    </div>
    @endsection