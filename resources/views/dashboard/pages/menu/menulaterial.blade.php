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
            <li>
                <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
            </li>
            <li>
                <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="panels-wells.html">Panels and Wells</a>
                    </li>
                    <li>
                        <a href="buttons.html">Buttons</a>
                    </li>
                    <li>
                        <a href="notifications.html">Notifications</a>
                    </li>
                    <li>
                        <a href="typography.html">Typography</a>
                    </li>
                    <li>
                        <a href="icons.html"> Icons</a>
                    </li>
                    <li>
                        <a href="grid.html">Grid</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Second Level Item</a>
                    </li>
                    <li>
                        <a href="#">Third Level <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level Item</a>
                            </li>
                        </ul>
                        <!-- /.nav-third-level -->
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="blank.html">Blank Page</a>
                    </li>
                        <li>
                             <a href="">Login Page</a>
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
