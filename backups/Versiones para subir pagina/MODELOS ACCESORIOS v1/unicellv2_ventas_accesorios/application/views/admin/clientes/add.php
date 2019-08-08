
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Clientes
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
                        <form action="<?=base_url();?>mantenimiento/clientes/store" method="POST">
                                <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Nombres:</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" >
                                    </div> 
                                    <div class="col-md-6 <?php echo !empty(form_error("apellido_paterno")==true)? 'has-error':'';?>">
                                             <label for=""> Apellido Paterno:</label>
                                            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="<?php echo set_value("apellido_paterno"); ?>" >
                                            <?php echo form_error("apellido_paterno","<span class='help-block' style='color:red;'>","</span>"); ?>   
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label for=""> Apellido Materno:</label>
                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" >
                                    </div> 
                                    <div class="col-md-6 <?php echo !empty(form_error("email")==true)? 'has-error':'';?>">
                                            <label for=""> Email:</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value("email"); ?>">
                                            <?php echo form_error("email","<span class='help-block' style='color:red;'>","</span>"); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 <?php echo !empty(form_error("celular")==true)? 'has-error':'';?>">
                                            <label for=""> Nro Celular:</label>
                                            <input type="text" class="form-control" id="celular" name="celular" value="<?php echo set_value("celular"); ?>">
                                             <?php echo form_error("celular","<span class='help-block' style='color:red;'>","</span>"); ?>
                                    </div> 
                                    <div class="col-md-6">
                                        <label for="">Teléfono Referencia:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="idCliente">
                                    <div class="form-group <?php echo !empty(form_error("razon_social"))? 'has-error':'';?>">
                                        <label for="codigo">Razón Social:</label>
                                        <input type="text" class="form-control" id="razon_social" name="razon_social" value="<?php echo set_value("razon_social"); ?>">
                                        <?php echo form_error("razon_social","<span class='help-block'>","</span>"); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?php echo !empty(form_error("nrodoc")==true)? 'has-error':'';?>">
                                        <label for="modelo"># Documento:</label>
                                        <input type="text" class="form-control" id="nrodoc" name="nrodoc" value="<?php echo set_value("nrodoc"); ?>">
                                        <?php echo form_error("nrodoc","<span class='help-block' style='color:red;'>","</span>"); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tipocli">Tipo cliente:</label>
                                    <select name="tipocli" id="tipocli" class="form-control">
                                    <?php foreach ($tipoclientes as $tipocliente):?>
                                        <option value="<?php echo $tipocliente->idTipoCliente;?>"><?php echo $tipocliente->nombreTipo; ?></option>
                                    <?php endforeach; ?>
                                    </select>    
                                </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="tipodoc">Tipo documento:</label>
                                        <select name="tipodoc" id="tipodoc" class="form-control">
                                        <?php foreach ($tipodocumentos as $tipodocumento):?>
                                            <option value="<?php echo $tipodocumento->idTipoDocumento;?>"><?php echo $tipodocumento->nombreDocumento; ?></option>
                                        <?php endforeach; ?>
                                        </select>    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                        <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/clientes"> Cancelar </a>
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
