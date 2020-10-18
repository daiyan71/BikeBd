<?php
	session_start();

	$userId=$_SESSION['user']['id'];

	$id=$_SESSION['user']['id'];



	if(isset($_GET['action']) && $_GET['action']=='delete'){
		foreach ($_SESSION['shopping_cart'][$id] as $key => $product) {
			if($product['id']==$_GET['id']){
				unset($_SESSION['shopping_cart'][$id][$key]);
				unset($_SESSION['bikeCount'][$product['id']]);
			}
		}
		$_SESSION['shopping_cart'][$id]=array_values($_SESSION['shopping_cart'][$id]);
	}

	if(isset($_POST['checkout']))
	{
		header("Location: checkOut.php?");
	}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <?php include 'link.php'?>
	    <link rel="stylesheet" href="cart.css">
	    
		 
	</head>

	<body>


	<?php include 'navbar.php' ?>

	<form action="Orders.php" method="get">
    			<button class="btn btn-success my-2 my-sm-0" style="margin: 0;position: absolute;top: 20%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);padding: 5px; margin-left: 10px;" name="signout" type="submit" value="true"><i class="fa fa-list-alt" aria-hidden="true"></i>  Previous Orders</button>
    			</form>
    		</div>


	<div class="container" style="margin-top: 250px;">
	<div class="table-responsive">
		<table class="table">
			<tr><th colspan="6"><h3 class="text-center">Order Details</h3></th></tr>
			<tr>
				<th width="15%">Bike Brand</th>
				<th width="25%">Bike Name</th>
				<th width="15%">Price</th>
				<th width="10%">Quantity</th>
				<th width="10%">Total</th>
				<th width="10%">Remove</th>
			</tr>
			<?php
			if(!empty($_SESSION['shopping_cart'][$id])):
				$total=0;
				foreach ($_SESSION['shopping_cart'][$id] as $key => $product):			
			?>
			<tr>
				<td><?php echo $product['brand'];?></td>
				<td><?php echo $product['name'];?></td>
				<td><?php echo $product['price'];?></td>
				<td><?php echo $product['quantity'] ?></td>
				<td><?php echo number_format($product['quantity']*$product['price'],2);?></td>
				<td>
					<a href="cart.php?action=delete&id=<?php echo $product['id'];?>">
						<div class="btn-danger">Remove</div>
					</a>
				</td>

			</tr>

			<?php
				$total=$total+($product['quantity']*$product['price']);
				
			endforeach;
			?>
			<tr>
				<td colspan="4" align="right">Total</td>
				<td align="right">$<?php echo number_format($total,2);?></td>
			</tr>

			<tr>
				<td colspan="6">
					<?php
						if(isset($_SESSION['shopping_cart'][$id])):
							if(count($_SESSION['shopping_cart'][$id])>0):
					?>
					<form method="post">
					 	<input type="submit" value="Checkout" name="checkout" style="margin-top: 20px;">
					</form>
				<?php endif; endif;?>
					
				</td>
			</tr>
			<?php
		endif;
		?>
		</table>	

		
	</div>
</div>

	</body>
</html>