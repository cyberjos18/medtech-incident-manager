{!! Form::open(['route'=>['maestros.categorias.destroy',$categoria->id],'method'=>'DELETE','class'=>'']) !!}
{!! Form::submit('Eliminar',['id'=>'eliminar','onclick'=>'return confirm("Seguro que deseas eliminar?")','class'=>'btn btn-danger']) !!}
<a href="{{route('maestros.categorias.index')}}" name="Cancelar" id="cancelar" class="btn btn-primary ">Cancelar</a>
{!! Form::close() !!}