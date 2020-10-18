<?php
	session_start();

	$userId=$_SESSION['user']['id'];

	

?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <?php include 'link.php'?>
	    <link rel="stylesheet" href="orders.css">
	    
		 
	</head>

	<body>


	<?php include 'navbar.php' ?>



	<div class="container" style="margin-top: 200px;">
	<div class="table-responsive">
		<table class="table">
			<tr><th colspan="6"><h3 class="text-center">Order Details</h3></th></tr>
			<tr >
				<th width="10%">Order Id</th>
				<th width="15%">Bike Brand</th>
				<th width="20%">Bike Name</th>
				<th width="15%">Price</th>
				<th width="10%">Quantity</th>
				<th width="10%">Date</th>
			</tr>
				<?php
				include "connect.php";
					$query="select ordertable.orderId as oid,bikes.bikeBrand as bbrand,bikes.bikeName as bname,orderdetails.quantity quan,orderdetails.price pr,ordertable.dateOfOrder dt from ordertable inner join orderdetails on ordertable.orderId=orderdetails.orderId inner join bikes on bikes.bikeId=orderdetails.bikeId where ordertable.userId=$userId order by oid desc";
					$result = mysqli_query($connect, $query);	
					include "disconnect.php";
					if(mysqli_num_rows($result)>0)
					{
						while($bike = mysqli_fetch_assoc($result))
						{

							echo "<tr><td>".$bike['oid']."</td><td>".$bike['bbrand']."</td><td>".$bike['bname']."</td><td>".$bike['pr']."</td><td>".$bike['quan']."</td><td>".$bike['dt']."</td></tr>";
						}
						echo "</table>";

					}
					else{
						//echo "0 reslts";
					}			

				?>
		</table>
	</div>


		</div>


	</body>
</html>