<?php
	session_start();

	if($_SESSION['login']==1)
	{
		$_SESSION['login']=0;
		$_SESSION['user']['id']=0;
		//session_destroy();
		echo "<script> alert('Successfully signed out!');window.location='home.php'</script> ";
		//header("Location: home.php");
	}
	else
	{
		header("Location: home.php");
	}
?>