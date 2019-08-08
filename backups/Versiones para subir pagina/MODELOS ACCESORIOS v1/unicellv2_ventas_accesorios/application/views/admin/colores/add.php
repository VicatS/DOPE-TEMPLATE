
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Colores
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
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
                          <form action="<?=base_url();?>mantenimiento/colores/store" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-xs-6">
                                <!-- Agregar error a un estilo -->
                                    <label for="codigo">Color:</label>
                                    <input type="color" class="form-control" id="titulo" name="codigo_hexadecimal" list="listacoloraccesorios" value="<?php echo set_value("codigo_hexadecimal"); ?>">
                                    <?php echo form_error("codigo_hexadecimal","<span class='help-block'>","</span>"); ?>
                                </div>
                                <div class="col-xs-6">
                                <!-- Agregar error a un estilo -->
                                    <label for="precio">Nombre:</label>
                                   <input type="text" class="form-control" id="nombreColor" name="nombre_color" value="<?php echo set_value("nombre_color"); ?>">
                                    <?php echo form_error("nombre_color","<span class='help-block'>","</span>"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <br>
                                    <button type="submit" class="btn btn-success btn-flat" class="pull-right">Guardar</button>
                                    <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/colores"> Cancelar </a>
                                </div>
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
