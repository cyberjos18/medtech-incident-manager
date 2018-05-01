@extends('maestros.estados')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Lista de estados</h4></div>
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
                        {!! Form::hidden('lenguaje',Session::get('lang'),['id'=>'lenguaje']) !!}
                        <div class="table table-responsive">
                        <table id="estadoe" class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('attributes.estate')</th>
                                <th>@lang('attributes.action')</th>
                            </tr>
                            </thead>
                            <tbody>
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
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="{{route('maestros.estados.create')}}" class="btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir">Incluir</a>
                                {!! Html::link('/','Cancelar',['target'=>'_parent','id'=>'reload','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                            </div>
                        </div>


                    </div>




            </div>

        </div>


    </div>

</div>
@endsection