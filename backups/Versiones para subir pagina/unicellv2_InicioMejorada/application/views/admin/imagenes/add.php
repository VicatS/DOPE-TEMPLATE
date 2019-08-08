
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Imágenes
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
                        <form action="<?=base_url();?>mantenimiento/imagenes/store" method="POST" enctype="multipart/form-data">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="categoria">Artículo:</label>
                                        <select name="modelo" id="modelo" class="form-control">
                                        <?php foreach ($articulos as $articulo):?>
                                        <option value="<?php echo $articulo->idArticulo;?>"><?php echo $articulo->modelo; ?></option>
                                        <?php endforeach; ?>
                                        </select>   
                                    </div>
                                </div>  
                            </div>
                            <div class="col-xs-6">
                                <!-- Agregar error a un estilo -->
                                <div class="form-group">
                                    <label for="codigo">Título:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <!-- Agregar error a un estilo -->
                                <div class="form-group">
                                    <label for="codigo">Agregar archivo:</label>
                                <input type="file" class="form-control" id="ruta" name="ruta">
                                </div>
                            </div>
                          
                                 
                            <div>
                                <button type="submit" class="btn btn-success btn-flat" class="pull-right">Guardar</button>
                                <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/articulos"> Cancelar </a>
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
