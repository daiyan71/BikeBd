<?php
		session_start();
		if(!isset($_SESSION['adminLogin']))
		{
			header("Location: adminLogin.php");
		}

		$brand='';
		$name='';
		$img='';
		$price='';
		$quantity='';
		$ftr='';
		$top='';
		$details='';

		
		$img2='';
		$price2='';
		$quantity2='';
		$ftr2='';
		$top2='';
		$details2='';
		$brandName='';

		$errors=array();
		$errors2=array();
		$errors4=array();
		$errors5;
		$errors3;
		
		$showBike=1;

		if(isset($_POST["addBrand"]))
	{

		$brandName=$_POST['brandName'];

		if(empty($brandName))
		{
			array_push($errors4, "Brand Name is required!");
		}
		$target="img/".basename($_FILES['image3']['name']);
		$image=$_FILES['image3']['name'];

		move_uploaded_file($_FILES['image3']['tmp_name'], $target);

		if(empty($image))
		{
			array_push($errors4, "Image is required!");
		}
		
		if(count($errors4)==0)
		{
				include "connect.php";
				$query="Insert into brand (brandName,brandImage)
				values('$brandName','$image')";
				mysqli_query($connect,$query);
				include "disconnect.php";
				echo "<script> alert('New Brand added successfully!');window.location='admin.php'</script> ";
				//header("Location: home.php");

		}


	}






	if(isset($_POST["add"]))
	{

		$brand=$_POST['brand'];
		$name=$_POST['bikeName'];
		$price=$_POST['bikePrice'];
		$quantity=$_POST['quantity'];
		//$details=$_POST['bikeDetails'];
		$status=$_POST['bikeDetails'];echo '<br/>';
		$details = nl2br(htmlentities($status, ENT_QUOTES, 'UTF-8'));



		if(($brand)=='Select')
		{
			array_push($errors, "Brand is required!");
		}
		if(empty($name))
		{
			array_push($errors, "Bike Name is required!");
		}
		$target="img/".basename($_FILES['image']['name']);
		$image=$_FILES['image']['name'];

		move_uploaded_file($_FILES['image']['tmp_name'], $target);

		if(empty($image))
		{
			array_push($errors, "Image is required!");
		}
		if(isset($_POST['ftr']))
		{
			$ftr=1;
		}
		else
		{
			$ftr=0;
		}
		if(isset($_POST['top']))
		{
			$top=1;
		}
		else{
			$top=0;
		}
		if(empty($price))
		{
			array_push($errors, "Price is required!");
		}
		if(empty($quantity))
		{
			array_push($errors, "quantity is required!");
		}
		if(empty($details))
		{
			array_push($errors, "Details is required!");
		}
		if(count($errors)==0)
		{
				include "connect.php";
				$query="Insert into bikes (bikeName,bikeBrand,bikePrice,bikeDetails,count,featured,topRated,bikeImage)
				values('$name','$brand','$price','$details','$quantity','$ftr','$top','$image')";
				mysqli_query($connect,$query);
				include "disconnect.php";
				echo "<script> alert('New bike added successfully!');window.location='admin.php'</script> ";

				//header("Location: home.php");

		}


	}

	if(isset($_POST['update']))
	{
		if(!empty($_POST['bikeId']))
		{
			$id=$_POST['bikeId'];
			$price2=$_POST['bikePrice2'];
			$quantity2=$_POST['quantity2'];
			//$details2=$_POST['bikeDetails2'];

			$status=$_POST['bikeDetails2'];echo '<br/>';
			$details2 = nl2br(htmlentities($status, ENT_QUOTES, 'UTF-8'));


			include "connect.php";
			$querry = "select * from bikes where bikeId=$id";
			$result = mysqli_query($connect,$querry);
			include "disconnect.php";
			if($result)
			{
				if(mysqli_num_rows($result)==1)
				{
					$bike2 = mysqli_fetch_assoc($result);
				}
			}

			
			
			
				
						

			if(empty($id))
			{
				array_push($errors2, "ID is required!");
			}

			$target2="img/".basename($_FILES['image2']['name']);
			$image2=$_FILES['image2']['name'];
			move_uploaded_file($_FILES['image2']['tmp_name'], $target2);


			if(empty($image2))
			{
				$image2=$bike2['bikeImage'];
			}

			if(isset($_POST['ftr2']))
			{
				$ftr2=1;
				header("Location: login.php");
			}
			else
			{
				$ftr2=0;
			}
			if(isset($_POST['top2']))
			{
				$top2=1;
			}
			else{
				$top2=0;
			}
			if(empty($price2))
			{
				$price2=$bike2['bikePrice'];
			}
			if(empty($quantity2))
			{
				$quantity2=$bike2['count'];
			}
			if(empty($details2))
			{
				$details2=$bike2['bikeDetails'];

				//$status=$_POST['bikeDetails'];echo '<br/>';
				//$details2 = nl2br(htmlentities($status, ENT_QUOTES, 'UTF-8'));
			}
			if(count($errors2)==0)
			{
				include "connect.php";
				$query="update bikes set bikePrice='$price2',bikeDetails='$details2',count='$quantity2',featured='$ftr2',topRated='$top2',bikeImage='$image2' where bikeId=$id";
					mysqli_query($connect,$query);
					include "disconnect.php";
					//echo "<script> alert('Bike information updated successfully!');window.location='admin.php#update'</script> ";

					header("Location: admin.php");

			}
		}
		else
		{
			array_push($errors2, "Id is must");
		}
	}	


	if(isset($_POST['delete']))
	{
		if(!empty($_POST['bikeId']))
		{
			$id=$_POST['bikeId'];
			include "connect.php";
			$query="update bikes set available=0 where bikeId=$id";
			mysqli_query($connect,$query);
			include "disconnect.php";
			echo "<script> alert('Bike deleted successfully!');window.location='admin.php'</script> ";

		}
		else{
			$errors3="Bike id is needed!";
		}
	}

	if(isset($_POST['deletebr']))
	{
		if(!empty($_POST['brandNamee']))
		{
			$bn=$_POST['brandNamee'];
			include "connect.php";
			$query="delete from brand where brandName='$bn'";
			mysqli_query($connect,$query);
			include "disconnect.php";
			echo "<script> alert('Brand deleted successfully!');window.location='admin.php'</script> ";

		}
		else{
			$errors5="Brand name is needed!";
		}
	}
		
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <?php include 'link.php'?>;	
	    <link rel="stylesheet" href="adminPanel.css">

		 
	</head>

	<body>


			<?php include "navbarAdmin.php";?>
		
		<h1 class="text-center" style="margin-top: 100px;">Admin Panel</h1>

		<hr></hr>
				

    	<div class="container" id="addBrand" >

			<div style="height: 100px;">
				
			</div>
				<hr></hr>
			<h2 class="text-center" style="margin-top: 0px;">Add Brand</h2>
			<hr></hr>

			<?php if(count($errors4)>0 && isset($_POST['addBrand'])): ?>
				<div class="error ">
					<?php foreach ($errors4 as $error): ?>
						<p style="color: red;"><?php echo $error;?></p>
						
					<?php endforeach?>
				</div>
			<?php endif?>


		  <form action="" method="post" id="addBikeForm" enctype="multipart/form-data">

		    <label for="brandName">Brand Name</label>
		    <input type="text" id="brandName" name="brandName" >
		    <div>
		    <label for="image3">Select Picture</label><br>
		    <input type="file" name="image3" style="margin-bottom: 20px;">
			</div>

		    <input type="submit" name="addBrand" value="Add" style="margin-top: 20px;">
		    <br>

		  </form>
		</div>












		<div class="container" id="addBike" >

			<div style="height: 100px;">
				
			</div>
				<hr></hr>
			<h2 class="text-center" style="margin-top: 0px;">Add Bike</h2>
			<hr></hr>

			<?php if(count($errors)>0 && isset($_POST['add'])): ?>
				<div class="error ">
					<?php foreach ($errors as $error): ?>
						<p style="color: red;"><?php echo $error;?></p>
						
					<?php endforeach?>
				</div>
			<?php endif?>


		  <form action="" method="post" id="addBikeForm" enctype="multipart/form-data">

		  	<label for="brand">Brand</label>
		    <select id="brand" name="brand">


		      <option value="">Select</option>
		        <?php
					include "connect.php";
					$querry = 'select distinct brandName from brand order by brandName';
					$result = mysqli_query($connect,$querry);
					include "disconnect.php";
					if($result):
						if(mysqli_num_rows($result)>0):
							while($bike = mysqli_fetch_assoc($result)):
								?>

								<option value="<?php echo $bike['brandName']; ?>"><?php echo $bike['brandName']; ?></option>
								

								<?php
							endwhile;
						endif;
					endif;
				?>



		    </select>


		    <label for="bikeName">Bike Name</label>
		    <input type="text" id="bikeName" name="bikeName" >
		    <div>
		    <label for="image">Select Picture</label><br>
		    <input type="file" name="image" style="margin-bottom: 20px;">
			</div>

		    <label for="bikePrice">Bike Price</label>
		    <input type="text" id="bikePrice" name="bikePrice" >

		    <label for="quantity">Quantity</label>
		    <input type="text" id="quantity" name="quantity" >


			<div class="custom-control custom-checkbox">
			  <input type="checkbox" class="custom-control-input" id="ftr" name="ftr" value='true' uchecked>
			  <label class="custom-control-label" for="ftr">Featured</label>
			</div>

			<div class="custom-control custom-checkbox">
			  <input type="checkbox" class="custom-control-input" id="top" name="top" value='true' unchecked>
			  <label class="custom-control-label" for="top">Top Rated</label>
			</div>
   
		    <label style="margin-top: 20px;" for="bikeDetails">Bike Details</label>
		    <textarea id="bikeDetails" name="bikeDetails" style="height:200px"></textarea>

		    <input type="submit" name="add" value="Add" style="margin-top: 20px;">
		    <br>

		  </form>
		  <div class="container-fluid"  id="allbike"></div>

		</div>


		<div style="height: 100px;">
			
		</div>
		<hr></hr>
		<h2 class="text-center" id="allbikee" style="margin-top: 0px;">All Bikes</h2>
		<hr></hr>


		<div class="table-wrapper-scroll-y my-custom-scrollbar">
		<div class="container-fluid"  id="table">
			<table class="table table-bordered table-striped mb-0">
				<tr>
					<th>Id</th>
					<th>Brand</th>
					<th>Name</th>
					<th>Price</th>
					<th>Details</th>
					<th>Quantity</th>
					<th>Featured</th>
					<th>Top Rated</th>
					<th>Image</th>
				</tr>
				<?php
				include "connect.php";
					$query="select * from bikes where available=1";
					$result = mysqli_query($connect, $query);	
					include "disconnect.php";
					if(mysqli_num_rows($result)>0)
					{
						while($bike = mysqli_fetch_assoc($result))
						{
							if($bike['featured']==1)
								$bike['featured']='Yes';
							else
								$bike['featured']='No';

							if($bike['topRated']==1)
								$bike['topRated']='Yes';
							else
								$bike['topRated']='No';


							echo "<tr><td>".$bike['bikeId']."</td><td>".$bike['bikeBrand']."</td><td>".$bike['bikeName']."</td><td>".$bike['bikePrice']."</td><td>".$bike['bikeDetails']."</td><td>".$bike['count']."</td><td>".$bike['featured']."</td><td>".$bike['topRated']."</td><td>".$bike['bikeImage']."</td></tr>";
						}
						echo "</table>";

					}
					else{
						echo "0 reslts";
					}			

				?>
				<div class="container" id="update" ></div>

		</div>
	</div>



		<div style="height: 100px;"></div>
		<hr></hr>

		<h2 class="text-center" style="margin-top: 0px;">Update Bike Information</h2>

		<hr></hr>

		<div class="container" id="updatee" >

			

		<form action="" method="post" id="addBikeForm" style="margin-bottom: 100px;" enctype="multipart/form-data">

			<?php if(count($errors2)>0 && isset($_POST['update'])): ?>
				<div class="error ">
					<?php foreach ($errors2 as $error): ?>
						<p style="color: red;"><?php echo $error;?></p>
						
					<?php endforeach?>
				</div>
			<?php endif?>

			<label for="bikeId">ID</label>
		    <input type="text" id="bikeId" name="bikeId" >

			<div>
		    <label for="image2">Select Picture</label><br>
		    <input type="file" name="image2" style="margin-bottom: 20px;">
			</div>

		    <label for="bikePrice">Bike Price</label>
		    <input type="text" id="bikePrice" name="bikePrice2" >

		    <label for="quantity">Quantity</label>
		    <input type="text" id="quantity" name="quantity2" >


			<div class="custom-control custom-checkbox">
			  <input type="checkbox" class="custom-control-input" id="ftr2" name="ftr2" value='truee' uchecked>
			  <label class="custom-control-label" for="ftr2">Featured</label>
			</div>

			<div class="custom-control custom-checkbox">
			  <input type="checkbox" class="custom-control-input" id="top2" name="top2" value='truee' unchecked>
			  <label class="custom-control-label" for="top2">Top Rated</label>
			</div>
   
		    <label style="margin-top: 20px;" for="bikeDetails">Bike Details</label>
		    <textarea id="bikeDetails" name="bikeDetails2" style="height:200px"></textarea>

		    <input type="submit" name="update" value="Update" style="margin-top: 20px;">
		</form>
	</div>




	<hr></hr>

		<h2 class="text-center" style="margin-top: 0px;">Delete Bike</h2>

		<hr></hr>

		<div class="container" id="delete" >

			

		<form action="" method="post" id="addBikeForm" style="margin-bottom: 100px;">

			<?php if(!empty($errors3) && isset($_POST['delete'])): ?>
				<div class="error">
						<p style="color: red;"><?php echo $errors3;?></p>			
				</div>
			<?php endif?>

			<label for="bikeId">ID</label>
		    <input type="text" id="bikeId" name="bikeId" >

		    <input type="submit" name="delete" value="Delete" style="margin-top: 20px; margin-top: 20px; background-color: #D5114C;">
		</form>
		<div id='delete1'></div>
	</div>


	<hr></hr>

		<h2 class="text-center" style="margin-top: 0px;">Delete Brand</h2>

		<hr></hr>

		<div class="container" id="deletebr" >

			

		<form action="" method="post" id="addBikeForm" style="margin-bottom: 100px;">

			<?php if(!empty($errors5) && isset($_POST['deletebr'])): ?>
				<div class="error">
						<p style="color: red;"><?php echo $errors5;?></p>			
				</div>
			<?php endif?>

			<label for="brandNamee">Brand Name</label>
		    <input type="text" id="brandNamee" name="brandNamee" >

		    <input type="submit" name="deletebr" value="Delete" style="margin-top: 20px; margin-top: 20px; background-color: #D5114C;">
		</form>
	</div>

	</body>
</html>