<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))){ 
if (isset($_POST['first_name'])) {$first_name = $_POST['first_name'];}
if (isset($_POST['last_name'])) {$last_name = $_POST['last_name'];}
if (isset($_POST['phone'])) {$phone = $_POST['phone'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['password'])) {$password = $_POST['password'];}
if (isset($_POST['repassword'])) {$repassword = $_POST['repassword'];}

if($first_name === ''){
    $first_nameErr =  "<span class='error'>First name is required</span>";
}


if($last_name === ''){
    $last_nameErr =  "<span class='error'>Last name is required</span>";
}


if($phone === ''){
    $phoneErr =  "<span class='error'>Phone is required</span>";
}
elseif(!is_numeric($phone)){
	$phoneErr = "<span class='error'>Phone must be numeric</span>";
}


if($email === ''){
    $emailErr =  "<span class='error'>Email is required</span>";
 
}
elseif(!(strstr($email, "@")) or !(strstr($email, ".")))
{
	$emailErr =  "<span class='error'>Please write a valid email</span>";
}


if(strlen($password) <= 6){
   $passwordErr = "<span class='error'>Password must be at least 6 characters</span>";
} //if password is not long enough

if($repassword === ''){
    $repasswordErr = "<span class='error'>Confirmation of password is required</span>";
}
elseif($password !== $repassword){
    $repasswordErr = "<span class='error'>The passwords to do not match!</span>";
 //if passwords dont match
}
else{
 //Connect to the server and add a new record 
	require_once('conn_trinketsdb.php');
	
	/*$key = "123xyx";
	$password = crypt($password, $key); */
	
	$password = md5($password);
	
	//Define the insert query
    $query = "INSERT INTO customer VALUES ('','$first_name','$last_name','$phone','$email','$password')";
	//Run the query
    mysqli_query($link, $query) or die( "Unable to insert the record");
    mysqli_close($link);
	echo "<script>alert('Thanks for registering with us!');</script>";
	echo "<script>window.location = 'login.html' </script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="img/jpeg" href="images/logo.jpeg">
<title>Trinkets & Treasures</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flat Sign Up Form Responsive Widget Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="styles/register.css" rel="stylesheet" type="text/css" media="all">
<link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<!-- online-fonts -->
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header-->
<!--	<div class="header-w3l">
		<h1>Flat Sign Up Form</h1>
	</div -->
<!--//header-->
<!--main-->
<div class="main-agileits">
	<h2 class="sub-head">Register</h2>
		<div class="sub-main">	
			<form name="register_form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">	
				<?php if(isset($first_nameErr)) {echo $first_nameErr;} ?>
				<input autofocus placeholder="First Name" name="first_name" id="first_name" class="name" type="text" value="<?php if(isset($first_name)) {echo $first_name;} ?>">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br>
                <?php if(isset($last_nameErr)) {echo $last_nameErr;} ?>
				<input placeholder="Last Name" name="last_name" id="last_name" class="name2" type="text" value="<?php if(isset($last_name)) {echo $last_name;} ?>">
					<span class="icon2"><i class="fa fa-user" aria-hidden="true"></i></span><br>
                <?php if(isset($phoneErr)) {echo $phoneErr;} ?>
				<input placeholder="Phone Number" name="phone" id="phone" class="number" type="text" value="<?php if(isset($phone)) {echo $phone;} ?>">
					<span class="icon3"><i class="fa fa-phone" aria-hidden="true"></i></span><br>
                <?php if(isset($emailErr)) {echo $emailErr;} ?>
				<input placeholder="Email" name="email" id="email" class="mail" type="text" value="<?php if(isset($email)) {echo $email;} ?>">
					<span class="icon4"><i class="fa fa-envelope" aria-hidden="true"></i></span><br>
                 <?php if(isset($passwordErr)) {echo $passwordErr;} ?>
				<input  placeholder="Password" name="password" id="password" class="pass" type="password" value="<?php if(isset($password)) {echo $password;} ?>">
					<span class="icon5"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
                 <?php if(isset($repasswordErr)) {echo $repasswordErr;} ?>
				<input  placeholder="Confirm Password" name="repassword" id="repassword" class="pass" type="password" value="<?php if(isset($repassword)) {echo $repassword;} ?>">
					<span class="icon6"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
				
				<input type="submit" name="action" value="register">
			</form>
		</div>
		<div class="clear"></div>
</div>
<!--//main-->

<!--footer-->
<div class="footer-w3">
	<p>&copy; 2016 Flat Sign Up Form . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div>
<!--//footer-->

</body>
</html>