
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Artículos
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
                        <form action="<?=base_url();?>mantenimiento/clientes/update" method="POST">
                            <input type="hidden" name="id_cliente" value="<?php echo $cliente->idCliente;?>">
                             <div class="form-group">
                                <label for="cliente">Cliente:</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $cliente->nombreCliente;?>">
                            </div>
                            <div class="form-group">
                                <label for="modelo"># Documento:</label>
                            <input type="number" class="form-control" id="nrodoc" name="nrodoc"  value="<?php echo $cliente->numDocumento;?>">
                            </div>
                           <div class="form-group">
                            <label for="tipocli">Tipo cliente:</label>
                            <select name="tipocli" id="tipocli" class="form-control">
                            <?php foreach ($tipoclientes as $tipocliente):?>
                                <?php if ($tipocliente->idTipoCliente ==$cliente->idTipoCliente):?>
                                <option value="<?php echo $tipocliente->idTipoCliente;?>" selected><?php echo $tipocliente->nombreTipo; ?></option>
                                <?php else:?>
                                 <option value="<?php echo $tipocliente->idTipoCliente;?>"><?php echo $tipocliente->nombreTipo; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            </select>    
                            </div>
                           <div class="form-group">
                            <label for="tipodoc">Tipo documento:</label>
                            <select name="tipodoc" id="tipodoc" class="form-control">
                            <?php foreach ($tipodocumentos as $tipodocumento):?>
                                <?php if ($tipodocumento->idTipoDocumento ==$cliente->idTipoDocumento):?>
                                <option value="<?php echo $tipodocumento->idTipoDocumento;?>" selected><?php echo $tipodocumento->nombreDocumento; ?></option>
                                <?php else:?>
                                 <option value="<?php echo $tipodocumento->idTipoDocumento;?>"><?php echo $tipodocumento->nombreDocumento; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            </select>    
                            </div>
                          
                            <div>
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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
