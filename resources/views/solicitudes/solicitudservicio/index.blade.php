@extends('solicitudes.solicitudservicio')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-xs-12 col-sm-06 col-md-10 col-md-offset-1">
               <div class="panel panel-default">
                   <div class="panel-heading"><h4>Solicitudes de Servicio</h4></div>
                   <div class="panel-body">
                       <table class="table table-responsive">
                           <tbody>
                           <tr>
                               <th>#</th>
                               <th>Numero de Solicitud</th>
                               <th>Fecha de Recibo</th>
                               <th>Centro</th>
                               <th>Estatus</th>
                           </tr>
                           </tbody>
                       </table>
                       <!--Falta colocar el render para paginar-->
                       <div class="col-xs-12 col-sm-06 col-md-10 col-md-offset-9">
                           {!! Html::link(route('solicitudes.solicitudservicio.create'),'Incluir',['class'=>'btn btn-success']) !!}
                           {!! Html::link('#','Cancelar',['class'=>'btn btn-primary']) !!}
                       </div>

                       </div>

                   </div>

               </div>

           </div>

        </div>

      @endsection