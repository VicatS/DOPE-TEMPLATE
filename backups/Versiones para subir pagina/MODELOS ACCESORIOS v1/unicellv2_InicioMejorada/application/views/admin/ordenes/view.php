
<div class="row">
	<div class="col-xs-6">
		<b><h5 align="left">No Nota: <?php echo $orden->numDocumento; ?></h5></b>
		   
	</div>
	<div class="col-xs-6">
		<b><h5 align="right">Uni Cell Bolivia Servicio Técnico</h5></b>
		<b><h5 align="right">Calle: Bolívar # 484</h5></b>
	</div>
	<div class="col-xs-12 text-center">             
		<b>Nota de Venta </b><br>
		<b>(No Válido como factura) </b>
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>Cliente:</b> <?php echo $orden->RAZON; ?><br>
		<b>NIT/CI:</b> <?php echo $orden->NUMDOC; ?><br>orden
	</div>	
	<div class="col-xs-6">
		<b><h5 align="right"><b>Fecha:</b> <?php echo $venta->formatted_date; ?></h5></b>
	</div>
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detalles as $detalle): ?>
				<tr>
					<td><?php echo $detalle->codigo; ?></td>
					<td><?php echo $detalle->modelo; ?></td>
					<td><?php echo $detalle->precio; ?></td>
					<td><?php echo $detalle->cantidad; ?></td>
					<td><?php echo $detalle->importe ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $orden->subtotal; ?></td>
				</tr>
				<!--<tr>
					<td colspan="4" class="text-right"><strong>IVA:</strong></td>
					<td><?php echo $venta->iva; ?></td>
				</tr>-->
				<tr>
					<td colspan="4" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo $orden->descuento; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $orden->total ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>