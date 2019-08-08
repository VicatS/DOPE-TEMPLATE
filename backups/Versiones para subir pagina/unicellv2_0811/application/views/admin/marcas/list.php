
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Marcas
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
                        <a href="<?=base_url();?>mantenimiento/marcas/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Marca</a>                        
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
                                    <th>Descripción</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indice=1; ?>
                                <?php if(!empty($marcas)) :?>
                                    <?php foreach ($marcas as $marca):?>
                                        <tr>
                                            <td>
                                                <?php echo $indice;
                                                $indice += 1;?>
                                            </td>
                                            <td><?php echo $marca->nombreMarca;?></td>
                                            <td><?php echo $marca->descripcion;?></td>
                                            <td>
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-view-marca" data-toggle="modal" data-target="#modal-default" value="<?php echo $marca->idMarca;?>">
                                                        <span class="fa fa-eye"></span>
                                                    </button>
                                                    <a href="<?=base_url();?>mantenimiento/marcas/edit/<?php echo $marca->idMarca?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?=base_url();?>mantenimiento/marcas/delete/<?php echo $marca->idMarca;?>" class="btn btn-danger btn-remove-marca"><span class="fa fa-remove"></span></a>
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
        <h4 class="modal-title">Información de la Marca</h4>
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