{!! Form::open(['route'=>['maestros.proveedores.destroy',$proveedor->id],'method'=>'DELETE','class'=>'']) !!}
{!! Form::submit('Eliminar',['id'=>'eliminar','onclick'=>'return confirm("Seguro que deseas eliminar?")','class'=>'btn btn-danger']) !!}
{!! Html::link(route('maestros.proveedores.index'),'Cancelar',['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}