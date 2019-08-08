
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Servicios
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
                        <form action="<?=base_url();?>mantenimiento/servicios/store" method="POST">
                            <input type="hidden" name="idServicio" value="<?php echo $servicio->idServicio;?>">
                            <div class="col-xs-6">
                                <!-- Agregar error a un estilo -->
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_servicio" name="nombre_servicio" value="<?php echo $servicio->nombreServicio; ?>">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="categoria">Categoria:</label>
                                        <select name="categoria" id="categoria" class="form-control">
                                        <?php foreach ($categorias as $categoria):?>
                                            <?php if ($categoria->idCategoria ==$servicio->idCategoria):?>
                                        <option value="<?php echo $categoria->idCategoria;?>" selected><?php echo $categoria->nombreCategoria; ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $categoria->idCategoria;?>"><?php echo $categoria->nombreCategoria; ?></option>
                                         <?php endif; ?>   
                                        <?php endforeach; ?>
                                        </select>   
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="modelo">Descripción:</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $servicio->descripcion; ?>">
                                </div>
                            <div>
                                <button type="submit" class="btn btn-success btn-flat" class="pull-right">Guardar</button>
                                <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/servicios"> Cancelar </a>
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
