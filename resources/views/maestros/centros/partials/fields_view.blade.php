</br>
<div class="form-group">
    {!! Form::label('nomb_centro','Centro de atención') !!}
    {!! Form::text('nomb_centro',null,['class'=>'form-control','placeholder'=>'Por favor ingrese el nombre del centro','maxlength'=>'100']) !!}
</div>
<div class="form-group">
    {!! Form::label('nomb_director','Director del centro de atención') !!}
    {!! Form::text('director_centro',null,['id'=>'director_centro','class'=>'form-control','placeholder'=>'Por favor ingrese el nombre del director del centro','maxlength'=>'25']) !!}
</div>

<div class="form-group">
     {!! Form::label('nomb_categoria','Tipo') !!}
     {!! Form::select('categoria_id',$categorias,null,['id'=>'categoria_id','class'=>'form-control','placeholder'=>'Seleccione la categoria...']) !!}
</div>
<div class="form-group">
    {!! Form::label('nomb_estado','Estado') !!}
    {!! Form::select('estado_id',$estados,null,['id'=>'estado_id','class'=>'form-control','placeholder'=>'Seleccione el estado...']) !!}
</div>
<div class="form-group">
    {!! Form::label('nomb_localidad','Localidad') !!}
    {!! Form::select('localidad_id',$localidades,null,['id'=>'localidad_id','class'=>'form-control','placeholder'=>'Seleccione la localidad...']) !!}
</div>
