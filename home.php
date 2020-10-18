<?php

	session_start();
	
	if(!isset($_SESSION['login']))
	{
		$_SESSION['login']=0;
	}

	if(isset($_POST['Details']))
	{
		$bikeId=$_POST['id'];
		$url="bikeDetails.php?bikeId=".$bikeId;
		header("Location: " . $url);
		exit();
	}

	//$procuct_ids = array();

	//if(isset($_POST['addToCart']))
	//{
		//include 'addToCart.php';
	//}


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'link.php'?>   
	    <link rel="stylesheet" href="style2.css">
		 
	</head>

	<body>

		<?php include 'navbar.php'?>

		<div class="mainn">
		
		<div class="bgimg">
			
			<div class="container text-center headerset">
				<h1>BUY BIKE</h1>
				<h3>Buy your dream from here</h3>
				
			</div>
			
		</div>
		

		
		<div class="featureTxt text-center" style="margin-top: 100px ; padding-bottom: 0px; " >
				<h1 style="font-family: monospace; font-weight: bold; font-size: 50px;">Featured Bikes</h1>						
		</div>

		<div class="container">
			<hr>
			<?php
				include "connect.php";
				$querry = 'select * from bikes where featured=true and count <> 0 and available=1 and bikeBrand in (select distinct brandName from brand) order by bikeName';
				$result = mysqli_query($connect,$querry);
				include "disconnect.php";
				if($result):
					if(mysqli_num_rows($result)>0):
						while($bike = mysqli_fetch_assoc($result)):
						?>

				
				
						<div class="col-sm-4 col-md-4" style="float: left;padding-bottom: 50px;">

							<form method="post" action="">
								<div class="bikes" style="height: 400px;box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0); color: #080832;">
									<?php
									$link = 'bikeDetails.php?bikeId='.$bike['bikeId']?>
									<a href=<?php echo $link ?>>
									<img src="<?php echo "img/".$bike['bikeImage'];?>" class="img-responsive" style="height: 220px;"/> </a>
									<?php
									$link = 'allBikes.php?bikeBrand='.$bike['bikeBrand']?>
									<a href=<?php echo $link ?>>
									<h3 class="" style="margin-top: 10px; color: #080832;"><?php echo $bike['bikeBrand'];?></h3></a>
									<?php
									$link = 'bikeDetails.php?bikeId='.$bike['bikeId']?>
									<a href=<?php echo $link ?>>

									<h4 class="" style="margin-top: 10px; color: #080832; "><?php echo $bike['bikeName'];?></h4></a>



									<input type="hidden" name="id" value="<?php echo $bike['bikeId'];?>"/>

									<input type="submit" name="Details" class="btn2" value="Details"/>
									<!-- <input type="submit" name="addToCart" class="btn2" value="Add to cart" /> -->
								</div>
							</form>
						</div>
				

						<?php
						endwhile;
					endif;
				endif;

			?>


		</div>



		<div class="TopRatedTxt text-center" style="padding-top:80px;  padding-bottom: 0px; clear: left;" >
				<h1 style="font-family: monospace; font-weight: bold; font-size: 50px;">Top Rated Bikes</h1>
		</div>

		<div class="container" >
			<hr>

			<?php
				include "connect.php";
				$querry = 'select * from bikes where topRated=true and count <> 0  and available=1 and bikeBrand in (select distinct brandName from brand) order by bikeName';
				$result = mysqli_query($connect,$querry);
				include "disconnect.php";
				if($result):
					if(mysqli_num_rows($result)>0):
						while($bike = mysqli_fetch_assoc($result)):
						?>
				
						<div class="col-sm-4 col-md-4" style="float: left; padding-bottom: 50px;">

							<form method="post" action="">
								<div class="bikes" style="height: 400px; box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0); color: #080832; ">
									<?php
									$link = 'bikeDetails.php?bikeId='.$bike['bikeId']?>
									<a href=<?php echo $link ?>>
									<img src="<?php echo "img/".$bike['bikeImage'];?>" class="img-responsive" style="height: 220px;"/> </a>
									<?php
									$link = 'allBikes.php?bikeBrand='.$bike['bikeBrand']?>
									<a href=<?php echo $link ?>>
									<h3 class="" style="margin-top: 10px; color: #080832; "><?php echo $bike['bikeBrand'];?></h3></a>
									<?php
									$link = 'bikeDetails.php?bikeId='.$bike['bikeId']?>
									<a href=<?php echo $link ?>>

									<h4 class="" style="margin-top: 10px; color: #080832; "><?php echo $bike['bikeName'];?></h4></a>

									<input type="hidden" name="id" value="<?php echo $bike['bikeId'];?>"/>
									<input type="submit" name="Details"  class="btn2" value="Details"/>
									<!-- <input type="submit" name="addToCart" class="btn2" value="Add to cart" /> -->
								</div>
							</form>
						</div>
				

						<?php
						endwhile;
					endif;
				endif;

			?>

		</div>


		
		<?php include'brands.php';?>

	</div>

		<?php include 'footer.php';?>

        

		
	</body>
</html>