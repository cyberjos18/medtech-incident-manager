<div class="form-group">
    {!! Form::label('rif_proveedor','Nombre') !!}
    {!! Form::text('rif_proveedor',null,['class'=>'form-control','placeholder'=>'Ingrese el rif del proveedor ej: J12345678','maxlength'=>'15']) !!}
</div>
<div class="form-group">
    {!! Form::label('nomb_proveedor','Nombre') !!}
    {!! Form::text('nomb_proveedor',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del proveedor','maxlength'=>'45']) !!}
</div>
<div class="form-group">
    {!! Form::label('telf_proveedor','Telefono') !!}
    {!! Form::text('telf_proveedor',null,['class'=>'form-control','placeholder'=>'Ingrese un número telefonico','maxlength'=>'15']) !!}
</div>
<div class="form-group">
    {!! Form::label('correo_proveedor','Correo') !!}
    {!! Form::text('correo_proveedor',null,['class'=>'form-control','placeholder'=>'Ingrese una dirección de correo','maxlength'=>'30']) !!}
</div>
<div class="form-group">
    {!! Form::label('contacto_proveedor','Persona Contacto') !!}
    {!! Form::text('contacto_proveedor',null,['class'=>'form-control','placeholder'=>'Ingrese una persona de contacto','maxlength'=>'30']) !!}
</div>