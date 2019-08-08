
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
					<td><input type="color" value="<?php echo $accesorio->color;?>" disabled></td>
					<td><?php echo $accesorio->precio ?></td>
					<td><?php echo $accesorio->stock ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>