{!! Form::open(['route'=>['maestros.estados.destroy',$estado->id],'method'=>'delete','class'=>'']) !!}
<div class="row">
    {!! Form::submit('Eliminar',['id'=>'eliminar','onclick'=>'return confirm("Seguro que deseas eliminar?")','class'=>'btn btn-danger col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-bottom:1%;']) !!}
    {!! Html::link(route('maestros.estados.index'),'Cancelar',['id'=>'cancelar','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-left:0.3%;']) !!}
</div>



{{--<a href="{{route('maestros.estados.index')}}" name="Cancelar" id="cancelar" class="btn btn-primary col-lg-1 col-xs-12 col-sm-06 col-md-10">Cancelar</a>--}}
{!! Form::close() !!}