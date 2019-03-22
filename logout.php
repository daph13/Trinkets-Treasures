<?php
	session_start();
	//Destroy the session
	//Redirect user back to the login page
	unset($_SESSION['email']);
	session_destroy();
	echo "<script>alert('You have successfully logged out');</script>";
	echo "<script>window.location = 'index.html' </script>";
   	exit;

?>
