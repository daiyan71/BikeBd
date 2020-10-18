<?php
	session_start();




		$email='';
		$pass1='';

		$errors=array();


	if(isset($_POST["signin"]))
	{

		$email=$_POST['email'];
		$pass1=$_POST['pass1'];



		if(empty($email))
		{
			array_push($errors, "Email is required!");
		}
		if(empty($pass1))
		{
			array_push($errors, "Password is required!");
		}

		if(count($errors)==0)
		{
			$pass=md5($pass1);
			include "connect.php";
			$query = "SELECT * FROM user WHERE Email='$email' and Password='$pass' and active=1";
			$result = mysqli_query($connect, $query);
			include "disconnect.php";
			if(mysqli_num_rows($result)==1)
			{

				$userinfo = mysqli_fetch_assoc($result);
				$_SESSION['user']['id']=$userinfo['UserId'];
				$_SESSION['user']['name']=$userinfo['UserName'];
				$_SESSION['user']['phone']=$userinfo['Phone'];
				$_SESSION['user']['address']=$userinfo['Address'];
				$_SESSION['login']=1;

				if(isset($_GET['bikeId'])){
					$iidd=$_GET['bikeId'];
					if($iidd!=00)
						echo "<script> alert('Successfully signed in!');window.location='bikeDetails.php?bikeId=$iidd'</script> ";
					else
					{

						echo "<script> alert('Successfully signed in!');window.location='account.php'</script> ";
						
					}
				}
				else{
					echo "<script> alert('Successfully signed in!');window.location='home.php'</script> ";
				}
			}
			else
			{
				array_push($errors, "Incorrect email or password!");
			}

		}

	}


		if(isset($_POST["activate"]))
		{


		$email=$_POST['email'];
		$pass1=$_POST['pass1'];



		if(empty($email))
		{
			//header("Location:home.php");
			array_push($errors, "Email is required!");
		}
		if(empty($pass1))
		{
			array_push($errors, "Password is required!");
		}

		if(count($errors)==0)
		{
			$pass=md5($pass1);
			include "connect.php";
			$query = "SELECT * FROM user WHERE Email='$email' and Password='$pass' and active=0";
			$result = mysqli_query($connect, $query);

			if(mysqli_num_rows($result)==1)
			{

				$userinfo = mysqli_fetch_assoc($result);
				$id=$userinfo['UserId'];
				$query1="update user set active=1 where UserId=$id";
				mysqli_query($connect,$query1);
				include "disconnect.php";

				$_SESSION['user']['id']=$userinfo['UserId'];

				$_SESSION['login']=1;
				//TextNode("success","Successfull");
				if(isset($_GET['bikeId'])){
					$iidd=$_GET['bikeId'];
					echo "<script> alert('Account Successfully activated!');window.location='bikeDetails.php?bikeId=$iidd'</script> ";
				}
				else{
					echo "<script> alert('Account Successfully activated!');window.location='home.php'</script> ";
				}
			}
			else
			{
				array_push($errors, "Incorrect email or password!");
			}

		}




		}	
	
		
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <?php include 'link.php'?>;	
	    <link rel="stylesheet" href="signin.css">
	    
		 
	</head>

	<body style="padding-bottom: 250px;">


		<?php include 'navbar.php'?>

		<div id="main">

		<h1 class="text-center" style="margin-top: 100px; color: #black; text-shadow: 2px 2px 2px #333333; font-weight: bold;">Sign In</h1>


		<div class="container" id="contactForm">

			<?php if(count($errors)>0 && isset($_POST['signin']) || isset($_POST['activate'])): ?>
				<div class="error ">
					<?php foreach ($errors as $error): ?>
						<p style="color: red;"><?php echo $error;?></p>
						
					<?php endforeach?>
				</div>
			<?php endif?>	

		  <form action="" method="post" >

		    <label for="email">Email</label>
		    	<input type="text" id="email" name="email" placeholder="example@email.com" value="<?php echo $email ?>">

		    <label for="pass1">Password</label>
		    	<input type="password" id="pass1" name="pass1" placeholder="Password">


		   		 <input type="submit" value="SIGN IN" name="signin" style="margin-top: 20px;">
		   		 <input type="submit" value="RE ACTIVATE ACCOUNT" name="activate" style="margin-top: 20px;">

		   		  <p style="margin-top: 20px;">
		   		 	Not a member yet? <a href="signup.php">Sign up</a>
		   		 </p>
		  </form>
		</div>
	</div>

		<?php include 'footer.php'?>
	</body>
</html>