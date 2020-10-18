<?php
	session_start();
	if(isset($_GET['bikeBrand']))
	$bikeBrand=$_GET['bikeBrand'];
	//else
		//$bikeBrand=1;


	$procuct_ids = array();

	//if(isset($_POST['addToCart']))
	//{
		//include 'addToCart.php';

	//}
	if(isset($_POST['Details']))
	{
		header("Location: bikeDetails.php?bikeId=".$_POST['id']);
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <?php include 'link.php'?>;	
	    <link rel="stylesheet" href="style2.css">
	    
		 
	</head>

	<body style=" padding-bottom: 300px;">


		<?php include 'navbar.php'?>;




		<div class="container" id="main" style="margin-top: 100px ; min-height: 100%">
			
			<?php
			

				include "connect.php";
				
				if($bikeBrand=='*')
					$querry = 'select * from bikes where count <> 0 and available=1 and bikeBrand in (select distinct brandName from brand)';
				else if($bikeBrand=='search')
						
					$querry = 'select * from bikes where (bikeName like '.'\'%'.$_POST['findBike'].'%\' or bikeBrand like '.'\'%'.$_POST['findBike'].'%\') and count <> 0 and available=1';

				else 
				{
					
					$querry = "select * from bikes where bikeBrand ='".$bikeBrand."' and count <> 0 and available=1";

				}
					
				$result = mysqli_query($connect,$querry);
				include "disconnect.php";
				if($result):
					if(mysqli_num_rows($result)>0):
						while($bike = mysqli_fetch_assoc($result)):
						?>
				
						<div class="col-sm-4 col-md-4" style="float: left;">

							<form method="post" action="">
								<div class="bikes" style="height: 400px;box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0);">
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

									<h4 class="" style="margin-top: 10px; color: #080832;"><?php echo $bike['bikeName'];?></h4></a>



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

			<?php
			if(mysqli_num_rows($result)==0)
			{
				echo "<script> alert('No bikes found!');window.location='home.php'</script> ";
			}
			?>


		</div>





		<?php include 'footer.php'?>


	</body>
</html>