<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Shopping Cart Integration in CodeIgniter by CodexWorld</title>
<meta charset="utf-8">

<!-- Include bootstrap library -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<!-- Include custom css -->
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">

<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
/* Update item quantity */
function updateCartItem(obj, rowid){
	$.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
		if(resp == 'ok'){
			location.reload();
		}else{
			alert('Cart update failed, please try again.');
		}
	});
}
</script>
</head>
<body>
<div class="container">
	<h2>Shopping Cart</h2>
    <div class="row cart">
		<table class="table">
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
				<td>
					<?php $imageURL = !empty($item["image"])?base_url('uploads/product_images/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
					<img src="<?php echo $imageURL; ?>" width="50"/>
				</td>
				<td><?php echo $item["name"]; ?></td>
				<td><?php echo '$'.$item["price"].' USD'; ?></td>
				<td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
				<td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
				<td>
					<a href="<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
			<?php } }else{ ?>
			<tr><td colspan="6"><p>Your cart is empty.....</p></td>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<td><a href="<?php echo base_url('products/'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
				<td colspan="3"></td>
				<?php if($this->cart->total_items() > 0){ ?>
				<td class="text-left">Grand Total: <b><?php echo '$'.$this->cart->total().' USD'; ?></b></td>
				<td><a href="<?php echo base_url('checkout/'); ?>" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
				<?php } ?>
			</tr>
		</tfoot>
		</table>
    </div>
</div>
</body>
</html>