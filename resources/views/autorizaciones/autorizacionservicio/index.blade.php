@extends('autorizaciones.autorizacion')

@section('content')
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Autorizaciones</h4></div>
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
                       <table class="table" id="autorizacion">
                           <thead>
                           <tr>
                               <th>#</th>
                               <th>Numero de Autorizacion</th>
                               <th>Proveedor</th>
                               <th>N # Solicitud Asignada</th>
                               <th>Fecha de Autorizacion</th>
                               <th>Status</th>
                               <th>Ver</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($autorizaciones as $autorizacion)
                               <tr>
                                   <td>{{$autorizacion->id}}</td>
                                   <td>{{$autorizacion->numero_autorizacion}}</td>
                                   <td>{{$autorizacion->proveedor->nomb_proveedor}}</td>
                                   <td>{{$autorizacion->solicitud->numero_solicitud}}</td>
                                   <td>{{date('d-m-Y',strtotime($autorizacion->fecha_autorizacion))}}</td>
                                   <td>{{$autorizacion->status}}</td>
                                   <td>
                                   {!! Html::link(route('autorizaciones.autorizacionservicio.edit',$autorizacion->id),'Ver') !!}
                                   </td>
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {!! Html::link(route('autorizaciones.autorizacionservicio.create'),'Incluir',['class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-2 col-md-2 incluir']) !!}
                            {!! Html::link('#','Cancelar',['class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-2 col-md-2 cancelar']) !!}
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    @endsection
