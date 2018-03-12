@extends('maestros.tiposequipos')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Lista de tipos de equipos</h4> </div>
                {!! Form::open(['route' => ['maestros.tiposequipos.destroy',':USER_ID'],'method' => 'DELETE','id'=>'form-delete']) !!}
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
                    <table id="tipoequipo" class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo de Equipo</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tipos as $tipo)
                            <tr data-id="{{$tipo->id}}">
                                <td>{{$tipo->id}}</td>
                                <td>{{$tipo->tipo_equipo}}</td>
                                <td>

                                    {!! Html::link(route('maestros.tiposequipos.show',$tipo->id),'Ver') !!}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    {{--{!! $tipos->setPath('')->render()!!}--}}
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {!! Html::link(route('maestros.tiposequipos.create'),'Incluir',['class'=>'btn btn-success col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                            {!! Html::link('/','Cancelar',['target'=>'_parent','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}

                        </div>
                    </div>
                </div>



            </div>

        </div>

    </div>

</div>
    @endsection