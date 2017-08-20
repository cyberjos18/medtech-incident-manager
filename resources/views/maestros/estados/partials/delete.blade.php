{!! Form::open(['route'=>['maestros.estados.destroy',$estado->id],'method'=>'delete','class'=>'']) !!}
{!! Form::submit('Eliminar',['id'=>'eliminar','onclick'=>'return confirm("Seguro que deseas eliminar?")','class'=>'btn btn-danger']) !!}
<a href="{{route('maestros.estados.index')}}" name="Cancelar" id="cancelar" class="btn btn-primary ">Cancelar</a>
{!! Form::close() !!}