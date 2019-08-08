
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Órden de Servicio
        <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                       <form action="<?php echo base_url();?>movimientos/ordenservicio/store" method="POST" class="form-horizontal">
                             <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Comprobante:</label>
                                    <select name="comprobantes" id="comprobantes" class="form-control" required>
                                        <option value="">Seleccione...</option>
                                        <?php foreach($comprobantes as $comprobante): ?>
                                            <?php $datacomprobante= $comprobante->idComprobante."*".$comprobante->cantidad."*".$comprobante->iva."*".$comprobante->serie; ?>
                                            <option value="<?php echo $datacomprobante;?>"><?php echo $comprobante->nombreComprobante ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <input type="hidden" id="idcomprobante" name="idcomprobante">
                                    <input type="hidden" id="iva">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Serie:</label>
                                    <input type="text" class="form-control" id="serie" name="serie" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Numero:</label>
                                    <input type="text" class="form-control" id="numero" name="numero" readonly>
                                </div>
                            </div> 
                             <div class="form-group">
                                <div class="col-md-4">
                                   <label for=""> IMEI Software:</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control"  id="codigo" name="imei_software">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary btn-check" type="button" data-toggle="modal" data-target="#modal-default-articulo"><span class="fa fa-eye"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                                <div class="col-md-4">
                                    <label for="">IMEI Impreso:</label>
                                    <input type="number" class="form-control" id="imei_impreso" name="imei_impreso" placeholder="Impreso en el tapa trasera">
                                </div> 
                                <div class="col-md-4 <?php echo !empty(form_error("modelo")==true)? 'has-error':'';?>">
                                    <label for="">Módelo Equipo:</label>
                                    <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo set_value("modelo"); ?>">
                                     <?php echo form_error("modelo","<span class='help-block' style='color:red;'>","</span>"); ?>
                                </div> 
                            </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    <label for="">Cliente:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="idcliente" id="idcliente">
                                        <input type="text" class="form-control" disabled="disabled" id="cliente" name="cliente">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-eye"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div> 
                                    <div class="col-md-6">
                                        <label for="">Carnet de Identidad:</label>
                                        <input type="text" class="form-control" id="numDocumento" name="nrodoc" disabled="disabled" >
                                    </div>
                                </div>
                                    <div class="form-group">
                                       <div class="col-md-6">
                                        <label for="">Número Celular:</label>
                                        <input type="text" class="form-control" id="nrocelular" name="celular" disabled="disabled">
                                    </div> 
                                     <div class="col-md-6">
                                    <label for="">Teléfono Referencia:</label>
                                    <input type="text" class="form-control" id="teleref" name="telefono" disabled="disabled" >
                                         </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label for="">Servicio:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="servicio">
                                                <label class="error" style="color:red; display: none;">No existe este servicio</label>
                                                <span class="input-group-btn">
                                                <button id="btn-agregar-servicio" type="button" class="btn btn-primary"><span class="fa fa-plus"></span> Agregar</button></span>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        <p><b>Descripción Equipo a dejar:</b></p>
                                        <textarea name="descripcion" rows="2" cols="70" autofocus>
                                            
                                        </textarea>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="">Técnico Asignado: </label>
                                    <select name="tecnicoAsignado"  class="form-control">
                                    <option value="0">Seleccione</option>
                                    <?php foreach ($tecnicos as $tecnico):?>
                                    <option value="<?php echo $tecnico->idUsuario;?>"><?php echo $tecnico->nombreUsuario; ?></option>
                                    <?php endforeach; ?>
                                    </select> 
                                </div> 
                                <div class="col-md-4">
                                    <label for="">Fecha Recepción:</label>
                                    <input type="date" class="form-control" id="serie" name="fecha_recepcion" value="<?php echo date("Y-m-d");?>" disabled>
                                </div> 
                                <div class="col-md-4">
                                    <label for="">Fecha Entrega:</label>
                                    <input type="date" class="form-control" id="serie" name="fecha_entrega">
                                </div> 
                            </div>
                           
                            <table id="tbordenes" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Detalle Servicio</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Importe</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                </div>
                            <div class="form-group">
                                <div class="col-md-offset-9">
                                    <div class="input-group">
                                        <span class="input-group-addon">Subtotal:</span>
                                        <input type="text" class="form-control" placeholder="Subtotal" name="subtotal" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-offset-9">
                                    <div class="input-group">
                                        <span class="input-group-addon">A Cuenta:</span>
                                        <input type="number" class="form-control" placeholder="0.00" id="cuenta"   name="cuenta" value="0.00">
                                    </div>
                                </div>
                                <div class="col-md-offset-9">
                                    <div class="input-group">
                                        <span class="input-group-addon">Desc:</span>
                                        <input type="text" class="form-control" id="desc" placeholder="0.00" name="descuento"  >
                                    </div>
                                </div>
                                <div class="col-md-offset-9">
                                    <div class="input-group">
                                        <span class="input-group-addon">Total:</span>
                                        <input type="text" class="form-control" placeholder="Total" name="total" readonly="readonly">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                    <a class="btn btn-primary" href="<?php echo base_url();?>movimientos/ordenservicio"> Cancelar </a>
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
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"> Agregar</button>
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
                                            <?php $datacliente = $cliente->idCliente."*".$cliente->nombrecompleto."*".$cliente->numDocumento."*".$cliente->nroCelular."*".$cliente->telefonoReferencia;?>
                                            <td>
                                               <button type="button" class="btn btn-success btn-check" value="<?php echo $datacliente;?>"><span class="fa fa-check"></span></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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

<div class="modal fade" id="modal-default-articulo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de Equipos Vendidos</h4>
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal"> Agregar</button>
            </div>
            <div class="modal-body">
                <table id="example2" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>IMEI</th>
                            <th>Módelo</th>
                            <th>Cliente</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php $indice=1; ?>
                                <?php if(!empty($vendidos)) :?>
                                    <?php foreach ($vendidos as $vendido):?>
                                        <tr>
                                            <td>
                                                <?php echo $indice;
                                                $indice += 1;?>
                                            </td>
                                            <td><?php echo $vendido->codigo;?></td>
                                            <td><?php echo $vendido->modelo;?></td>
                                            <td><?php echo $vendido->nombrecompleto ?></td>
                                            <?php $datavendido = $vendido->codigo."*".$vendido->modelo."*".$vendido->idCliente."*".$vendido->nombrecompleto."*".$vendido->nroCelular."*".$vendido->telefonoReferencia."*".$vendido->numDocumento;?>
                                            <td>
                                               <button type="button" class="btn btn-success btn-check-modelo" value="<?php echo $datavendido;?>"><span class="fa fa-check"></span></button>
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
