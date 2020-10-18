<?php
		session_start();



		$id=$_SESSION['user']['id'];

		include "connect.php";
		$query = "SELECT * FROM user WHERE UserId='$id'";
		$result = mysqli_query($connect, $query);
		if(mysqli_num_rows($result)==1)
		{
			$userInfo = mysqli_fetch_assoc($result);

		}
		include "disconnect.php";
		$userNamee=$userInfo['UserName'];
		$userEmail=$userInfo['Email'];
		$userPhone=$userInfo['Phone'];
		$userAddress=$userInfo['Address'];
		$userGender=$userInfo['Gender'];


		/*$ck=0;

		if(isset($_POST['ckupdate']))
		{
			$ck=1;

		}
*/
		$userName1=$userNamee;
		$email=$userEmail;
		$phone=$userPhone;
		$gender='';
		$address=$userAddress;
		$pass1='';
		$errors=array();
		$errors2=array();
		$errors3;

	if(isset($_POST["UPDATEpass"]))
	{
		$pas1=$_POST['pas1'];
		$pas2=$_POST['pas2'];

		if(empty($pas1))
		{

			array_push($errors2, "Old Password is required");
		}
		if(empty($pas2))
		{

			array_push($errors2, "New Password is required");

		}
		else
		{

			$uppercase = preg_match('@[A-Z]@', $pas2);
			$lowercase = preg_match('@[a-z]@', $pas2);
			$number    = preg_match('@[0-9]@', $pas2);

			if(!$uppercase || !$lowercase || !$number || strlen($pas2) < 6) {
			    array_push($errors2, 'Password should be at least 6 characters in length and should include at least one upper case letter, one number!');
			}

		}
		include "connect.php";
		$query = "SELECT * FROM user WHERE UserId='$id'";
		$result = mysqli_query($connect, $query);
		if(mysqli_num_rows($result)==1)
		{
			$userInfo = mysqli_fetch_assoc($result);

		}
		include "disconnect.php";

		$pas=md5($pas1);
		if(!$pas==$userInfo['Password'])
		{
			array_push($errors2, "Incorrect Old Password");
		}
		else
		{
			if(count($errors2)==0){
				$newPass=md5($pas2);
				include "connect.php";
				$query="update user set Password='$newPass' where UserId=$id";
				mysqli_query($connect,$query);
				include "disconnect.php";
				echo "<script> alert('Password updated successfully');window.location='account.php'</script> ";
				//header("Location: account.php");
			}
		}


	}



	if(isset($_POST["UPDATE"]))
	{
		$userName1=$_POST['userName'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$pass1=$_POST['pass1'];



		if(empty($userName1))
		{

			$userName1=$UserNamee;
		}
		else {

    		if (!preg_match("/^[a-zA-Z ]*$/",$userName)) {
    	 		array_push($errors , "Only letters and white space allowed in name");
    		}
 		}

		if(empty($email))
		{

			$email=$userEmail;

		}
		else{

		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      array_push($errors, "Invalid email format");
		    }

			if($email!=$userEmail)
			{
				include "connect.php";
				$query = "SELECT * FROM user WHERE Email='".$email."'";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result)>0)
				{
					array_push($errors, "Already registered email!");
				}
				include "disconnect.php";
			}
		}
		if(empty($phone))
		{

			$phone=$userPhone;
		}
		else{
			$number    = preg_match('@[0-9]@', $phone);

			if(!$number || strlen($phone) < 11) {
			    array_push($errors, 'Phone number should contain 11 digits !');
			}
		}

		if(empty($address))
		{

			$address=$userAddress;
		}

		
		if(empty($pass1))
		{

			array_push($errors, "Password is required!");
		}
		else{

			$pass=md5($pass1);
			include "connect.php";
			$query = "SELECT * FROM user WHERE UserId=$id";
			$result = mysqli_query($connect, $query);
			include "disconnect.php";
			if(mysqli_num_rows($result)==1)
			{
				$matchPass = mysqli_fetch_assoc($result);
			}

			if($matchPass['Password']!=$pass){
				array_push($errors, "Incorrect Password");
			}

		}
		
		if(count($errors)==0)
		{
			include "connect.php";
				$query="update user set UserName='$userName1',Email='$email',Phone='$phone',Address='$address' where UserId=$id";
				mysqli_query($connect,$query);
				include "disconnect.php";
				$_SESSION['user']['name']=$userName1;
				$_SESSION['user']['phone']=$phone;
				$_SESSION['user']['address']=$address;
				echo "<script> alert('Information updated successfully');window.location='account.php'</script> ";
				//header("Location: account.php");

		}


	}

	if(isset($_POST['delete']))
	{
		include "connect.php";
		$query = "SELECT * FROM user WHERE UserId='$id'";
		$result = mysqli_query($connect, $query);
		include "disconnect.php";
		if(mysqli_num_rows($result)==1)
		{
			$userInfo = mysqli_fetch_assoc($result);

		}

		if(empty($_POST['pass2']))
			$errors3="Provide your Password to delete your account";
		else{
			$paas=md5($_POST['pass2']);
			if($paas!=$userInfo['Password'])
			{
				//header("Location: signout.php");

				$errors3="Incorrect Password";
			}
			else
			{
					include "connect.php";
					$query1="update user set active=0 where UserId=$id";
					mysqli_query($connect,$query1);
					include "disconnect.php";

					echo "<script> alert('Account successfully deleted');window.location='signout.php'</script> ";
					//header("Location: signout.php");

				
			}
		}
	}	

		
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <?php include 'link.php'?>;	
	    <link rel="stylesheet" href="account.css">
	    
		 
	</head>

	<body>



		<?php include 'navbar.php' ?>



		<ul class="nav justify-content-center fixed-bottom bg-dark" > 
	    	<li class="nav-item">
	      		<a class="nav " style="color: white; margin:15px;" href="#update1"><h6>UPDATE INFO</h6></a>
		    </li>
		    <li class="nav-item">
		     	 <a class="nav"style="color: white; margin:15px;" href="#update2"><h6>UPDATE PASSWORD</h6></a>
		    </li>
		    <li class="nav-item">
		      	<a class="nav"style="color: white; margin:15px;" href="#update3"><h6>DELETE ACCOUNT</h6></a>
		    </li>
	  	</ul>



		<h1 class="text-center" style="margin-top: 100px; font-weight: bold">Your Account</h1>

		<div class="container" id="contactForm" style="width: 600px; margin: auto;">

		    <label style="margin:30px; font-weight: bold;">User Name:</label>
		    <label style="margin:30px; " ><?php echo $userNamee ?></label>

		    <br>
		    
		    <label style="margin:30px; font-weight: bold;">Email    :</label>
		    <label style="margin:30px 30px 30px 68px;"><?php echo $userEmail ?></label>
		    <br>
		    
		    <label style="margin:30px; font-weight: bold;">Address  :</label>
		    <label style="margin:30px 30px 30px 48px;"><?php echo $userAddress ?></label>
		    <br>
		    
		    <label style="margin:30px; font-weight: bold;">Phone    :</label>
		    <label style="margin:30px 30px 30px 62px;"><?php echo $userPhone ?></label>
		    <br>
		    <label style="margin:30px; font-weight: bold;">Gender   :</label>
		    <label style="margin:30px 30px 30px 53px;"><?php echo $userGender ?></label>
		    <br>
		  <div class="update1" id="update1"></div>
		</div>


			
			<div class="container" id="contactForm">

			<?php if(count($errors)>0 && isset($_POST['UPDATE'])): ?>
				<div class="error ">
					<?php foreach ($errors as $error): ?>
						<p style="color: red;"><?php echo $error;?></p>
						
					<?php endforeach?>
				</div>
			<?php endif?>	



		  <form action="" method="post" >

		    <label for="userName">User Name</label>
				<input type="text" id="userName" name="userName" placeholder="Your first name.." value="<?php echo $userName ?>">

		    <label for="email">Email</label>
		    	<input type="text" id="email" name="email" placeholder="Your phone email" value="<?php echo $email ?>">

		    <label for="address">Address</label>
		    	<input type="text" id="address" name="address" placeholder="Your address" value="<?php echo $address ?>">

		    <label for="phone">Phone</label>
		    	<input type="text" id="phone" name="phone" placeholder="Your phone number" value="<?php echo $phone ?>">


		    <label for="pass1">Password</label>
		    	<input type="password" id="pass1" name="pass1" placeholder="Password">

		   		 <input type="submit" value="UPDATE" name="UPDATE" style="margin-top: 20px;">

		  </form>
		  <div class="update2" id="update2"></div>

		</div>



		<div class="container" id="contactForm">

			<?php if(count($errors2)>0 && isset($_POST['UPDATEpass'])): ?>
				<div class="error ">
					<?php foreach ($errors2 as $error): ?>
						<p style="color: red;"><?php echo $error;?></p>
						
					<?php endforeach?>
				</div>
			<?php endif?>

			<form action="" method="post" >

		    <label for="pas1">Old Password</label>
		    	<input type="password" id="pas1" name="pas1" >


		    <label for="pas2">New Password</label>
		    	<input type="password" id="pass2" name="pas2">

		   		 <input type="submit" value="UPDATE PASSWORD" name="UPDATEpass" style="margin-top: 20px;">

		  </form>
		  <div class="update3" id="update3"></div>
		</div>



		<div class="container" id="contactForm">

			<?php if(!empty($errors3) && isset($_POST['delete'])): ?>
				<div class="error ">
						<p style="color: red;"><?php echo $errors3;?></p>
				</div>
			<?php endif?>	

		  <form action="" method="post" >


		    <label for="pass2">Password</label>
		    	<input type="password" id="pass2" name="pass2">

		   		 <input type="submit" value="DELETE ACCOUNT" name="delete" style="margin-top: 20px; background-color: #D5114C;">

		  </form>

		</div>

	</body>
</html>