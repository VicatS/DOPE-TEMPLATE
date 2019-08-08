
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Órdenes de Servicio
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
                        <a href="<?=base_url();?>movimientos/ordenservicio/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Crear Órden de Servicio</a>                        
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
                                    <th>Equipo</th>
                                    <th>Nro Órden</th>
                                    <th>Avance Orden</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indice=1; ?>
                                <?php if (!empty($ordenes)): ?>
                                    <?php foreach ($ordenes as $orden) :?>
                                        <tr>
                                            <td>
                                                <?php echo $indice;
                                                $indice += 1;?>
                                            </td>
                                            <td><?php echo strtoupper($orden->nombrecompleto) ?></td>
                                            <td><?php echo strtoupper($orden->modeloEquipo); ?></td>
                                            <td><?php echo $orden->nroOrdenServicio; ?></td>
                                            <td><span class="<?php 
                                            if($orden->idEstadoOrdenServicio=="1"){
                                                echo   "label label-warning";
                                            }elseif($orden->idEstadoOrdenServicio=="2"){
                                                 echo   "label label-danger";
                                            }elseif($orden->idEstadoOrdenServicio=="3"){
                                                 echo   "label label-info";
                                            }else{
                                                echo "label label-success";}
                                            ?>"><?php echo strtoupper($orden->nombreEstado) ?></span></td>
                                            <td><?php echo $orden->formatted_date; ?></td>
                                             <td><button type="button" class="btn btn-block btn-<?php if($orden->estado=="1"){echo "success";} else{echo "danger";}?>"><span class="label label-<?php if($orden->estado=="1"){echo "primary";} else{echo "danger";}?>"></span><?php if($orden->estado=="1"){echo "Activa";} else{echo "Anulada";}?></button></td>
                                            <td>
                                                <input type="hidden" name="id">
                                                 <a href="<?=base_url();?>movimientos/ordenservicio/view/<?php echo $orden->idOrdenServicio; ?>" class="btn btn-info"><span class="fa fa-eye"></span></a>
                                                 <a href="<?=base_url();?>movimientos/ordenservicio/estado/<?php echo $orden->idOrdenServicio; ?>" class="btn btn-info"><span class="fa fa-battery-half"></span></a>
                                                 <?php if ($permisos->delete == 1) :?>
                                                 <a href="<?=base_url();?>movimientos/ordenservicio/delete/<?php echo $orden->idOrdenServicio; ?>" class="btn btn-warning"><span class="fa fa-remove" title="Dar de baja"></span></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
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

<!-- DataTables -->
<div class="modal modal-primary fade" id="modal-primary">
     <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Detalle Órden de Servicio</h4>
          </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-outline">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
