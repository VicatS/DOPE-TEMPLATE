<ul class="galeria">
	<?php foreach ($accesorios as $accesorio): ?>
		<li><a href="#img1"><img src="<?php echo base_url();?><?php echo $accesorio->imagen;?>"></a></li>
		<?php endforeach ?>
	</ul>

	<div class="modal" id="img1">
		<h3>Paisaje 2</h3>
		<div class="imagen">
			<a href="#img4">&#60;</a>
			<a href="#img2"><img src="<?php echo base_url();?><?php echo $accesorio->imagen;?>"></a>
			<a href="#img2"></a>
			<a class="cerrar" href="">X</a>
		</div>
	</div>
	<div class="modal" id="img2">
		<h3>Paisaje 2</h3>
		<div class="imagen">
			<a href="#img1">&#60;</a>
			<a href="#img3"><img src="<?php echo base_url();?><?php echo $accesorio->imagen;?>"></a>
			<a href="#img3">></a>
		</div>
		<a class="cerrar" href="">X</a>
	</div>
<div class="row">
	<div class="col-xs-12">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Color</th>
					<th>Precio</th>
					<th>Cantidad</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($accesorios as $accesorio): ?>
				<tr>
					<td><input type="color" value="<?php echo $accesorio->codigoHexadecimal;?>" disabled></td>
					<td><?php echo $accesorio->precio ?></td>
					<td><?php echo $accesorio->stock ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>