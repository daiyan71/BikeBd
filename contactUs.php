<?php session_start(); 


		$name='';
		$message='';

		$errors=array();


	if(isset($_POST["submit"]))
	{

		$name=$_POST['name'];
		//$message=$_POST['message'];
		$status=$_POST['message'];echo '<br/>';
		$message = nl2br(htmlentities($status, ENT_QUOTES, 'UTF-8'));

		$email=$_POST['email'];
		$phone=$_POST['phone'];

		$subject=$_POST['subject'];




		if(empty($name))
		{
			array_push($errors, "Name is required!");
		}
		if(empty($message))
		{
			array_push($errors, "Message is empty!");
		}

		if(count($errors)==0)
		{
			include "connect.php";
			$query="Insert into contactus (name,email,phone,subject,message)
			values('$name','$email','$phone','$subject','$message')";
			mysqli_query($connect,$query);
			include "disconnect.php";
			echo "<script> alert('Message received!');window.location='contactUs.php'</script> ";

			//header("Location: contactUs.php");
		}

	}



?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <?php include 'link.php'?>
	    <link rel="stylesheet" href="contactUs.css">
	    
		 
	</head>

	<body>

		

		<?php include 'navbar.php'?>

		<div class="maincon">

		<div class="txt text-center" style="padding-top:100px;  padding-bottom: 0px; clear: left;" >
				<h1 style="font-family: serif; font-weight: bold; font-size: 50px; text-shadow:  255 14px 118px;">Leave us a message</h1>
		</div>

		<hr>


		<div class="container" id="contactForm" style="margin-bottom: 100px;">

			<?php if(count($errors)>0 && isset($_POST['submit'])): ?>
				<div class="error ">
					<?php foreach ($errors as $error): ?>
						<p style="color: red;"><?php echo $error;?></p>
						
					<?php endforeach?>
				</div>
			<?php endif?>


		  <form action="" method="post">

		    <label for="name">Name</label>
				<input type="text" id="name" name="name" placeholder="Your name" value="<?php echo $name ?>">

		    <label for="email">Email</label>
		    	<input type="text" id="email" name="email" placeholder="example@email.com">

		    <label for="phone">Phone</label>
		    	<input type="text" id="phone" name="phone" placeholder="+8801123456789">

		    <label for="subject">Subject</label>
		    	<input type="text" id="subject" name="subject" placeholder="Subject">


		    <label for="message">Message</label>
		   		 <textarea id="message" name="message" value="<?php echo $message ?>" placeholder="Write something.." style="height:200px"></textarea>

		   		 <input type="submit" name="submit" value="Send Message">

		  </form>
		</div>


	</div>


		<?php include 'footer.php'?>


	</body>
</html>