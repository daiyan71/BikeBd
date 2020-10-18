<?php
	
	


		$bikeId=$_POST['id'];
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
		if($bikequantity>=1)
		{


		if(isset($_SESSION['shopping_cart'])){
			$count=count($_SESSION['shopping_cart']);

			$procuct_ids=array_column($_SESSION['shopping_cart'], 'id');

			if(!in_array($bikeId, $procuct_ids)){
				$_SESSION['shopping_cart'][$count]=array
				(
					'id' => $bikeId,
					'brand' => $bikeBrand,
					'name' => $bikeName,
					'price' => $bikePrice,
					'quantity' => 1

				);
			}
			else{
				for ($i=0; $i <count($procuct_ids) ; $i++) 
				{ 
					if($procuct_ids[$i]==$bikeId){
						//new
						$try=$_SESSION['shopping_cart'][$i]['quantity']+1;
						if($try<=$bikequantity)
							$_SESSION['shopping_cart'][$i]['quantity']+=1;

					}
				}
			}
		}
		else{

			$_SESSION['shopping_cart'][0]=array
			(
				'id' => $bikeId,
				'brand' => $bikeBrand,
				'name' => $bikeName,
				'price' => $bikePrice,
				'quantity' => 1
			);

		}
	}

			//echo '<pre>';
			//print_r($_SESSION['shopping_cart']);
			//echo "</pre>";
		}
		else{

			header("Location: signin.php");
		}

	


	
	//session_destroy();




?>