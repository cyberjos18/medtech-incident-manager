{!! Form::open(['route'=>['maestros.centros.destroy',$centro->id],'method'=>'delete','class'=>'']) !!}
{!! Form::submit('Eliminar',['id'=>'eliminar','onclick'=>'return confirm("Seguro que deseas eliminar?")','class'=>'btn btn-danger']) !!}
<a href="{{route('maestros.centros.index')}}" name="Cancelar" id="cancelar" class="btn btn-primary ">Cancelar</a>
{!! Form::close() !!}