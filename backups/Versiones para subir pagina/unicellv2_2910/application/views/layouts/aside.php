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
                            <i class="fa fa-user"></i> <span> Usuarios</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url();?>mantenimiento/usuarios"><i class="fa fa-circle-o"></i> Listado</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tablet"></i> <span> Artículos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url();?>mantenimiento/categorias"><i class="fa fa-circle-o"></i> Categorias</a></li>
                            <li><a href="<?= base_url();?>mantenimiento/marcas"><i class="fa fa-circle-o"></i> Marcas</a></li>
                            <li><a href="<?= base_url();?>mantenimiento/colores"><i class="fa fa-circle-o"></i> Colores</a></li>
                            <li><a href="<?= base_url();?>mantenimiento/articulos"><i class="fa fa-circle-o"></i> Artículos</a></li>
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
                            <li><a href="<?= base_url();?>mantenimiento/clientes"><i class="fa fa-circle-o"></i> Clientes</a></li>
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
                            <i class="fa fa-plus"></i> <span> Compras</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Listado</a></li>
                        </ul>
                    </li>
                     <li class="treeview">
                        <a href="#">
                            <i class="fa fa-plus"></i> <span> Proveedores</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>mantenimiento/proveedores"><i class="fa fa-circle-o"></i> Agregar</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-wrench"></i> <span> Servicio Técnico</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url();?>mantenimiento/servicios"><i class="fa fa-circle-o"></i> Servicios</a></li>
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
                            <li><a href="<?= base_url();?>movimientos/ventas"><i class="fa fa-circle-o"></i> Ventas</a></li>
                             <!--<li><a href="#"><i class="fa fa-circle-o"></i> Pedidos</a></li>-->
                            
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-print"></i> <span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=".#"><i class="fa fa-circle-o"></i> Categorias</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Clientes</a></li>
                            <li><a href="<?= base_url();?>reportes/ventas"><i class="fa fa-circle-o"></i> Ventas</a></li>
                            <li><a href="<?= base_url();?>mantenimiento/articulos/reporteArticulos"><i class="fa fa-circle-o"></i> Artículos</a></li>
                        </ul>
                    </li>
                     <li class="treeview">
                        <a href="#">
                            <i class="fa fa-commenting"></i> <span>Acerca de</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <!--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Categorias</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Clientes</a></li>
                            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Productos</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Ventas</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Artículos</a></li>-->
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->