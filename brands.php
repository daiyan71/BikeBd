
<div class="container" style="margin-bottom: 200px; clear: left;">

	<div class="featureTxt text-center" style="padding-top: 80px ; padding-bottom: 0px; clear: left;" >
				<h1 style="font-family: monospace; font-weight: bold; font-size: 50px;">All Brands</h1>
				<hr>				
	</div>

	<?php
		include "connect.php";
		$querry = 'select distinct brandName,brandImage from brand';
		$result = mysqli_query($connect,$querry);
		include "disconnect.php";
		if($result):
			if(mysqli_num_rows($result)>0):
				while($bike = mysqli_fetch_assoc($result)):
					?>
				
			<div class="col-sm-4 col-md-4" style="float: left; padding-bottom: 50px; ">


				<form method="" action="">
					<div class="bikes" style="height: 300px;box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0); color: #080832;">

						<a href="allBikes.php?bikeBrand=<?php echo $bike['brandName']; ?>"><img src="img/<?php echo $bike['brandImage']; ?>" class="img-responsive" style="height: 220px;"/> </a>
						<a href="allBikes.php?bikeBrand=<?php echo $bike['brandName']; ?>"><h3 class="text-center" style="margin-top: 10px;  color: #080832; "><?php echo $bike['brandName']; ?></h3></a>
		
					</div>
				</form>


			</div>

			<?php
				endwhile;
			endif;
		endif;
	?>


</div>
