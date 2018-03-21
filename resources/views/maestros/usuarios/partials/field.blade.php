<div class="form-group">
    {!! Form::label('name','Nombre') !!}
    {!! Form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Por favor escriba el nombre del usuario']) !!}
</div>
<div class="form-group">
    {!! Form::label('email','Correo electronico') !!}
    {!! Form::text('email',null,['id'=>'email','class'=>'form-control','placeholder'=>'Por favor ingrese el correo del usuario']) !!}
</div>
<div class="form-group">
    {!! Form::label('password','Contraseña') !!}
    {!! Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>'Por favor ingrese la contraseña']) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation','Confirmar Contraseña') !!}
    {!! Form::password('password_confirmation',['id'=>'password_confirmation','class'=>'form-control','placeholder'=>'Por favor ingrese nuevamente la contraseña']) !!}
</div>

