
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Ventas
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
                        <a href="<?=base_url();?>movimientos/ventas/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Venta</a>                        
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
                                    <th>Tipo Comprobante</th>
                                    <th># Comprobante</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indice=1; ?>
                                <?php if (!empty($ventas)): ?>
                                    <?php foreach ($ventas as $venta) :?>
                                        <tr>
                                            <td>
                                                <?php echo $indice;
                                                $indice += 1;?>
                                            </td>
                                            <td><?php echo strtoupper($venta->nombrecompleto); ?></td>
                                            <td><?php echo $venta->TIPOCOMPROBANTE; ?></td>
                                            <td><?php echo $venta->numDocumento; ?></td>
                                            <td><?php echo $venta->formatted_date; ?></td>
                                            <td><?php echo number_format($venta->total, '2', '.',','); ?></td>

                                            <td><button type="button" class="btn btn-block btn-<?php if($venta->estado=="1"){echo "success";} else{echo "danger";}?>"><span class="label label-<?php if($venta->estado=="1"){echo "primary";} else{echo "danger";}?>"></span><?php if($venta->estado=="1"){echo "Activa";} else{echo "Anulada";}?></button></td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-view-venta" value="<?php echo $venta->idVenta; ?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-eye"></span></button>
                                                <?php if ($permisos->delete == 1) :?>
                                                <a href="<?=base_url();?>movimientos/ventas/delete/<?php echo $venta->idVenta;?>" class="btn btn-warning"><span class="fa fa-thumbs-down" title="Dar de baja"></span></a>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Información de la Venta</h4>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"></span> Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
