
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         Gestión 
        <small>Editar</small>
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
                        <form action="<?=base_url();?>mantenimiento/accesorios/update" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $accesorio->idAccesorio;?>" name="id_accesorio">
                                <div class="form-group"><br>
                                     <div class="col-xs-3">
                                        <label for="cantidad">Módelo:</label>
                                        <select name="idModelo" id="color" class="form-control">
                                        <?php foreach ($modelos as $modelo):?>
                                            <?php if ($modelo->idModelo ==$accesorio->idModelo):?>
                                            <option value="<?php echo $modelo->idModelo;?>" selected><?php echo strtoupper($modelo->nombreModelo); ?></option>
                                            <?php else:?>
                                            <option value="<?php echo $modelo->idModelo;?>"><?php echo strtoupper($modelo->nombreModelo); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="cantidad">Color:</label>
                                        <select name="idColor" id="color" class="form-control">
                                        <?php foreach ($colores as $color):?>
                                            <?php if ($color->idColor ==$accesorio->idColor):?>
                                            <option value="<?php echo $color->idColor;?>" selected style="background-color: <?php echo $color->codigoHexadecimal;?>"><?php echo strtoupper($color->nombreColor); ?></option>
                                            <?php else:?>
                                            <option value="<?php echo $color->idColor;?>" style="background-color: <?php echo $color->codigoHexadecimal;?>"><?php echo strtoupper($color->nombreColor); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="precio">Precio:</label>
                                        <input type="text" name="precio" class="form-control" step="0.01" value="<?php echo $accesorio->precio;?>" placeholder="Ingrese Precio"/>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="cantidad">Cantidad:</label>
                                        <input type="number" name="stock" min="1" class="form-control" value="<?php echo $accesorio->stock;?>" placeholder="Cantidad"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <br>
                                    <button type="submit" class="btn btn-success btn-flat" class="pull-right">Guardar</button>
                                    <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/accesorios/gestion"> Cancelar </a>
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
