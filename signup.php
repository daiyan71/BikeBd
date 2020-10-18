<?php
		session_start();
		$userName='';
		$email='';
		$phone='';
		$gender='';
		$address='';
		$pass1='';
		$pass2='';
		$errors=array();
		

	if(isset($_POST["signup"]))
	{

		$userName=$_POST['userName'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$gender=$_POST["gender"];
		$address=$_POST['address'];
		$pass1=$_POST['pass1'];
		$pass2=$_POST['pass2'];



		if(empty($userName))
		{
			array_push($errors, "User Name is required!");
		}
		else {

    		if (!preg_match("/^[a-zA-Z ]*$/",$userName)) {
    	 		array_push($errors , "Only letters and white space allowed in name");
    		}
 		}

		if(empty($email))
		{
			array_push($errors, "Email is required!");
		}
		else {
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      array_push($errors, "Invalid email format");
		    }
		  }
		  include "connect.php";

		$query = "SELECT * FROM user WHERE Email='".$email."'";
		$result = mysqli_query($connect, $query);
		include "disconnect.php";
		if(mysqli_num_rows($result)>0)
		{
			array_push($errors, "Already registered email!");
		}
		if(empty($phone))
		{
			array_push($errors, "Phone number is required!");
		}
		else{
			$number    = preg_match('@[0-9]@', $phone);

			if(!$number || strlen($phone) < 11) {
			    array_push($errors, 'Phone number should contain 11 digits !');
			}
		}

		if($gender=='Select')
		{
			array_push($errors, "Gender is required!");
		}
		if(empty($address))
		{
			array_push($errors, "Address is required!");
		}
		if(empty($pass1))
		{
			array_push($errors, "Password is required!");
		}
		else
		{

			$uppercase = preg_match('@[A-Z]@', $pass1);
			$lowercase = preg_match('@[a-z]@', $pass1);
			$number    = preg_match('@[0-9]@', $pass1);

			if(!$uppercase || !$lowercase || !$number || strlen($pass1) < 6) {
			    array_push($errors, 'Password should be at least 6 characters in length and should include at least one upper case letter, one number!');
			}

		}


		if($pass1!=$pass2)
		{
			array_push($errors, "Password do not match!");
		}

		if(count($errors)==0)
		{
		
				$pass=md5($pass1);
				date_default_timezone_set('Asia/Dhaka');
				$date=date("Y-m-d h:i:sa");	
				include "connect.php";
				$query="Insert into user (UserName,Email,Phone,Address,Gender,Password,registrationTime)
				values('$userName','$email','$phone','$address','$gender','$pass','$date')";
				mysqli_query($connect,$query);
				include "disconnect.php";

				echo "<script> alert('Successfully logged in');window.location='signin.php'</script> ";

		}


	}	
		
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <?php include 'link.php'?>
	    <link rel="stylesheet" href="signup.css">
	    
		 
	</head>

	<body>

		<?php include 'navbar.php'?>


		<h1 class="text-center" style="margin-top: 100px; color: #black; text-shadow: 2px 2px 5px #333333; font-weight: bold;">Sign Up</h1>

		<div class="container" id="contactForm">

			<?php if(count($errors)>0 && isset($_POST['signup'])): ?>
				<div class="error ">
					<?php foreach ($errors as $error): ?>
						<p style="color: red;"><?php echo $error;?></p>
						
					<?php endforeach?>
				</div>
			<?php endif?>	



		  <form action="" method="post" >

		    <label for="userName">User Name</label>
				<input type="text" id="userName" name="userName" placeholder="user name.." value="<?php echo $userName ?>">

		    <label for="email">Email</label>
		    	<input type="text" id="email" name="email" placeholder="example@email.com" value="<?php echo $email ?>">

		    <label for="address">Address</label>
		    	<input type="text" id="address" name="address" placeholder="Your address.." value="<?php echo $address ?>">

		    <label for="phone">Phone</label>
		    	<input type="text" id="phone" name="phone" placeholder="+880 1234567899" value="<?php echo $phone ?>">

		    <label for="gender">Gender</label>
		    	<select name="gender">
		    		<option>Select</option>
		    		<option value="Male">Male</option>
		    		<option value="Female">Female</option>
		    	</select>	

		    <label for="pass1">Password</label>
		    	<input type="password" id="pass1" name="pass1" placeholder="Password">
		    <label for="pass2">Re-type Password</label>
		    	<input type="password" id="pass2" name="pass2" placeholder="Re-type Password">

		   		 <input type="submit" value="SIGNUP" name="signup" style="margin-top: 20px;">

		   		 <p style="margin-top: 20px;">
		   		 	Already a member? <a href="signin.php">Sign in</a>
		   		 </p>
		  </form>
		</div>

		<?php include 'footer.php'?>

	</body>
</html>