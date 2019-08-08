
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
                            <input type="hidden" name="id_persona" value="<?php echo $persona->idPersona;?>">
                            <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Nombres:</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $persona->nombres;?>" >
                                    </div> 
                                    <div class="col-md-6">
                                        <label for=""> Apellido Paterno:</label>
                                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="<?php echo $persona->apellidoPaterno;?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Apellido Materno:</label>
                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="<?php echo $persona->apellidoMaterno;?>">
                                    </div> 
                                    <div class="col-md-6">
                                        <label for=""> Email:</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $persona->email;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    <label for=""> Nro Celular:</label>
                                        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $persona->nroCelular;?>" >
                                    </div> 
                                    <div class="col-md-6">
                                        <label for="">Teléfono Referencia:</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $persona->telefonoReferencia;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="id_cliente" value="<?php echo $cliente->idCliente;?>">
                                        <label for="cliente">Cliente:</label>
                                        <input type="text" class="form-control" id="razon" name="razon" value="<?php echo $cliente->razonSocial;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="modelo"># Documento:</label>
                                    <input type="number" class="form-control" id="nrodoc" name="nrodoc"  value="<?php echo $cliente->numDocumento;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                </div>
                                <div class="col-md-6">
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
                                </div>
                            <div>
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <a class="btn btn-primary" href="<?php echo base_url() ?>mantenimiento/clientes"> Cancelar </a>
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
