
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo $modelo->nombreModelo; ?>
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
                        <form action="<?=base_url();?>mantenimiento/accesorios/store" method="POST" enctype="multipart/form-data">
                            <div class="form-group fieldGroup"><br>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <a href="javascript:void(0)" class="btn btn-success addMore"><span title="Agregar más campos" class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-danger remove"><span title="Eliminar campos" class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"><br></span></a>
                                    </div> 
                                </div>                                
                                <input type="hidden" value="<?php echo $modelo->idModelo;?>" name="id_modelos">
                                <div class="form-group"><br>
                                    <div class="col-xs-3">
                                        <label for="foto">Imagen:</label>
                                        <input type="file" name="foto[]" multiple="multiple" class="form-control" placeholder="Subir Imagen"/>
                                    </div>

                                    <div class="col-xs-3">
                                        <label for="cantidad">Color:</label>
                                        <select name="colores[]" id="color" class="form-control">
                                        <?php foreach ($colores as $color):?>
                                        <option value="<?php echo $color->idColor;?>" style="background-color: <?php echo $color->codigoHexadecimal;?>"><?php echo $color->nombreColor; ?></option>
                                        <?php endforeach; ?>    
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="precio">Precio:</label>
                                        <input type="text" name="precios[]" class="form-control" step="0.01" placeholder="Ingrese Precio"/>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="cantidad">Cantidad:</label>
                                        <input type="number" name="cantidades[]" min="1" class="form-control" placeholder="Cantidad"/>
                                    </div>
                                </div> <br>   
                            </div>
                            <!-- copy of input fields group -->
                             <div class="form-group fieldGroup"><br>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <a href="javascript:void(0)" class="btn btn-success addMore"><span title="Agregar más campos" class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                                        <a href="javascript:void(0)" class="btn btn-danger remove"><span title="Eliminar campos" class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"><br></span></a>
                                    </div> 
                                </div>                                
                                <input type="hidden" value="<?php echo $modelo->idModelo;?>" name="id_modelos">
                                <div class="form-group"><br>
                                    <div class="col-xs-3">
                                        <label for="foto">Imagen:</label>
                                        <input type="file" name="foto[]" multiple="multiple" class="form-control" placeholder="Subir Imagen"/>
                                    </div>

                                    <div class="col-xs-3">
                                        <label for="cantidad">Color:</label>
                                        <select name="colores[]" id="color" class="form-control">
                                        <?php foreach ($colores as $color):?>
                                        <option value="<?php echo $color->idColor;?>" style="background-color: <?php echo $color->codigoHexadecimal;?>"><?php echo $color->nombreColor; ?></option>
                                        <?php endforeach; ?>    
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="precio">Precio:</label>
                                        <input type="text" name="precios[]" class="form-control" step="0.01" placeholder="Ingrese Precio"/>
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="cantidad">Cantidad:</label>
                                        <input type="number" name="cantidades[]" min="1" class="form-control" placeholder="Cantidad"/>
                                    </div>
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
