@extends('maestros.tiposequipos')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Lista de Tipos de Equipos</h4> </div>
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
                    <table class="table table-responsive">
                        <tbody>
                        <tr>
                            <td>#</td>
                            <td>Tipos de Equipos</td>
                            <td>Acción</td>
                        </tr>
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
                    {!! $tipos->setPath('')->render()!!}
                    <div>
                        <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-9">
                            {!! Html::link(route('maestros.tiposequipos.create'),'Incluir',['class'=>'btn btn-success']) !!}
                            {!! Html::link('#','Cancelar',['class'=>'btn btn-primary']) !!}

                        </div>
                    </div>
                </div>



            </div>

        </div>

    </div>

</div>
    @endsection