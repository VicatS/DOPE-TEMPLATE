
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Reserva 
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
                        <a href="<?=base_url();?>movimientos/pedidos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Realizar Reserva</a>                        
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
                                    <th align="center">Nro Doc.</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indice=1; ?>
                                <?php if (!empty($pedidos)): ?>
                                    <?php foreach ($pedidos as $pedido) :?>
                                        <tr>
                                            <td>
                                                <?php echo $indice;
                                                $indice += 1;?>
                                            </td>
                                            <td><?php echo strtoupper($pedido->nombrecompleto); ?></td>
                                            <td><?php echo str_pad($pedido->numDocumento,6,"0", STR_PAD_LEFT);?></td>
                                            <td><?php echo $pedido->formatted_date; ?></td>
                                            <td><?php echo number_format($pedido->total, '2', '.',','); ?></td>

                                            <td><a href="#" class="btn btn-success"><?php echo strtoupper($pedido->estado); ?></a><span></span></td>
                                            <td>
                                                 <a href="<?=base_url();?>movimientos/pedidos/view/<?php echo $pedido->idPedido; ?>" class="btn btn-info"><span class="fa fa-eye"></span></a>
                                                <a href="#" class="btn btn-warning"><span class="fa fa-thumbs-down" title="Dar de baja"></span></a>
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
        <h4 class="modal-title">Información de la Reserva</h4>
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
