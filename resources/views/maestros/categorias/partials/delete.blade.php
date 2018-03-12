{!! Form::open(['route'=>['maestros.categorias.destroy',$categoria->id],'method'=>'DELETE','class'=>'']) !!}
{!! Form::submit('Eliminar',['id'=>'eliminar','onclick'=>'return confirm("Seguro que deseas eliminar?")','class'=>'btn btn-danger col-lg-1 col-xs-12 col-sm-2 col-md-2','style'=>'margin-bottom:1%;margin-left:0.3%;margin-right:0.3%;']) !!}
<a href="{{route('maestros.categorias.index')}}" name="Cancelar" id="cancelar" class="btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar ">Cancelar</a>
{!! Form::close() !!}