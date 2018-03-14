@extends('solicitudes.solicitudservicio')
@section('content')
    <div class="container-fluid">
        <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                       <div class="table table-responsive">
                       <table class="table" id="solicitud">
                           <thead>
                           <tr>
                               <th>#</th>
                               <th>Numero de Solicitud</th>
                               <th>Fecha de Recibo</th>
                               <th>Centro</th>
                               <th>Status</th>
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
                       </div>
                       <div class="row">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <br>
                           {!! Html::link(route('solicitudes.solicitudservicio.create'),'Incluir',['class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                           {!! Html::link('/','Cancelar',['target'=>'_parent','class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                       </div>
                       </div>
                       </div>

                   </div>

               </div>

           </div>

        </div>

      @endsection