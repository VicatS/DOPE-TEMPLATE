<div class="content-wrapper">
<div style="width:650px; margin:auto" id="imprimirOrden">

<body>
<section class="content" style="background-image: url(imagenes/fondo.jpg)">
<div class="row">
	<div class="col-xs-6">
		
		 <img src="<?php echo base_url();?>imagenes/logoOrden.jpg"  class="logo">  
	</div>
	<div class="col-xs-6" align="right">
		<b>No Nota: </b> <?php echo $orden->nroOrdenServicio; ?><br>
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
		<b>Cliente:</b> <?php echo strtoupper($orden->nombrecompleto); ?><br>
		<b>Fecha Recepción:</b> <?php echo $orden->formatted_date; ?><br>
		<b>Equipo recepcionado :</b> <?php echo strtoupper($orden->modeloEquipo); ?>
	</div>	
	<div class="col-xs-6" align="right">
		<b>NIT/CI:</b> <?php echo $orden->NUMDOC; ?><br>
	</div>
	<div class="col-xs-6" align="right">	
		<b>Fecha Entrega:</b> <?php echo $orden->fecha_entrega; ?><br>
		<b>Imei Software:</b> <?php echo $orden->imeiSoftware; ?><br>
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
					<td><?php echo strtoupper($detalle->nombreServicio); ?></td>
					<td><?php echo $detalle->precio; ?></td>
					<td><?php echo $detalle->cantidad ; ?></td>
					<td><?php echo $detalle->importe ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $orden->total; ?></td>
				</tr>
				<tr>
					<td colspan="3" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo $orden->descuento; ?></td>
				</tr>
				<tr>
					<td colspan="3" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $orden->total ?></td>
				</tr>
			</tfoot>
		</table><br>
		</div>
		<b>Observaciones :</b> <?php echo strtoupper($orden->descripcion); ?><br>
		<b>Usuario :</b> <?php echo $orden->nombreUsuario; ?>
		
</div>
</section>
</body>
</div>

<div class="form-group">
 		<a href="<?=base_url();?>movimientos/ordenservicio" class="btn btn-danger btn-flat">Cerrar</a>
        <button type="button" class="btn btn-primary btn-print-orden"><span class="fa fa-print"></span> Imprimir</button>	
</div>
 
</div>