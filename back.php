<?php
session_start();
  

?>

<html>
<head>
<link rel="icon" type="img/jpeg" href="images/logo.jpeg">
<title>Trinkets & Treasures</title>
<link href="styles/back.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>

<div id="myModal" class="modal">
<?php

	//$order_id = $_SESSION['order_id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	//$order_date = $_SESSION['order_date'];
	$total_price = $_SESSION['total_price'];
	  print_r($_SESSION);
	echo "<div class='modal-content'>";
	echo "<h4>Your order has been processed</h4><br/>";
    echo "<p>Thank you for shopping with us!</p><br/>";
	echo "<p>Invoice No: $order_id</p><br/>";
	echo "<p>Name: $name</p><br/>";
	echo "<p>Address: $address</p><br/>";
	echo "<p>Date of purchase: $order_date</p><br/>";
	echo "<p>Total Amount: $total_price</p>";
	echo "<button class='button-link'><a href='index.html'>Back to Home Page</a></button>";
	echo "<button class='button-link'><a href='shop.php'>Back to Shopping</a></button>";

  ?>
  </div>

</div>
</body>
</html>