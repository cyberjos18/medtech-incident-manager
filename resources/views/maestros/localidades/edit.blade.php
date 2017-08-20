@extends('maestros.localidades')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Editar datos de la localidad</h4></div>
                    <div class="panel-body">
                        @include('mensajes.validation')
                        {!! Form::model($localidad,['route'=>['maestros.localidades.update',$localidad->id],'method'=>'PUT','class'=>'']) !!}

                        @include('maestros.localidades.partials.fields_edit')
                        <div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-7" >
                            <div>
                                {!! Form::submit('Editar',['id'=>'editar','class'=>'btn btn-warning']) !!}
                            </div>
                            {!! Form::close() !!}

                        @include('maestros.localidades.partials.delete')

                </div>

            </div>

        </div>
    </div>
        </div>
    </div>
@endsection