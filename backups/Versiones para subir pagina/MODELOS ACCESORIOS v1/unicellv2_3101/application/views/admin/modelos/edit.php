
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Modelos
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
                        <form action="<?=base_url();?>mantenimiento/modelos/update" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="idModelo" value="<?php echo $modelo->idModelo;?>">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="nombre">Nombre Modelo:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre_modelo" value="<?php echo $modelo->nombreModelo;?>">
                                </div>
                                 <div class="col-xs-3">
                                    <label for="categoria">Categoria:</label>
                                    <select name="categoria" id="categoria" class="form-control">
                                              // comparamos
                                    <?php foreach ($categorias as $categoria):?>
                                        <?php if ($categoria->idCategoria ==$modelo->idCategoria):?>
                                        <option value="<?php echo $categoria->idCategoria;?>" selected><?php echo strtoupper($categoria->nombreCategoria); ?></option>
                                        <?php else:?>
                                        <option value="<?php echo $categoria->idCategoria;?>"><?php echo strtoupper($categoria->nombreCategoria); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                 <div class="col-xs-3">
                                    <label for="marca">Marca:</label>
                                    <select name="marca" id="marca" class="form-control">
                                    <?php foreach ($marcas as $marca):?>
                                        <?php if ($marca->idMarca ==$modelo->idMarca):?>
                                        <option value="<?php echo $marca->idMarca;?>" selected><?php echo strtoupper($marca->nombreMarca); ?></option>
                                        <?php else:?>
                                        <option value="<?php echo $marca->idMarca;?>"><?php echo strtoupper($marca->nombreMarca); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </select><br>
                                </div>
                            </div>
                            <div class="form-group">
                                 <div class="col-xs-3">
                                    <label for="calidad">Calidad:</label>
                                    <input type="text" class="form-control" id="calidad" name="calidad" value="<?php echo $modelo->calidad;?>">
                                </div>
                                <div class="col-xs-3">
                                    <label for="foto">Imagen:</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                </div>
                                 <div class="col-xs-6">
                                    <label for="nombre">Descripción:</label>
                                    <input type="text" class="form-control" id="nombreCategoria" name="descripcion" value="<?php echo $modelo->descripcion;?>">
                                </div>
                            </div>
                            
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <br>
                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                    <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/modelos"> Cancelar </a>
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
