
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Modelos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Calidad</th>
                                    <th>Stock</th>
                                    <th>Categoria</th>
                                    <th>Marca</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indice=1; ?>
                                <?php if(!empty($modelos)) :?>
                                    <?php foreach ($modelos as $modelo):?>
                                        <tr>
                                            <td>
                                                <?php echo $indice;
                                                $indice += 1;?>
                                            </td>
                                            <td><?php echo strtoupper($modelo->nombreModelo);?></td>
                                            <td><?php echo strtoupper($modelo->calidad);?></td>
                                            <td><?php echo $modelo->total; ?></td>
                                            <td><?php echo strtoupper($modelo->categoria); ?></td>
                                            <td><?php echo strtoupper($modelo->marca); ?></td>
                                            <td>
                                                <div class="btn-group">
                                                   <button type="button" class="btn btn-info btn-view-modelo" data-toggle="modal" data-target="#modal-default" value="<?php echo $modelo->idModelo;?>">
                                                        <span class="fa fa-eye" title="Ver Stock"></span>
                                                    </button>

                                                     <?php if ($permisos->update == 1) :?>
                                                    <a href="<?=base_url();?>mantenimiento/accesorios/add/<?php echo $modelo->idModelo;?>" class="btn btn-success"><span class="fa fa-plus-square" title="Agregar Accesorios"></span></a>
                                                    <?php endif ?>
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
                <input type="hidden" name="" value="<?php echo $modelo->idModelo;?>">
        <h4 class="modal-title">Stock Total</h4>
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
