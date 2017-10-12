<div class="form-group">
    {!! Form::label('numero_solicitud','N # de solicitud') !!}
    {!! Form::text('numero_solicitud',null,['id'=>'numero_solicitud','class'=>'form-control','placeholder'=>'Por favor ingrese el numero de solicitud','maxlength'=>'25']) !!}
</div>
<div class="form-group">
    {!! Form::label('fecha_recibo','Fecha de recibo') !!}
    {!! Form::date('fecha_recibo',\Carbon\Carbon::now(),['id'=>'fecha_recibo','class'=>'form-control']) !!}
</div>
<br>
<div ><h5>Centro de atencion</h5></div>
<hr  style="color:#000000;" />
<div class="form-group">
    {!! Form::label('centro_id','Nombre del centro') !!}
    {!! Form::select('centro_id',$centros,null,['id'=>'centro_id','class'=>'form-control','placeholder'=>'Seleccione...']) !!}
</div>
<div class="form-group">
    {!! Form::label('jefe_servicio','Jefe del servicio') !!}
    {!! Form::text('jefe_servicio',null,['id'=>'jefe_servicio','class'=>'form-control','placeholder'=>'Por favor ingrese el nombre del jefe de servicio','maxlength'=>'25']) !!}
</div>
<div class="form-group">
    {!! Form::label('responsable_emision','Emisor responsable') !!}
    {!! Form::text('responsable_emisor',null,['id'=>'responsable_emisor','class'=>'form-control','placeholder'=>'Por favor ingrese el nombre del emisor de la solicitud de servicio','maxlength'=>'25']) !!}
</div>
<br>
<div ><h5>Equipos reportados</h5></div>
<hr  style="color:#000000;" />
