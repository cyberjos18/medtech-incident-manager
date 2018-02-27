<div class="form-group">
    {!! Form::label('numero_autorizacion','N # de Autorizacion') !!}
    {!! Form::text('numero_autorizacion',null,['id'=>'numero_autorizacion','class'=>'form-control','placeholder'=>'Por favor ingrese el numero de autorizacion']) !!}
</div>
<div class="form-group">
    {!! Form::label('fecha_autorizacion','Fecha') !!}
    <div class="input-group date" >
        {!! Form::text('fecha_autorizacion',date('d-m-Y',strtotime($autorizaciones->fecha_autorizacion)),['id'=>'fecha_autorizacion','class'=>'form-control','placeholder'=>'Seleccione la fecha de autorizacion']) !!}
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('solicitud_id','Numero de Solicitud') !!}
    {!! Form::select('solicitud_id',$solicitudes,null,['id'=>'solicitud_id','class'=>'form-control','placeholder'=>'Seleccione...']) !!}
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
    {!! Form::button('Editar',['id'=>'editar','class'=>'btn btn-success col-xs-12 col-sm-12 col-md-12 col-lg-1','style'=>'margin-right:4px']) !!}
    {!! Form::submit('Aceptar',['id'=>'aceptar','class'=>'btn btn-warning col-xs-12 col-sm-12 col-md-12 col-lg-1']) !!}
    {!! Html::link(route('solicitudes.solicitudservicio.index'),'Cancelar',['class'=>'btn btn-primary col-xs-12 col-sm-12 col-md-12 col-lg-1','style'=>'margin-left:0.5%;padding-right:7.5%']) !!}
    {!! Form::button('Probando',['id'=>'probando','class'=>'btn btn']) !!}
</div>

