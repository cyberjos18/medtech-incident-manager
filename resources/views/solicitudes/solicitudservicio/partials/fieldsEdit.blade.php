<div class="form-group">
    {!! Form::label('numero_solicitud','N # de solicitud') !!}
    {!! Form::text('numero_solicitud',null,['id'=>'numero_solicitud','class'=>'form-control','placeholder'=>'Por favor ingrese el numero de solicitud','maxlength'=>'25']) !!}
</div>
<div class="form-group">
    {!! Form::label('fecha_recibo','Fecha de recibo') !!}
    <div class="input-group date" >
        {!! Form::text('fecha_recibo',date('d-m-Y',strtotime($solicitudes->fecha_recibo)),['id'=>'fecha_recibo','class'=>'form-control','placeholder'=>'Seleccione la fecha de recibo']) !!}
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('status','Status') !!}
    {!! Form::select('status',['Recibida'=>'Recibida','Autorizada'=>'Autorizada','No Procede'=>'No Procede'],null,['id'=>'status','class'=>'form-control','placeholder'=>'Seleccione']) !!}
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
    {!! Form::text('responsable_emision',null,['id'=>'responsable_emision','class'=>'form-control','placeholder'=>'Por favor ingrese el nombre del emisor de la solicitud de servicio','maxlength'=>'25']) !!}
</div>
<div class="form-group">
    {!! Form::label('observaciones','Observaciones',['id'=>'lblObservaciones']) !!}
    {!! Form::text('observaciones',null,['id'=>'observaciones','class'=>'form-control','placeholder'=>'Describa por que la solicitud no procede']) !!}
</div>
<br>
<div ><h5>Equipos reportados</h5></div>
<hr  style="color:#000000;" />
<div class="form-group">
    </br>
    <div class="panel-body">
        <div id="table" class="table table-responsive">
            <table id="equiposreportados" class="table table-bordered" >
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo de equipo</th>
                    <th>Marca</th>
                    <th>Serial</th>
                    <th>Bien nacional</th>
                    <th>Falla reportada</th>
                </tr>
                </thead>
                <tbody>
                @foreach($solicitudes->equipo as $solicitud)
                    <tr>
                        <td>{{$solicitud->id}}</td>
                        <td>{{$solicitud->tipoequipo->tipo_equipo}}</td>
                        <td>{{$solicitud->marca_equipo}}</td>
                        <td>{{$solicitud->serial_equipo}}</td>
                        <td>{{$solicitud->bien_nacional}}</td>
                        <td>{{$solicitud->pivot->falla_reportada}}</td>
                    </tr>
                @endforeach


                </tbody>

            </table>

        </div>
        <div class="col-xs-12 col-sm-10 col-md-08 col-md-offset-8">
            {!! Form::button('Editar',['id'=>'editar','class'=>'btn btn-success','style'=>'margin-right:4px']) !!}
            {!! Form::submit('Aceptar',['id'=>'aceptar','class'=>'btn btn-warning']) !!}
            {{--{!! Form::button('Eliminar',['id'=>'eliminar','class'=>'btn btn-danger']) !!}--}}
            {!! Html::link(route('solicitudes.solicitudservicio.index'),'Cancelar',['class'=>'btn btn-primary']) !!}
        </div>
        </div>

    </div>
</div>
