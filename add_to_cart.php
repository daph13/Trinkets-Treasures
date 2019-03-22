<?php
session_start();
include 'cart.php';
//get the item_id and the quantity
$product_id=$_POST['product_id'];
$qty=$_POST['qty']; 
$cart = new Cart();
$counter = 0;
//store number of items in the shopping cart
if ((isset($_SESSION['counter'])) && ($_SESSION['counter'] !=0)){
    $counter = $_SESSION['counter'];
    $cart = unserialize($_SESSION['cart']);
}
//unserialize the cart if the cart is not empty
else {
	$_SESSION['counter'] = 0;
	$_SESSION['cart'] = "";
}
if (($product_id == "")or ($qty < 1))
{
   header("Location: shop.php");
   exit;
}
else
{
//connect to server and select database
    require_once('conn_trinketsdb.php');
    $query = "SELECT product_name, unit_price from product 
	WHERE (product_id = '$product_id') ";
	//print $query;
    $result= mysqli_query($link, $query) or die( "Database Error");
   if (mysqli_num_rows($result) == 1) {
	$row = $result->fetch_assoc();
    $product_name=$row['product_name'];
	$unit_price=$row['unit_price'];
	//add item to the cart
	$new_item = new Item($product_id, $product_name, $qty, $unit_price);
	$cart->add_item($new_item);
	//update the counter
	$_SESSION['counter'] = $counter+1;
	//Convert the cart to a text object and store in a session
	$_SESSION['cart'] = serialize($cart);
	header("Location: view_cart.php");
    	mysqli_close($link);
    }
    else
    {
	//print_r($cart);
	header("Location: shop.php");
   	exit;
    }
}


//modify cart.php and this php to increase the number of the same item in the cart




?>