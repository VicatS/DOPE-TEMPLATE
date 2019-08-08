        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar" >      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU DE NAVEGACIÓN</li>
                    <li>
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tablet"></i> <span> Inventario</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview"><a href="#"><i class="fa  fa-tv"></i> Accesorios<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url();?>mantenimiento/accesorios"><i class="fa fa-circle-o"></i> Listado</a></li>
                                    <li><a href="<?= base_url();?>mantenimiento/accesorios/gestion"><i class="fa fa-circle-o"></i> Gestión</a></li>
                                    <li><a href="<?= base_url();?>mantenimiento/accesorios/delete"><i class="fa fa-circle-o"></i> Dar Alta</a></li>
                                </ul>
                            </li>
                            <li class="treeview"><a href="#"><i class="fa fa-phone"></i> Modelos<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url();?>mantenimiento/modelos"><i class="fa fa-circle-o"></i> Listado</a></li>
                                    <li><a href="<?= base_url();?>mantenimiento/modelos/gestion"><i class="fa fa-circle-o"></i> Gestión</a></li>
                                    <li><a href="<?= base_url();?>mantenimiento/modelos/altas"><i class="fa fa-circle-o"></i> Dar Alta</a></li>
                                </ul>
                            </li>
                            <li class="treeview"><a href="#"><i class="fa fa-wrench"></i> Mantenimiento<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">
                                    <li><a href="<?= base_url();?>mantenimiento/categorias"><i class="fa fa-circle-o"></i> Categorias</a></li>
                                    <li><a href="<?= base_url();?>mantenimiento/marcas"><i class="fa fa-circle-o"></i> Marcas</a></li>
                                    <li><a href="<?= base_url();?>mantenimiento/colores"><i class="fa fa-circle-o"></i> Colores</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                     <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i> <span> Clientes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url();?>mantenimiento/clientes"><i class="fa fa-circle-o"></i> Listado</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text"></i> <span> Órdenes de servicio</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>movimientos/ordenservicio"><i class="fa fa-circle-o"></i> Gestionar órden</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-wrench"></i> <span> Servicios </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url();?>mantenimiento/servicios"><i class="fa fa-circle-o"></i> Listado</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cart-plus"></i> <span>Ventas</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url();?>movimientos/ventas"><i class="fa fa-circle-o"></i> Listado</a></li>
                             <!--<li><a href="#"><i class="fa fa-circle-o"></i> Pedidos</a></li>-->
                            
                        </ul>
                    </li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-print"></i> Reportes
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="<?= base_url();?>mantenimiento/articulos/reporteArticulos"><i class="fa fa-circle-o"></i> Artículos</a></li>
                        <li class="treeview">
                          <a href="#"><i class="fa fa-circle-o"></i> Ventas
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="<?= base_url();?>reportes/articulos"><i class="fa fa-circle-o"></i> Artículos más vendidos</a></li>
                            <li><a href="<?= base_url();?>reportes/ventas/clientesVentas"><i class="fa fa-circle-o"></i> Clientes con mas ventas</a></li>
                            <li><a href="<?= base_url();?>reportes/ventas"><i class="fa fa-circle-o"></i> Periodos de ventas</a></li>
                          </ul>
                        </li>
                          <li class="treeview">
                          <a href="#"><i class="fa fa-circle-o"></i> Órdenes de Servicio
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="<?= base_url();?>reportes/ordenes"><i class="fa fa-circle-o"></i> Periodos de órdenes</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-hand-stop-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url();?>administrador/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                            <li><a href="<?= base_url();?>administrador/permisos"><i class="fa fa-circle-o"></i> Permisos</a></li>
                        </ul>
                    </li>
                      <li class="treeview">
                        <a href="#">
                            <i class="fa fa-hand-stop-o"></i> <span>Pedidos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url();?>movimientos/pedidos"><i class="fa fa-circle-o"></i> Listado</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Permisos</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->