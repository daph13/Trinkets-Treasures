<?php
//Start the session
session_start();
include 'cart.php';

$item_no = $_POST['item_no'];
//remove item from the cart if selected - mark as deleted
//If the item is not empty
if ($item_no != "") {
    $counter = $_SESSION['counter'];
    $cart = new Cart();
    $cart = unserialize($_SESSION['cart']);
    //delete selected item from the cart
    $cart->delete_item($item_no);
    //update the counter
	//Decrement the counter by one
	$_SESSION['counter'] = $counter -1;
	//Serialize and add back to the session
    $_SESSION['cart'] = serialize($cart); 
    //Redirect to the view_cart.php
	header("Location: view_cart.php");
}
	
?>