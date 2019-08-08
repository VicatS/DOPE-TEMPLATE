
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Accesorios
        <small>Gestión</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Accesorio</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered btn-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Calidad</th>
                                    <th>Color</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Categoria</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indice=1; ?>
                                <?php if(!empty($accesorios)) :?>
                                    <?php foreach ($accesorios as $accesorio):?>
                                        <tr>
                                            <td>
                                                <?php echo $indice;
                                                $indice += 1;?>
                                            </td>
                                            <td><?php echo strtoupper($accesorio->modelo); ?></td>
                                            <td><?php echo strtoupper($accesorio->calidad); ?></td>
                                            <td><input type="color" value="<?php echo $accesorio->codhex;?>"><?php echo ' '.strtoupper($accesorio->color); ?></td>
                                            <td><?php echo strtoupper($accesorio->precio); ?></td>
                                            <td><?php echo strtoupper($accesorio->stock); ?></td>
                                            <td><?php echo strtoupper($accesorio->categoria); ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?=base_url();?>mantenimiento/accesorios/edit/<?php echo $accesorio->idAccesorio;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>

                                                    <a href="<?=base_url();?>mantenimiento/accesorios/delete/<?php echo $accesorio->idAccesorio;?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
        <h4 class="modal-title">Información del Accesorio </h4>
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
