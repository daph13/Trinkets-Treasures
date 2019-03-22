<?php
//Start the session
session_start();
include 'cart.php';
$cart = new Cart();
if(!isset($_SESSION['counter'])){
	$_SESSION['counter']=0;
}
$counter= $_SESSION['counter'];
?>
<html>
<head>
<link rel="icon" type="img/jpeg" href="images/logo.jpeg">
<title>Trinkets & Treasures</title>
<link href="styles/view_cart.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>

<?php
//check whether the cart is empty or not

if ($counter == 0) {
    echo"<h1>Shopping Cart</h1>";
    echo"<br><br><p><b> Your Shopping Cart is empty !!! </b></p>";
    echo"<p><b> <a href=shop.php>Go back to products </a> </b></p>";
} else {
    $cart = unserialize($_SESSION['cart']);
	$depth = $cart->get_depth();
	
	echo"<div class='cart-wrapper'>";
    echo"<h1>Shopping Cart</h1>";
    echo "<table border=1>";
    echo"<tr><td></td><td class='table-header'><b>Item Name</b></td><td class='table-header'><b>Quantity</b></td><td class='table-header'><b> Price</b></td></tr>";
	//Use a for loop to Iterate through the cart
    $total_price = 0.00;
	$total_qty = 0;
	for ($i = 0; $i < $depth; $i++) {
        $item = $cart->get_item($i);
		//Read the deleted items from cart
		$deleted = $item->deleted;
        //display if the item is not marked for deletion
        if (!$deleted) {
            $product_id = $item->get_product_id();
            $product_name = $item->get_product_name();
            $qty = $item->get_qty();
            $unit_price = $item->get_unit_price();
			$total_price = $total_price + ($unit_price * $qty);
			$total_qty = $total_qty + $qty;
            echo "<tr><form  action=remove_from_cart.php method=POST>";
            echo"<td><img alt='product_id' src='images/$product_id' class='product-img'/></td><td class='table-header'>$product_name</td><td class='table-header'>$qty </td><td class='table-header'>$unit_price</td>";
            echo "<td> <input name= item_no type=hidden id= item_no value=$i></td>";
            echo"<td><INPUT  name=remove TYPE=submit id=remove value=Remove></td>";
            echo "</tr></form>";
        }
    }
	$_SESSION['total_price'] = $total_price;
	
	
	echo"<tr><td class='table-header'><b> Total </b></td><td></td><td class='table-header'>$total_qty</td><td class='table-header'><b>$total_price.00</b></td></tr>";
    echo "</table><br/>";
}
	
		echo "<button class='button-link'><a href='payment.php'>Pay with Credit Card</a></button>";
		echo"<button class='button-link'><a href='paypal.php'>Pay with Paypal</a></button>";
		echo"<button class='button-link'><a href='shop.php'>Back to Shopping</a></button>";
		?>
	</div>
</body>
</html>
