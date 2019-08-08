<div class="content-wrapper">	
	 <section class="content-header">
        <h1>
        Carrito de compras
        <small>Pedido</small>
        </h1>
    </section>
    <section class="content">
		<table class="table table-bordered btn-hover" id="example1">
		<thead>
			<tr>
				<th width="10%"></th>
				<th width="30%">Product</th>
				<th width="15%">Price</th>
				<th width="13%">Quantity</th>
				<th width="20%">Subtotal</th>
				<th width="12%"></th>
			</tr>
		</thead>
		<tbody>
			<?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){	?>
			<tr>
				<td><?php echo $item["modelo"]; ?></td>
				<td><?php echo '$'.$item["precio"].' Bs'; ?></td>
				<td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
				<td><?php echo '$'.$item["subTotal"].' USD'; ?></td>
				<td>
					<a href="#" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
			<?php } }else{ ?>
			<tr><td colspan="6"><p>Your cart is empty.....</p></td></tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<td><a href="#" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
				<td colspan="3"></td>
				<?php if($this->cart->total_items() > 0){ ?>
				<td class="text-left">Grand Total: <b><?php echo '$'.$this->cart->total().' Bs'; ?></b></td>
				<td><a href="#" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
				<?php } ?>
			</tr>
		</tfoot>
		</table>
</section>
</div>