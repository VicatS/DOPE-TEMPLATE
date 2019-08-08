<div class="content-wrapper">
	<div style="width:260px; margin:auto"" id="imprimirOrden">
				<img align ="center" src="<?php echo base_url("imagenes/logoOrdenes.jpg");?>" alt="" width="260" height="50">
			-----------------------------------------------------
			<h6 align="center">Calle: Bolivar # 484 - Local Urkupiña P.B.</h6>
			<h6 align="center">Cel: 73439200 - weimarwcs@gmail.com</h6>
			-----------------------------------------------------
			<h6 align="center"><b>FECHA RECEPCION: </b><?php echo $orden->formatted_date; ?></h6>
			-----------------------------------------------------
			<h6 align="center"><b>ORDEN: </b><?php echo $orden->nroOrdenServicio; ?></h6>
			-----------------------------------------------------
			<h6 align="center"><b>CLIENTE: </b><?php echo $orden->nombrecompleto; ?></h6>
			<h6 align="center"><b>CARNET DE IDENTIDAD: </b><?php echo $orden->NUMDOC; ?></h6>
			<h6 align="center"><b>Técnico responsable: </b><?php echo strtoupper($orden->nombreUsuario); ?></h6>
			-----------------------------------------------------
			<h6 align="center">ESTADO  <b><?php echo strtoupper($orden->nombreEstado); ?> </b></h6>
			-----------------------------------------------------
			<h5 align="center"><b>DATOS DEL EQUIPO</b></h5>
			<h6 align="center"><b>Serial: </b><?php echo $orden->imeiSoftware; ?></h6>
			<h6 align="center"><b>Modelo: </b><?php echo $orden->modeloEquipo; ?></h6>
			-----------------------------------------------------
			<h5 align="center"><b>REPORTE DEL TECNICO</b></h5>
			<table class="table table-bordered btn-hover">
				<thead>
					<tr>
						<th>Servicio a realizar</th>
						<th>Precio</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($detalles as $detalle): ?>
					<tr>
						<td><?php echo $detalle->nombreServicio; ?></td>
						<td><?php echo $detalle->precio; ?></td>
					</tr>
					<?php endforeach ?>
					<tr>
						<td align="right"><b>A CUENTA</b></td>
						<td align="right"><?php echo $orden->aCuenta.' Bs.'; ?></td>
					</tr>
					<tr>
						<td align="right"><b>TOTAL/SALDO</b></td>
						<td align="right"><?php echo $orden->total.' Bs.'; ?></td>
					</tr>
				</tbody>
			</table>
			-----------------------------------------------------
			<h6>Tiempo estimado de reparación: <b><?php echo $orden->dias.' día(s)'; ?></b></h6>
			-----------------------------------------------------
			<h6 align="center"><b>GRACIAS POR SU PREFERENCIA !!</b></h6>
	</div>
</div>
<div class="form-group" align="center">
	<a href="<?=base_url();?>movimientos/ordenservicio" class="btn btn-danger btn-flat">Cerrar</a>
    <button type="button" class="btn btn-primary btn-print-orden"><span class="fa fa-print"></span> Imprimir</button>	
</div>