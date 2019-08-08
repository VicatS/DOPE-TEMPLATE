
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
                        <form action="<?=base_url();?>mantenimiento/modelos/store" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="nombre">Nombre Modelo:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre_modelo">
                                </div>
                                 <div class="col-xs-3">
                                    <label for="categoria">Categoria:</label>
                                    <select name="categoria" id="categoria" class="form-control">
                                        <?php foreach ($categorias as $categoria):?>
                                        <option value="<?php echo $categoria->idCategoria;?>"><?php echo strtoupper($categoria->nombreCategoria); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                 <div class="col-xs-3">
                                    <label for="marca">Marca:</label>
                                    <select name="marca" id="marca" class="form-control">
                                        <?php foreach ($marcas as $marca):?>
                                        <option value="<?php echo $marca->idMarca;?>"><?php echo strtoupper($marca->nombreMarca); ?></option>
                                        <?php endforeach; ?>
                                    </select><br>
                                </div>
                            </div>
                            <div class="form-group">
                                 <div class="col-xs-3">
                                    <label for="calidad">Calidad:</label>
                                    <input type="text" class="form-control" id="calidad" name="calidad">
                                </div>
                                <div class="col-xs-3">
                                    <label for="foto">Imagen:</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                </div>
                                 <div class="col-xs-6">
                                    <label for="nombre">Descripción:</label>
                                    <input type="text" class="form-control" id="nombreCategoria" name="descripcion">
                                </div>
                            </div>
                            
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <br>
                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                    <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/modelos/gestion"> Cancelar </a>
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
