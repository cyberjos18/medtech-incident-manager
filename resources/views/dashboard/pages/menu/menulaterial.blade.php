<!-- menu -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>
            <li>
                <a href="" id="reload"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
                <!--maestros de datos-->
                <li>
                    <a><i class="fa fa-sitemap fa-fw"></i> Maestros <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a>Centros de atención<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    {!! Html::link(route('maestros.categorias.index'),'Categorias del centro',['target'=>'centro']) !!}
                                </li>
                                <li>
                                    {!! Html::link(route('maestros.centros.index'),'Datos del centro',['target'=>'centro']) !!}
                                </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>

                        <li>
                            {!! Html::link(route('maestros.estados.index'),'Estados',['target'=>'centro']) !!}
                        </li>
                        <li>
                            {!! Html::link(route('maestros.localidades.index'),'Localidades',['target'=>'centro']) !!}
                        </li>
                        <li>
                            {!! Html::link(route('maestros.proveedores.index'),'Proveedores',['target'=>'centro']) !!}
                        </li>
                        <li>
                            {!! Html::link(route('maestros.tiposequipos.index'),'Tipos de equipos medicos',['target'=>'centro']) !!}
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <!--/end maestros-->
            <li>
                <a><i class="fa fa-archive fa-fw"></i> Inventario<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        {!! Html::link(route('inventario.equipos.index'),'Equipos Medicos',['target'=>'centro']) !!}
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
                <li>
                    <a><i class="fa fa-clipboard fa-fw"></i> Solicitudes de servicio<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            {!! Html::link(route('solicitudes.solicitudservicio.index'),'Registro de solicitud',['target'=>'centro']) !!}
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a><i class="fa fa-share-square fa-fw"></i> Autorizaciones<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            {!! Html::link(route('autorizaciones.autorizacionservicio.index'),'Registro de autorización',['target'=>'centro']) !!}
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
         </ul>
         </div>

    <!-- /.sidebar-collapse -->
    </div>
<!-- /.navbar-static-side -->
<!--/ end menu -->
