
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Reserva
        <small>Nueva</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <form action="<?php echo base_url();?>movimientos/pedidos/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-4">
                                     <?php foreach($comprobantes as $comprobante): ?>
                                        <input type="hidden" name="idcomprobante" value="<?php echo $comprobante->idComprobante;?>">
                                    <label for=""> Comprobante :</label> 
                                    <input type="text" value="<?php echo $comprobante->nombreComprobante;?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Numero:</label> 
                                    <input type="text" name="numero" value="<?php echo str_pad($comprobante->cantidad,6,"0", STR_PAD_LEFT);?>" readonly>
                                    
                                    <?php endforeach;?>
                                </div>
                                 <div class="col-md-4">
                                    <label for="">Fecha:</label> 
                                    <input type="text" value="<?php echo $hoy = date("d.m.y");?>" readonly>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Accesorio:</label>
                                    <input type="text" multiple="" class="form-control" id="accesorio" placeholder="Ingrese un nombre">
                                     <label class="error" style="color:red; display: none;">No existe este accesorio</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="">&nbsp;</label>
                                    <button id="btn-agregar-pedidos" type="button" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                                </div>
                            </div>
                            <table id="tbpedidos" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Stock Max.</th>
                                        <th>Cantidad</th>
                                        <th>Importe</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
               
                            <div class="row">
                                    <div class="col-md-offset-9">
                                        <div class="input-group">
                                            <span class="input-group-addon">Total:</span>
                                            <input type="text" class="form-control" placeholder="Subtotal" name="total" readonly="readonly">
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                    <a class="btn btn-primary" href="<?php echo base_url();?>movimientos/pedidos"> Cancelar </a>
                                </div>
                                
                            </div>
                        </form>
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
                <h4 class="modal-title">Lista de Clientes</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Opcion</th>
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
                                            <td><?php echo $cliente->nombrecompleto;?></td>
                                            <td><?php echo $cliente->numDocumento;?></td>
                                            <?php $datacliente = $cliente->idCliente."*".$cliente->nombrecompleto."*".$cliente->numDocumento;?>
                                            <td>
                                               <button type="button" class="btn btn-success btn-check" value="<?php echo $datacliente;?>"><span class="fa fa-check"></span></button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif; ?>
                    </tbody>
                </table>
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
