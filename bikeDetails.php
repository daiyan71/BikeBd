<?php
	session_start();
	if(isset($_SESSION['user']['id']))
	$id=$_SESSION['user']['id'];

	$bikeId=$_GET['bikeId'];

	if(!isset($_SESSION['bikeCount'][$bikeId]) || $_SESSION['bikeCount'][$bikeId]==0)
	{
		include "connect.php";
		$querry = 'select * from bikes where bikeId='.$bikeId;
		$result = mysqli_query($connect,$querry);
		include "disconnect.php";
		if($result)
			if(mysqli_num_rows($result)>0)
				$bike = mysqli_fetch_assoc($result);

		$_SESSION['bikeCount'][$bikeId]=$bike['count'];
	}

	$procuct_ids = array();
	

	if(isset($_POST['addToCart']))
	{
		if($_SESSION['login']==1){
			include "connect.php";
			$querry = 'select * from bikes where bikeId='.$bikeId;
			$result = mysqli_query($connect,$querry);
			include "disconnect.php";
			if($result)
				if(mysqli_num_rows($result)>0)
					$bike = mysqli_fetch_assoc($result);


			$bikeBrand=$bike['bikeBrand'];
			$bikeName=$bike['bikeName'];
			$bikePrice=$bike['bikePrice'];
			$bikequantity=$bike['count'];

			//new
				if($bikequantity>=$_POST['quantity'])
				{


					if(isset($_SESSION['shopping_cart'][$id])){
						$count=count($_SESSION['shopping_cart'][$id]);

						$procuct_ids=array_column($_SESSION['shopping_cart'][$id], 'id');

						if(!in_array($bikeId, $procuct_ids)){
							$_SESSION['shopping_cart'][$id][$count]=array
							(
								'id' => $bikeId,
								'brand' => $bikeBrand,
								'name' => $bikeName,
								'price' => $bikePrice,
								'quantity' => $_POST['quantity']

							);
							//$_SESSION['bikeCount'][$bikeId]-=$_POST['quantity'];
							echo "<script> alert('Successfully added to cart')</script> ";
						}
						else{
							for ($i=0; $i <count($procuct_ids) ; $i++) 
							{ 
								if($procuct_ids[$i]==$bikeId){
									//new
									$try=$_SESSION['shopping_cart'][$id][$i]['quantity']+$_POST['quantity'];
									if($try<=$bikequantity)
									{
										$_SESSION['shopping_cart'][$id][$i]['quantity']+=$_POST['quantity'];
										//$_SESSION['bikeCount'][$bikeId]-=$_POST['quantity'];
										echo "<script> alert('Successfully added to cart')</script> ";
									}
									else
										echo "<script> alert('Your quantity is more than the available quantity!')</script> ";

								}
							}
							
							
							}
						}
						else{

							$_SESSION['shopping_cart'][$id][0]=array
							(
								'id' => $bikeId,
								'brand' => $bikeBrand,
								'name' => $bikeName,
								'price' => $bikePrice,
								'quantity' => $_POST['quantity']
							);
							//$_SESSION['bikeCount'][$bikeId]-=$_POST['quantity'];
							echo "<script> alert('Successfully added to cart');window.location='bikeDetails.php?bikeId=$bikeId'</script> ";
							//header("Location:bikeDetails.php?bikeId=$bikeId");
							}
				}
				else
				{
					echo "<script> alert('Your quantity is more than the available quantity!')</script> ";
				}

	}

	else{

		echo "<script> alert('You need to sign in first!');window.location='signin.php?bikeId=$bikeId'</script> ";
		//header("Location: signin.php");
	}

}


	
	//session_destroy();




?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <?php include 'link.php';?>
	    <link rel="stylesheet" href="styleBikeDetails.css">
	    
		 
	</head>

	<body>

		<?php include 'navbar.php';?>

			<div class="container">

				<div class="row">
					<?php
					
						include "connect.php";
						$querry = 'select * from bikes where bikeId='.$bikeId;
						$result = mysqli_query($connect,$querry);
						include "disconnect.php";
						if($result):
							if(mysqli_num_rows($result)>0):
								while($bike = mysqli_fetch_assoc($result)):
					?>
						<div class="col-sm-6 col-md-6" style="float: left; position: relative; ">

							<form method="post" action="">
								<div class="bikes" style="height: 430px; box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0); margin-top: 200px;">
									<img src="<?php echo "img/".$bike['bikeImage'] ; ?>"/> 
									

								</div>
							</form>
						</div>
						<div class="col-md-1">
							
						</div>

						<div class="col-sm-4 col-md-4" style="float: left;">

							<form method="post">
								<div class="bikes" style="height: 430px;  margin-top: 200px; color: #080832;">
									<h2 class="" style="margin-top: 10px;">Brand: <?php echo $bike['bikeBrand'];?></h2>
									<h3 class="">Model: <?php echo $bike['bikeName'];?></h3>
									<h4 class="">Price: BDT <?php echo $bike['bikePrice'];?></h4>
									<p style="color: green; margin-top: 150px;">

									Available :
									<?php  
									if(isset($id) && isset($_SESSION['shopping_cart'][$id]))
									{
											$c=0;
											foreach ($_SESSION['shopping_cart'][$id] as $key => $product) {
											if($product['id']==$bikeId){
												if(($_SESSION['bikeCount'][$bikeId]-$_SESSION['shopping_cart'][$id][$key]['quantity'])<0)
												{
													
													foreach ($_SESSION['shopping_cart'][$id] as $key => $product) {
														if($product['id']==$bikeId){
															unset($_SESSION['shopping_cart'][$id][$key]);
															unset($_SESSION['bikeCount'][$product['id']]);
														}
													}
													$_SESSION['shopping_cart'][$id]=array_values($_SESSION['shopping_cart'][$id]);
	
												}
												else
												{
													echo $_SESSION['bikeCount'][$bikeId]-$_SESSION['shopping_cart'][$id][$key]['quantity'];
													$c=1;
												}
												
											}	
										}
										if($c==0){
											echo $bike['count'];
										}

									}
									else
									{
										echo $bike['count'];
									} 
									?>
										
									</p>
									<input type="text" name="quantity" class="form-control" value="1" placeholder="Quantity" />

									<input type="hidden" name="brand" value="<?php echo $bike['bikeBrand'];?>"/>
									<input type="hidden" name="name" value="<?php echo $bike['bikeName'];?>"/>
									<input type="hidden" name="price" value="<?php echo $bike['bikePrie'];?>"/>
									 <input type="submit" name="addToCart" class="btn2" value="Add to cart" />
										
								</div>
							</form>
						</div>


					</div>

					<div style="margin-top: 100px;"></div>
					<hr>
					<h1 class="text-center" style="margin-top: 0px;">Bike Details</h1>
					<hr>

					<div class="row">



						<div class="col-md-12" style="float: left; margin-top: 50px">
							<div class="detailsBox" >
								<p style="font-weight: bold; padding: 10px 40px 60px 40px;">
									<?php 
										$string=$bike['bikeDetails'];
										$string = nl2br(str_replace(" ", " &nbsp;", $string));
										echo "$string";
										//echo $bike['bikeDetails'];?>
								</p>
							</div>
					
						</div>
						<?php
						endwhile;
					endif;
				endif;
			?>
				</div>
				
			</div>

			<?php include 'footer.php'?>


		
	</body>
</html>