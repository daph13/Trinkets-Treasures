<?php
//start the new session
session_start();
//Read the email and the password
$email = $_POST['email'];
$password=$_POST['password'];
if (($email=="") || ($password=="")) {
   //Redirect user back to the login page
   header("Location: login.html");
   exit;
}
else
	{   
	//connect to server and select database
	require_once('conn_trinketsdb.php');
	
	/*$key = "123xyx";
	$password = crypt($password, $key); */
	
	$password = md5($password);
	
	//Create a select query to select user details using the email and the password
	//$query = "SELECT '$email', '$password' FROM Contact";
	$query = "SELECT * FROM customer WHERE (email = '$email') AND (password = '$password')";
	$result = mysqli_query($link, $query) or die( "Invalid ID or Password");

	//get the number of rows in the result set; should be 1 if a match
	if (mysqli_num_rows($result) == 1) {
   		//if authorized, get the values of firstname lastname, phone and email
    	$row = $result -> fetch_array();
		//print_r($row);
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$phone = $row['phone'];
		$email = $row['email'];		
		
		mysqli_close($link);
		//save the values in session variables
		
		$_SESSION['first_name'] = $first_name;
		$_SESSION['last_name'] = $last_name;
		$_SESSION['phone'] = $phone;
		$_SESSION['email'] = $email;
	    echo "<script>alert('You have successfully logged in! Welcome, $first_name!');</script>";
		echo "<script>window.location = 'index.html' </script>";
	}
	else
		{
			//Redirect user back to the login page
			header("Location: login.html");
			exit;
		}
}
?>
