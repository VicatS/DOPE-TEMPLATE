
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Empleados
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
                            <input type="hidden" name="idCliente">
                            <div class="form-group <?php echo !empty(form_error("nombres"))? 'has-error':'';?>">
                                <label for="codigo">Cliente:</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo set_value("nombres"); ?>">
                            <?php echo form_error("nombres","<span class='help-block'>","</span>"); ?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error("nroDoc"))? 'has-error':'';?>">
                                <label for="modelo"># Documento:</label>
                            <input type="number" class="form-control" id="nrodoc" name="nrodoc"value="<?php echo set_value("nrodoc"); ?>">
                            <?php echo form_error("nrodoc","<span class='help-block'>","</span>"); ?>
                            </div>
                            <div class="form-group">
                                <label for="tipocli">Tipo cliente:</label>
                                <select name="tipocli" id="tipocli" class="form-control">
                                <?php foreach ($tipoclientes as $tipocliente):?>
                                    <option value="<?php echo $tipocliente->idTipoCliente;?>"><?php echo $tipocliente->nombreTipo; ?></option>
                                <?php endforeach; ?>
                                </select>    
                            </div>
                             <div class="form-group">
                                <label for="tipodoc">Tipo documento:</label>
                                <select name="tipodoc" id="tipodoc" class="form-control">
                                <?php foreach ($tipodocumentos as $tipodocumento):?>
                                    <option value="<?php echo $tipodocumento->idTipoDocumento;?>"><?php echo $tipodocumento->nombreDocumento; ?></option>
                                <?php endforeach; ?>
                                </select>    
                            </div>
                             <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/clientes"> Cancelar </a>
                            </div>
                            <!--<form action="">
                                <input type="radio" name="gender" value="male"> <a href=""></a>Male<br>
                                <input type="radio" name="gender" value="female"> Female<br>
                            <input type="radio" name="gender" value="other"> Other
                            </form>-->
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
