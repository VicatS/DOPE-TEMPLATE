
<div class="row">
	<div class="col-xs-6">
		<b><h5 align="left">No Nota: <?php echo $venta->numDocumento; ?></h5></b>
		   
	</div>
	<div class="col-xs-6">
		<b><h5 align="right">Uni Cell Bolivia Servicio Técnico</h5></b>
		<b><h5 align="right">Calle: Bolívar # 545</h5></b>
	</div>
	<div class="col-xs-12 text-center">             
		<b>Nota de Venta </b><br>
		<b>(No Válido como factura) </b>
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>Cliente:</b> <?php echo strtoupper($venta->nombrecompleto); ?><br>
		<b>NIT/CI:</b> <?php echo $venta->NUMDOC; ?><br>
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
					<th>Descripción Artículo</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detalles as $detalle): ?>
				<tr>
					<td><?php echo strtoupper($detalle->codigo); ?></td>
					<td><?php echo strtoupper($detalle->modelo).' '.$detalle->nombreCategoria;?></td>
					<td><?php echo $detalle->precio; ?></td>
					<td><?php echo $detalle->cantidad; ?></td>
					<td><?php echo $detalle->importe ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $venta->subtotal; ?></td>
				</tr>
				<!--<tr>
					<td colspan="4" class="text-right"><strong>IVA:</strong></td>
					<td><?php echo $venta->iva; ?></td>
				</tr>-->
				<tr>
					<td colspan="4" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo $venta->descuento; ?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $venta->total ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>