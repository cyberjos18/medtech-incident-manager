@extends('auth.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Registro de usuario</h4></div>
                @include('mensajes.validation')
                <div class="panel-body">
                    {!! Form::open(['route' => 'maestros.usuarios.store', 'class' => 'form']) !!}
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
@endsection