<!DOCTYPE html>
<html lang="en">
<head>
    {!! Html::script('/js/jquery-3.1.1.min.js') !!}
    {!! Html::script('/js/usuario.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/jquery.dataTables.min.js') !!}
    {!! Html::script('js/dataTables.bootstrap4.min.js') !!}
    {!! Html::style('/css/bootstrap.min.css') !!}
    {!! Html::style('/css/dataTables.bootstrap4.min.css') !!}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <title>Usuarios</title>
</head>
<body>
</br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Registro de usuario</h4></div>
                @include('mensajes.validation')
                <div class="panel-body">
                    {!! Form::open(['route'=>'maestros.usuarios.store','method'=>'POST','class'=>'']) !!}
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
                    <div class="form-group">
                        {!! Form::label('perfil_user','Perfil') !!}
                        {!! Form::select('perfil_user',['Administrador'=>'Administrador','Usuario'=>'Usuario'],null,['id'=>'perfil_user','class'=>'form-control','placeholder'=>'Selecciones el perfil del usuario...']) !!}
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {!! Form::submit('Guardar',['id'=>'guardar','class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                            {!! Html::link(route('maestros.usuarios.index'),'Cancelar',['class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

    </div>

</div>
</body>
</html>