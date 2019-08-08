
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Accesorios
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
                                            <?php $dataaccesorio = $accesorio->idModelo."*".$accesorio->modelo."*".$accesorio->calidad."*".$accesorio->color."*".$accesorio->precio."*".$accesorio->stock."*".$accesorio->categoria."*".$accesorio->marca."*".$accesorio->descripcion;?>
                                            <td>
                                                <div class="btn-group">
                                                  <button type="button" class="btn btn-info btn-view-accesorio" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataaccesorio?>">
                                                        <span class="fa fa-eye"></span>
                                                    </button>
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
