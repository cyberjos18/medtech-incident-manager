<div class="form-group">
    {!! Form::label('nomb_centro','Centro de atención') !!}
    {!! Form::select('centro_id',$centros,null,['id'=>'centro_id','class'=>'form-control','placeholder'=>'Seleccione...']) !!}
</div>
<div class="form-group">
    {!! Form::label('nomb_servicio','Nombre del servicio del centro') !!}
    {!! Form::select('servicio_id',[''],null,['id'=>'servicio_id','class'=>'form-control','placeholder'=>'Seleccione...']) !!}
</div>
<div class="form-group">
    {!! Form::label('nomb_equipo','Equipo') !!}
    {!! Form::text('nomb_equipo',null,['id'=>'nomb_equipo','class'=>'form-control','placeholder'=>'Por favor ingrese el nombre del equipo','maxlength'=>'25']) !!}
</div>
<div class="form-group">
    {!! Form::label('marca_equipo','Marca') !!}
    {!! Form::text('marca_equipo',null,['id'=>'marca_equipo','class'=>'form-control','placeholder'=>'Por favor ingrese la marca del equipo','maxlength'=>'25']) !!}
</div>
<div class="form-group">
    {!! Form::label('modelo_equipo','Modelo') !!}
    {!! Form::text('modelo_equipo',null,['id'=>'modelo_equipo','class'=>'form-control','placeholder'=>'Por favor ingrese el modelo del equipo','maxlength'=>'25']) !!}
</div>
<div class="form-group">
    {!! Form::label('serial_equipo','Serial') !!}
    {!! Form::text('serial_equipo',null,['id'=>'serial_equipo','class'=>'form-control','placeholder'=>'Por favor ingrese el serial del equipo','maxlength'=>'30']) !!}
</div>
<div class="form-group">
    {!! Form::label('bien_nacional','Codigo bien nacional') !!}
    {!! Form::text('bien_nacional',null,['id'=>'bien_nacional','class'=>'form-control','placeholder'=>'Por favor ingrese el codigo de bien nacional','maxlength'=>'30']) !!}
</div>
<div class="form-group">
    {!! Form::label('equipo_garantia','Equipo en garantia?') !!}
    {!! Form::select('equipo_garantia',['SI'=>'SI','NO'=>'NO'],null,['id'=>'equipo_garantia','class'=>'form-control','placeholder'=>'Seleccione...']) !!}
</div>
<div class="form-group">
    {!! Form::label('responsable_garantia','Responsable de la garantia') !!}
    {!! Form::text('responsable_garantia',null,['id'=>'responsable_garantia','class'=>'form-control','placeholder'=>'Por favor ingrese el responsable','maxlength'=>'35']) !!}
</div>
<div class="form-group">
    {!! Form::label('duracion_garantia','Tiempo de duración de la garantia') !!}
    {!! Form::text('duracion_garantia',null,['id'=>'duracion_garantia','class'=>'form-control','placeholder'=>'Por favor ingrese el tiempo de duracion','maxlength'=>'15']) !!}
</div>
<div class="form-group">
    {!! Form::label('observaciones_equipo','Observaciones generales') !!}
    {!! Form::text('observaciones_equipo',null,['id'=>'observaciones_equipo','class'=>'form-control','placeholder'=>'Puede ingresar cualquier observación']) !!}
</div>


