<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "trinketsdb";
	
	//connect to the server 
	$link =  mysqli_connect($server, $user, $pass, $database)
	or die ("Error".mysqli_error($link));
	
	//echo "Connected to $database"
?>