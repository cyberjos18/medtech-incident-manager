@extends('solicitudes.solicitudservicio')
@section('content')
    <div class="container">
        <div class="row">
           <div class="col-xs-12 col-sm-06 col-md-10 col-md-offset-1">
               <div class="panel panel-default">
                   <div class="panel-heading"><h4>Solicitudes de Servicio</h4></div>
                   @if(Session::has('message') && Session::has('bandera'))
                       @if(Session::get('bandera')==='update')
                           @include('mensajes.update')
                       @elseif(Session::get('bandera')==='delete')
                           @include('mensajes.delete')
                       @else
                           @include('mensajes.success')
                       @endif
                   @endif
                   <div class="panel-body">
                       <table class="table table-responsive" id="solicitud">
                           <thead>
                           <tr>
                               <th>#</th>
                               <th>Numero de Solicitud</th>
                               <th>Fecha de Recibo</th>
                               <th>Centro</th>
                               <th>Estatus</th>
                               <th>Accion</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($solicitudes as $solicitud)
                               <tr>
                                   <td>{{$solicitud->id}}</td>
                                   <td>{{$solicitud->numero_solicitud}}</td>
                                   <td>{{date('d-m-Y',strtotime($solicitud->fecha_recibo))}}</td>
                                   <td>{{$solicitud->centro->nomb_centro}}</td>
                                   <td>{{$solicitud->status}}</td>
                                   <td>
                                       {!! Html::link(route('solicitudes.solicitudservicio.edit',$solicitud->id),'Ver') !!}
                                   </td>
                               </tr>
                               @endforeach

                           </tbody>

                       </table>

                       <div class="col-xs-12 col-sm-06 col-md-10">
                           <br>
                           {!! Html::link(route('solicitudes.solicitudservicio.create'),'Incluir',['class'=>'btn btn-success']) !!}
                           {!! Html::link('#','Cancelar',['class'=>'btn btn-primary']) !!}
                       </div>

                       </div>

                   </div>

               </div>

           </div>

        </div>

      @endsection