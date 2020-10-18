<?php
	session_start();

	$userId=$_SESSION['user']['id'];
	$id=$_SESSION['user']['id'];
	$errors=array();

	$total=0;
	$totalItems=0;
			if(!empty($_SESSION['shopping_cart'][$id]))
			{
				foreach ($_SESSION['shopping_cart'][$id] as $key => $product)	
				{	
					$totalItems=$totalItems+$product['quantity'];

					$total=$total+($product['quantity']*$product['price']);
				}
			}

	$address=$_SESSION['user']['address'];
	$phone1=$_SESSION['user']['phone'];
	$phone2='';

	if(isset($_POST['placeOrder']))
	{

		$address=$_POST['address'];
		$phone1=$_POST['phone'];
		$phone2=$_POST['Ephone'];


		if(empty($address))
		{
			array_push($errors, "Address is required!");
			$address=$_SESSION['user']['address'];

		}
		if(empty($phone1))
		{
			array_push($errors, "Phone number is required!");
			$phone1=$_SESSION['user']['phone'];
		}

		if(count($errors)==0)
		{


			$count=0;
			date_default_timezone_set('Asia/Dhaka');
			$date=date("Y-m-d h:i:sa");	
			include "connect.php";	

			$query="insert into ordertable(userId,dateOfOrder,totalItem,subTotal,phone,emergencyPhone,address) values ('$userId','$date','$totalItems','$total','$phone1','$phone2','$address')";
			mysqli_query($connect,$query);

			$querry = 'select * from ordertable';
			$result = mysqli_query($connect,$querry);

			include "disconnect.php";
			if($result)
			{
				if(mysqli_num_rows($result)>0)
				{
					while ($order = mysqli_fetch_assoc($result))
					{
						$orderId=$order['orderId'];
					}
					
				}
			}


			if(!empty($_SESSION['shopping_cart'][$id]))
			{
					foreach ($_SESSION['shopping_cart'][$id] as $key => $product)
					{

						$bprice=$product['price'];
						$bquantity=$product['quantity'];
						$bid=$product['id'];

						include "connect.php";
						$query1="insert into orderdetails(orderId,bikeId,quantity,price) values('$orderId','$bid','$bquantity','$bprice')";

						mysqli_query($connect,$query1);

						unset($_SESSION['shopping_cart'][$id][$key]);
						unset($_SESSION['bikeCount'][$product['id']]);

						$query2="UPDATE bikes Set count=count-'$bquantity' WHERE bikeId='$bid'";
						mysqli_query($connect,$query2);
						include "disconnect.php";
						//header("Location: home.php?ordrid=$orderId");		
					}
				
			}
			echo "<script> alert('Order successfully placed!');window.location='orders.php'</script> ";
			//header("Location: home.php");
		}

	}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <?php include 'link.php'?>;	
	    <link rel="stylesheet" href="checkOut.css">
	    
	</head>

	<body>

	<?php include 'navbar.php' ?>


	<div class="container" id="contactForm" style="margin-top: 150px;">


		  <form action="" method="post" >

		    <label style="margin:30px; font-weight: bold;">Total Bikes :</label>
		    <label style="margin:30px; " ><?php echo $totalItems ?></label>

		    <br>
		    
		    <label style="margin:30px; font-weight: bold;">Sub Total  :</label>
		    <label style="margin:30px 30px 30px 40px;"><?php echo $total ?></label>
		    <br>

		  </form>
	</div>


	<div class="container" id="contactForm">

			<?php if(count($errors)>0 && isset($_POST['placeOrder'])): ?>
				<div class="error ">
					<?php foreach ($errors as $error): ?>
						<p style="color: red;"><?php echo $error;?></p>
						
					<?php endforeach?>
				</div>
			<?php endif?>	

		  <form action="" method="post" >

		    

		    <label for="phone">Phone number</label>
		    	<input type="text" id="phone" name="phone" placeholder="Phone number to contact" value="<?php echo $phone1 ?>">

		    <label for="Ephone">Emergency Contact</label>
		    	<input type="text" id="Ephone" name="Ephone" placeholder="Emergency contact(optional)">	


		    <label for="address">Delivery Address</label>
		    	<input type="text" id="address" name="address" value="<?php echo $address ?>" placeholder="Where to deliver?">

		   		 <input type="submit" value="Place Order" name="placeOrder" style="margin-top: 20px;">
		  </form>
		</div>


	</body>
</html>