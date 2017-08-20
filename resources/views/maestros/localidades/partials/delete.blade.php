{!! Form::open(['route'=>['maestros.localidades.destroy',$localidad->id],'method'=>'DELETE','class'=>'']) !!}
{!! Form::submit('Eliminar',['id'=>'eliminar','onclick'=>'return confirm("Seguro que deseas eliminar?")','class'=>'btn btn-danger']) !!}
<a href="{{route('maestros.localidades.index')}}" name="Cancelar" id="cancelar" class="btn btn-primary ">Cancelar</a>
{!! Form::close() !!}