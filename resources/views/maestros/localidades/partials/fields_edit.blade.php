<div class="form-group">
    {!! Form::label('nomb_estado','Estado') !!}
    {!! Form::select('estado_id',$estado,null,['class' => 'form-control']) !!}

</div>
<div class="form-group">
    {!! Form::label('nomb_localidad','Localidad a registrar') !!}
    {!! Form::text('nomb_localidad',null,['class'=>'form-control','placeholder'=>'Por favor ingrese el nombre de la localidad']) !!}
    {!! Form::hidden('id',$localidad->id,['class'=>'form-control']) !!}
</div>