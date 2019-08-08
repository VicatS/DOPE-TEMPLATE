<div class="content-wrapper">
	 <section class="content-header">
        <h1>
        Reservas
        <small>Detalle</small>
        </h1>
    </section>
<div style="width:650px; margin:auto" id="imprimirOrden">

<section class="content" style="background-image: url(imagenes/fondo.jpg)">
	<div class="box-body">

<div class="row">
	<div class="col-xs-6">
		
		 <img src="<?php echo base_url();?>imagenes/logoOrden.jpg"  class="logo">  
	</div>
	<div class="col-xs-6" align="right">
		<b>No Nota: </b> <?php echo $pedido->numDocumento; ?><br>
		<b><h5>Uni Cell Bolivia Servicio Técnico</h5></b>
		<b><h5>Calle: Bolívar # 484</h5></b>
	</div>
	<div class="col-xs-12 text-center" align="center">             
		<b>Comprobante Orden de servicio </b><br>
		<b>(No Válido como factura) </b>
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>Cliente:</b> <?php echo strtoupper($pedido->nombrecompleto); ?><br>
		<b>Fecha Recepción:</b> <?php echo $pedido->formatted_date; ?><br>
	</div>	
</div>
<br>
<div class="row">
	<div class="box-body">
		<table  class="table table-bordered btn-hover">
			<thead>
				<tr>
					<th>Servicio a realizar</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detalles as $detalle): ?>
				<tr>
					<td><?php echo strtoupper($detalle->detalleaccesorio); ?></td>
					<td><?php echo $detalle->precio ?></td>
					<td><?php echo $detalle->cantidad ; ?></td>
					<td><?php echo $detalle->subTotal ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $pedido->total; ?></td>
				</tr>
				<tr>
					<td colspan="3" class="text-right"><strong>Descuento:</strong></td>
					<td>0.00</td>
				</tr>
				<tr>
					<td colspan="3" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $pedido->total ?></td>
				</tr>
			</tfoot>
		</table><br>
		</div>
		
</div>
</div>
</section>
</div>

<div class="form-group" align="center">
 		<a href="<?=base_url();?>movimientos/pedidos" class="btn btn-danger btn-flat">Cerrar</a>
        <button type="button" class="btn btn-primary btn-print-orden"><span class="fa fa-print"></span> Imprimir</button>	
</div>
 
</div>