
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Proveedores
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->

    <section class="content"  style="background-image: url(assets/template2/images/headers/inicio.jpg)">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($this->session->flashdata("error")):?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-ban"><?php if ($this->session->flashdata("error"));?></i></p>
                        </div>
                        <?php endif; ?>
                        <form action="<?=base_url();?>mantenimiento/proveedores/store" method="POST">
                            <div class="row">
                                <div class="col-xs-6">
                                <!-- Agregar error a un estilo -->
                                    <div class="form-group">
                                    <label for="codigo">Nombres:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres">
                                    </div>
                                </div>
                                 <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="codigo">Apellido Paterno:</label>
                                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="codigo">Apellido Materno:</label>
                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno">
                                    </div>
                                </div> 
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="categoria">Email:</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                </div>  
                            </div>
                           <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="codigo">Nombre Empresa:</label>
                                        <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa">
                                    </div>
                                </div> 
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="categoria">Representante Legal:</label>
                                        <input type="text" class="form-control" id="representante" name="representante">
                                    </div>
                                </div>  
                            </div>
                            <div>
                                <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="codigo">Domicilio :</label>
                                        <input type="text" class="form-control" id="domicilio" name="domicilio">
                                    </div>
                                </div> 
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="categoria">Teléfono Empresa:</label>
                                        <input type="text" class="form-control" id="telefono_empresarial" name="telefono_empresarial">
                                    </div>
                                </div>  
                            </div>
                                <button type="submit" class="btn btn-success btn-flat" class="pull-right">Guardar</button>
                                <a class="btn btn-primary" href="#"> Cancelar </a>
                            </div>
                        </form>
                    </div>
                </div>      
            </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
