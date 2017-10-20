<div class="form-group">
    {!! Form::label('numero_solicitud','N # de solicitud') !!}
    {!! Form::text('numero_solicitud',null,['id'=>'numero_solicitud','class'=>'form-control','placeholder'=>'Por favor ingrese el numero de solicitud','maxlength'=>'25']) !!}
</div>
<div class="form-group">
    {!! Form::label('fecha_recibo','Fecha de recibo') !!}
    <div class="input-group date" >
        {!! Form::text('fecha_recibo',null,['id'=>'fecha_recibo','class'=>'form-control','placeholder'=>'Seleccione la fecha de recibo']) !!}
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </div>
    </div>


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
<div class="form-group">
    <div class="col-xs-12 col-sm-8 col-md-08 col-md-offset-10">
        {!! Form::button('+',['id'=>'mas','class'=>'btn btn-info']) !!}
        {!! Form::button('-',['id'=>'menos','class'=>'btn btn-info']) !!}
    </div>

    </br>
    </br>
    <div class="panel-body">
        <table class="table table-responsive" >
            <tr>
                <th>#</th>
                <th>Tipo de equipo</th>
                <th>Marca</th>
                <th>Serial</th>
                <th>Falla reportada</th>
            </tr>
            <tbody id="contenido">

            </tbody>
        </table>

    </div>
</div>
