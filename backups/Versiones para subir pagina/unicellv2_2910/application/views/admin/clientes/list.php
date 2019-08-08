
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Clientes
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?=base_url();?>mantenimiento/clientes/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Clientes</a>                        
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Cliente</th>
                                    <th>Razón Social</th>
                                    <th># Documento</th>
                                    <th>Tipo de Cliente</th>
                                    <th>Tipo de Documento</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indice=1; ?>
                                <?php if(!empty($clientes)) :?>
                                    <?php foreach ($clientes as $cliente):?>
                                        <tr>
                                            <td>
                                                <?php echo $indice;
                                                $indice += 1;?>
                                            </td>
                                            <td><?php echo $cliente->nombrecompleto; ?></td>
                                            <td><?php echo $cliente->razonSocial;?></td>
                                            <td><?php echo $cliente->numDocumento;?></td>
                                            <td><?php echo $cliente->TIPOCLIENTE;?></td>
                                            <td><?php echo $cliente->TIPODOCUMENTO;?></td>
                                            <?php $datacliente = $cliente->nombres."*".$cliente->apellidoPaterno."*".$cliente->apellidoMaterno."*".$cliente->email."*".$cliente->nroCelular."*".$cliente->telefonoReferencia."*".$cliente->razonSocial."*".$cliente->numDocumento."*".$cliente->TIPOCLIENTE."*".$cliente->TIPODOCUMENTO;?>
                                            <td>
                                                <div class="btn-group">
                                                   <button type="button" class="btn btn-info btn-view-cliente" data-toggle="modal" data-target="#modal-default" value="<?php echo $datacliente?>">
                                                        <span class="fa fa-eye"></span>
                                                    </button>
                                                    <a href="<?=base_url();?>mantenimiento/clientes/edit/<?php echo $cliente->idPersona;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?=base_url();?>mantenimiento/clientes/delete/<?php echo $cliente->idPersona;?>" class="btn btn-danger btn-remove-cliente"><span class="fa fa-remove"></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Información del Cliente</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
