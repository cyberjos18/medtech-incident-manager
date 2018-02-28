@extends('autorizaciones.autorizacion')
@section('script')

@endsection
@section('content')
        <div class="container">
        <div class="row">
            <div class="col">
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
                       <table class="table table-responsive" id="autorizacion">
                           <thead>
                           <tr>
                               <th>#</th>
                               <th>Numero de Autorizacion</th>
                               <th>Proveedor</th>
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
                                   <td>{{date('d-m-Y',strtotime($autorizacion->fecha_autorizacion))}}</td>
                                   <td>{{$autorizacion->status}}</td>
                                   <td>
                                   {!! Html::link(route('autorizaciones.autorizacionservicio.edit',$autorizacion->id),'Ver') !!}
                                   </td>
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                        <div>
                            <br>
                            {!! Html::link(route('autorizaciones.autorizacionservicio.create'),'Incluir',['class'=>'btn btn-success col-lg-1 col-xs-12 col-sm-06 col-md-10']) !!}
                            {!! Html::link('#','Cancelar',['class'=>'btn btn-primary col-lg-1 col-xs-12 col-sm-06 col-md-10','style'=>'margin-left:0.5%']) !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    @endsection
