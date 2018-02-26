<div class="form-group">
    {!! Form::label('numero_autorizacion','N # de Autorizacion') !!}
    {!! Form::text('numero_autorizacion',null,['id'=>'numero_autorizacion','class'=>'form-control','placeholder'=>'Por favor ingrese el numero de autorizacion']) !!}
</div>
<div class="form-group">
    {!! Form::label('fecha_autorizacion','Fecha') !!}
    <div class="input-group date" >
        {!! Form::text('fecha_autorizacion',null,['id'=>'fecha_autorizacion','class'=>'form-control','placeholder'=>'Seleccione la fecha de autorizacion']) !!}
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('proveedor_id','Proveedor') !!}
    {!! Form::select('proveedor_id',$proveedores,null,['id'=>'proveedor_id','class'=>'form-control','placeholder'=>'Seleccione...']) !!}
</div>
<div class="form-group">
    {!! Form::label('status','Status') !!}
    {!! Form::select('status',['En Proceso'=>'En Proceso','Falta Repuesto'=>'Falta Repuesto','No Procede'=>'No Procede','Talleres'=>'Talleres','Ejecutado'=>'Ejecutado'],null,['id'=>'status','class'=>'form-control','placeholder'=>'Seleccione...']) !!}
</div>
<div class="form-group">
    {!! Form::label('seguimiento','Seguimiento') !!}
    {!! Form::textarea('seguimiento',null,['segumiento','cols'=>'5','rows'=>'3','class'=>'form-control','placeholder'=>'Por favor ingrese el seguimiento que esta haciendo al caso']) !!}
</div>
<div class="">
    {!! Form::submit('Guardar',['id'=>'guardar','class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-10 col-md-08 col-md-offset-9']) !!}
    {!! Html::link(route('autorizaciones.autorizacionservicio.index'),'Cancelar',['class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-10 col-md-08','style'=>'margin-left:0.5%']) !!}
</div>
