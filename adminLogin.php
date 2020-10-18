<?php
	session_start();

		if(isset($_GET['signout']))
		{
		if($_GET['signout']=='true'){
			session_destroy();
		}
	}

		$AdminEmail='admin@admin.com';
		$AdminPass='buybikebd';
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

			if($AdminEmail==$email && $AdminPass==$pass1)
			{

				$_SESSION['adminLogin']=1;
				header("Location: admin.php");
			}
			else
			{
				array_push($errors, "Incorrect!");
			}

		}




	}	
		
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <?php include 'link.php'?>;	
	    <link rel="stylesheet" href="signup.css">
	   
		 
	</head>

	<body>

		<h1 class="text-center" style="margin-top: 100px;">ADMIN SIGNIN</h1>


		<div class="container" id="contactForm">

			<?php if(count($errors)>0 && isset($_POST['signin'])): ?>
				<div class="error ">
					<?php foreach ($errors as $error): ?>
						<p style="color: red;"><?php echo $error;?></p>
						
					<?php endforeach?>
				</div>
			<?php endif?>	

		  <form action="" method="post" >

		    <label for="email">Email</label>
		    	<input type="text" id="email" name="email" placeholder="admin email">

		    <label for="pass1">Password</label>
		    	<input type="password" id="pass1" name="pass1" placeholder="Password">


		   		 <input type="submit" value="SIGN IN" name="signin" style="margin-top: 20px;">

		  </form>
		</div>


	</body>
</html>