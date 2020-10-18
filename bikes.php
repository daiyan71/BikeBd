
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <title>BuyBike.com</title>
	    <link rel="stylesheet" href="style2.css">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		 
	</head>

	<body>
		

		<nav class=" navbar navbar-expand-md bg-dark navbar-dark fixed-top" >
				<div class = "container">
					<a href="" class="navbar-brand text-warning font-weight-bold">BUYBIKE.COM</a>
					
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar"> 
						<span class="navbar-toggler-icon">
							 
						</span>
					</button>
					<div class="collapse navbar-collapse text-center" id="collapsenavbar">
						<ul class="navbar-nav ml-auto text-white">
							<li class="nav-item active"> 
								<a href="home.php" class="nav-link text-white"> HOME </a>
							</li>

							<li class="nav-item dropdown">
						        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          BRANDS
						        </a>
						        <div class="dropdown-menu bg-dark text-center" aria-labelledby="navbarDropdown">
						          <a class="dropdown-item text-white" href="localhost/project/bikes.php">ALL BIKES</a>
						          <a class="dropdown-item text-white" href="#">BAJAJ</a>
						          <a class="dropdown-item text-white" href="#">HERO</a>
							      <a class="dropdown-item text-white" href="#">HONDA</a>
							      <a class="dropdown-item text-white" href="#">TVS</a>
							      <a class="dropdown-item text-white" href="#">YAMAHA</a>
						        </div>
						    </li>

							<li class="nav-item"> 
								<a href="" class="nav-link text-white"> SHOWROOMS</a>
							</li>
							<li class="nav-item"> 
								<a href="" class="nav-link text-white"> ABOUT</a>
							</li>
							<li class="nav-item"> 
								<a href="" class="nav-link text-white"> CONTACT</a>
							</li>

						</ul>

						<form class="form-inline my-2 my-lg-0">
					      <input class="form-control mr-sm-2" type="search" placeholder="Find bikes here" aria-label="Search">
					      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Find</button>
    					</form>


					</div>
				</div>

			
			</nav>



			<div class="featureTxt text-center" style="margin-top: 100px " >
				<h1>Featured Bikes</h1>				
		</div>

		<div class="container">
			
			<?php
				$connect = mysqli_connect('localhost','root','','bikes') or die("unable to coonect"); 
				$querry = 'select * from bikes';
				$result = mysqli_query($connect,$querry);
				if($result):
					if(mysqli_num_rows($result)>0):
						while($bike = mysqli_fetch_assoc($result)):
						?>
				
						<div class="col-sm-4 col-md-4" style="float: left;">

							<form method="post" action="home.php?=add&id=<?php echo $bike['bikeId'];?>">
								<div class="bikes" style="height: 420px;box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0);">
									<img src="<?php echo "img/".$bike['bikeImage'];?>" class="img-responsive" style="height: 220px;"/> 
									<h4 class="text-info"><?php echo $bike['bikeName'];?></h4>
									<h4 class="text-info">$<?php echo $bike['bikePrice'];?></h4>

									<input type="text" name="quantity" class="form-control" value="1"/>

									<input type="hidden" name="name" value="<?php echo $bike['bikeName'];?>"/>
									<input type="hidden" name="price" value="<?php echo $bike['bikePrie'];?>"/>
									<input type="submit" name="add_to_cart" style="margin-top: 10px; " class="btn btn-info" value="add to cart"/>
								</div>
							</form>
						</div>
				

						<?php
						endwhile;
					endif;
				endif;
			?>


		</div>












		<script
	    src="https://code.jquery.com/jquery-3.3.1.min.js"
	    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	    crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		
	</body>
</html>