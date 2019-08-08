
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
                                <div class="col-xs-3">
                                    <label for="foto">Imagen:</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                </div>
                                <div class="col-xs-3">
                                     <label for="cantidad">Color:</label>
                                    <select name="color" id="color" class="form-control">
                                        <option>&nbsp;</option> 
                                        <?php foreach ($colores as $color):?>   
                                        <option value="<?php echo $color->idColor;?>" style="background-color: <?php echo $color->codigoHexadecimal;?>"><?php echo $color->nombreColor; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>    
                                <div class="col-xs-3">
                                <!-- Agregar error a un estilo -->
                                    <label for="precio">Precio:</label>
                                    <input type="text" class="form-control" id="precio" name="precio">
                                </div>
                                <div class="col-xs-3">
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
                        	<option value="<?php echo $color->codigoHexadecimal;?>">
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
