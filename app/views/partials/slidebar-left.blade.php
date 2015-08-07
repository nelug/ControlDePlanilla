<aside id="sidebar-left" class="sidebar-circle sidebar-dark">

                <!-- Start left navigation - profile shortcut -->
                <div class="sidebar-content">
                    <a href="javascript:void(0);" class="close">&times;</a>
                    <div class="media">
                        <div class="media-body">
                            <h4 class="media-heading"><span>Control de Planilla</span></h4>
                            <small>Tienda la Bendicion</small>
                        </div>
                    </div>
                </div><!-- /.sidebar-content -->
                <!--/ End left navigation -  profile shortcut -->

                <!-- Start left navigation - menu -->
                <ul class="sidebar-menu">

                    <!-- Start navigation - dashboard -->
                    <li class="active home">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-home"></i></span>
                            <span class="text">Escritorio</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!--/ End navigation - dashboard -->

                    <!-- Start category Usuario-->
                    <li class="sidebar-category">
                        <span>Usuario</span>
                        <span class="pull-right"><i class="fa fa-magic"></i></span>
                    </li>
                    <!--/ End category Usuario-->

                    <!-- Start navigation -  -->
                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-file-o"></i></span>
                            <span class="text">Clientes</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            <li><a href="javascript:void(0);" id="crear_cliente">Crear Cliente</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-file-o"></i></span>
                            <span class="text">Cuadrillas</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            <li><a href="javascript:void(0);" id="crear_cuadrilla">Crear Cuadrilla</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-file-o"></i></span>
                            <span class="text">Meloneras</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            <li><a href="javascript:void(0);" id="crear_melonera">Crear Melonera</a></li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fa fa-file-o"></i></span>
                            <span class="text">Consultas</span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            <li><a href="javascript:void(0);" onclick="mostrarTablaClientes()">Clientes</a></li>
                            <li><a href="javascript:void(0);" onclick="mostrarTablaCuadrillas()">Cuadrillas</span></a></li>
                            <li><a href="javascript:void(0);" onclick="mostrarTablaMelonera()">Meloneras</span></a></li>
                            <li><a href="javascript:void(0);">Pagos</span></a></li>
                            <li><a href="javascript:void(0);">Ventas</span></a></li>
                            <li><a href="javascript:void(0);" id="users_list">Usuarios</span></a></li>
                        </ul>
                    </li>
                    <!--/ End navigation - clientes -->


                </ul><!-- /.sidebar-menu -->
                <!--/ End left navigation - menu -->

                <!-- Start left navigation - footer -->
                <div class="sidebar-footer hidden-xs hidden-sm hidden-md">
                    <a class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Setting"><i class="fa fa-cog"></i></a>
                    <a id="fullscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Fullscreen"><i class="fa fa-desktop"></i></a>
                    <a class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Lock Screen"><i class="fa fa-lock"></i></a>
                    <a class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-power-off"></i></a>
                </div><!-- /.sidebar-footer -->
                <!--/ End left navigation - footer -->

            </aside>