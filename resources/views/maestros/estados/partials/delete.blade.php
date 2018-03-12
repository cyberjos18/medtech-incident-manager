{!! Form::open(['route'=>['maestros.estados.destroy',$estado->id],'method'=>'delete','class'=>'']) !!}

    {!! Form::submit('Eliminar',['id'=>'eliminar','onclick'=>'return confirm("Seguro que deseas eliminar?")','class'=>'btn btn-danger col-lg-1 col-xs-12 col-sm-2 col-md-2','style'=>'margin-bottom:1%;margin-left:0.3%;margin-right:0.3%;']) !!}
    {!! Html::link(route('maestros.estados.index'),'Cancelar',['id'=>'cancelar','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}





{{--<a href="{{route('maestros.estados.index')}}" name="Cancelar" id="cancelar" class="btn btn-primary col-lg-1 col-xs-12 col-sm-06 col-md-10">Cancelar</a>--}}
{!! Form::close() !!}