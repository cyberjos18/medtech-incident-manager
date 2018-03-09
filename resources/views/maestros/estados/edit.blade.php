@extends('maestros.estados')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Editar datos del estado</h4></div>

                    <div class="panel-body">
                        @include('mensajes.validation')

                        {!! Form::model($estado,['route'=>['maestros.estados.update',$estado->id],'method'=>'PUT','class'=>'']) !!}
                            @include('maestros.estados.partials.fields')
                        <div class="row">
                        {!! Form::submit('Editar',['id'=>'editar','class'=>'btn btn-warning col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-bottom:1%']) !!}
                        {!! Form::close() !!}

                            @include('maestros.estados.partials.delete')

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
    </div>
    </div>

@endsection