
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Artículos
        <small>Nuevo</small>
        <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/imagenes"> Agregar más imágenes </a>
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
                        <form action="<?=base_url();?>mantenimiento/articulos/store" method="POST" enctype="multipart/form-data">
                            <div class="col-xs-6">
                                <!-- Agregar error a un estilo -->
                                <div class="form-group <?php echo !empty(form_error("codigo"))? 'has-error':'';?>">
                                    <label for="codigo">Código:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo set_value('codigo'); ?>">
                                <!--Mostrar error de validacion, agregamos en todos los inputs a validar -->
                                <?php echo form_error("codigo","<span class='help-block'>","</span>"); ?>
                                </div>
                                <div class="form-group <?php echo !empty(form_error("modelo"))? 'has-error':'';?>">
                                    <label for="modelo">Módelo:</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo set_value('modelo'); ?>">
                                 <?php echo form_error("modelo","<span class='help-block'>","</span>"); ?>
                                </div>
                                <div class="form-group">
                                    <label for="marca">Marca:</label>
                                <select name="marca" id="marca" class="form-control">
                                <?php foreach ($marcas as $marca):?>
                                    <option value="<?php echo $marca->idMarca;?>"><?php echo $marca->nombreMarca; ?></option>
                                <?php endforeach; ?>
                                </select>    
                                </div>
                                 <div class="form-group">
                                    <label for="color">Color:</label>
                                <select name="color" id="color" class="form-control">
                                <?php foreach ($colores as $color):?>
                                    <option value="<?php echo $color->idColor;?>"><?php echo $color->nombreColor; ?></option>
                                <?php endforeach; ?>
                                </select>    
                                </div>
                                 <div class="form-group">
                                    <label for="codigo">Imagen:</label>
                                <input type="file" class="form-control"  name="foto">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group <?php echo !empty(form_error("precio"))? 'has-error':'';?>">
                                    <label for="precio">Precio:</label>
                                <input type="text" class="form-control" id="precio" name="precio" value="<?php echo set_value('precio'); ?>">
                                 <?php echo form_error("precio","<span class='help-block'>","</span>"); ?>
                                </div>
                                <div class="form-group <?php echo !empty(form_error("stock"))? 'has-error':'';?>">
                                    <label for="stock">Stock:</label>
                                <input type="text" class="form-control" id="stock" name="stock" value="<?php echo set_value('stock'); ?>">
                                 <?php echo form_error("stock","<span class='help-block'>","</span>"); ?>
                                </div>
                                  <div class="form-group">
                                    <div class="form-group">
                                    <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" class="form-control">
                                <?php foreach ($categorias as $categoria):?>
                                    <option value="<?php echo $categoria->idCategoria;?>"><?php echo $categoria->nombreCategoria; ?></option>
                                <?php endforeach; ?>
                                </select>   
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                                </div>
                                <div>
                                <button type="submit" class="btn btn-success btn-flat" class="pull-right">Guardar</button>
                                <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/articulos"> Cancelar </a>
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
