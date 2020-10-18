<?php 
	
	if($_SESSION['login']==1)
	{
		$id=$_SESSION['user']['id'];
		$userName=$_SESSION['user']['name'];
	}
?>
<nav class=" navbar navbar-expand-lg bg-dark navbar-dark fixed-top" >
				<div class = "container-fluid">
					<a href="home.php" class="navbar-brand text-warning font-weight-bold"><i class="fa fa-motorcycle" aria-hidden="true" style="margin-right: 5px; color: white;"></i>BUYBIKE.COM</a>
					
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar"> 
						<span class="navbar-toggler-icon">
							 
						</span>
					</button>
					<div class="collapse navbar-collapse text-center" id="collapsenavbar">
						<ul class="navbar-nav ml-auto text-white">
							<li class="nav-item"> 
								<a href="home.php" class="nav-link text-white"> HOME </a>
							</li>

							<li class="nav-item dropdown">
						        <a class="nav-link dropdown-toggle text-white"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          BRANDS
						        </a>
						        <div class="dropdown-menu  text-center"style="background-color: rgb(224,224,224); aria-labelledby=navbarDropdown">

						        	<a class="dropdown-item text-black" href="allBikes.php?bikeBrand=*">ALL BIKES</a>

							    <?php
								include "connect.php";
								$querry = 'select distinct brandName from brand order by brandName';
								$result = mysqli_query($connect,$querry);
								include "disconnect.php";
								if($result):
									if(mysqli_num_rows($result)>0):
										while($bike = mysqli_fetch_assoc($result)):
										?>

								
										<a class="dropdown-item text-black" href="allBikes.php?bikeBrand=<?php echo $bike['brandName']; ?>"><?php echo $bike['brandName']; ?></a>
								

										<?php
										endwhile;
									endif;
								endif;
							?>










						        </div>
						    </li>
							<li class="nav-item"> 
								<a href="aboutus.php" class="nav-link text-white"> ABOUT</a>
							</li>
							<li class="nav-item"> 
								<a href="contactUs.php" class="nav-link text-white"> CONTACT</a>
							</li>

						</ul>

						<form  class="form-inline my-2 my-lg-0" method="post" action="allBikes.php?bikeBrand=search">
					      <input class="form-control mr-sm-2"  type="search" name="findBike" placeholder="Find bikes here" aria-label="Search">
					      <button class="btn btn-success my-2 my-sm-1" name="findButton" type="submit">Find  <i class="fa fa-search" aria-hidden="true"></i></button>
    					</form>
    					
    					<?php if($_SESSION['login']==0): ?>

    					<form class="form-inline my-2 my-lg-0" action="signin.php">
    						<button class="btn btn-warning my-2 my-sm-0" style="padding: 5px; margin-left: 10px; color: black; font-weight: bold;" name="signin" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i>  SIGN IN</button>
    					</form>


    					
    					<?php endif ?>
    					<?php if($_SESSION['login']==1): ?>


    						<form class="form-inline my-2 my-lg-0" action="account.php">
    								<button class="btn btn-warning my-2 my-sm-0" style="padding: 5px; margin-left: 10px;" name="signin" type="submit"><i class="fa fa-user-circle-o" aria-hidden="true"></i>  <?php echo $userName ?></button>


    						</form>
							<form class="form-inline my-2 my-lg-0" action="cart.php">
    								<button class="btn btn-primary my-2 my-sm-0" style="padding: 5px; margin-left: 10px;" name="signout" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  CART</button>
    						</form>

    						<form class="form-inline my-2 my-lg-0" action="signout.php">
    								<button class="btn btn-danger my-2 my-sm-0" style="padding: 5px; margin-left: 10px;" name="signout" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i>  SIGN OUT</button>
    						</form>


    					<?php endif ?>

					</div>
				</div>

</nav>