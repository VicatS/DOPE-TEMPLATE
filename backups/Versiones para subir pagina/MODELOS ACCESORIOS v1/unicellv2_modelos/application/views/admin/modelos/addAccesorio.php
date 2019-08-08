
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
                        <form action="<?=base_url();?>mantenimiento/modelos/storeAccesorios" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $modelo->idModelo;?>" name="id_modelo">
                            <div class="form-group">
                                <div class="col-xs-4">
                                <!-- Agregar error a un estilo -->
                                    <label for="codigo">Color:</label>
                                    <input type="color" class="form-control" id="titulo" name="coloresaccesorios" list="listacoloraccesorios">
                                </div>
                                <div class="col-xs-4">
                                <!-- Agregar error a un estilo -->
                                    <label for="precio">Precio:</label>
                                    <input type="text" class="form-control" id="precio" name="precio">
                                </div>
                                <div class="col-xs-4">
                                <!-- Agregar error a un estilo -->
                                    <label for="cantidad">Cantidad:</label>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <br>
                                    <button type="submit" class="btn btn-success btn-flat" class="pull-right">Guardar</button>
                                    <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/modelos"> Cancelar </a>
                                </div>
                            </div>     
              
                        </form>
                        <datalist id="listacoloraccesorios">
                        	<option value="#ffffff">
                    		<option value="#000000">
                			<option value="#ffbf00">	
                        </datalist>
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
