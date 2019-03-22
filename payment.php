<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" type="img/jpeg" href="images/logo.jpeg">
<title>Payment Page</title>
<link href="styles/payment.css" rel="stylesheet" type="text/css" media="all">
</head>
<?php
require_once('phpcreditcard.php');
//Read the values from the form
if (($_SERVER['REQUEST_METHOD'] == 'POST') && (!empty($_POST['action']))){ 
if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['address'])) {$address = $_POST['address'];}
if (isset($_POST['card_no'])) {$card_no = $_POST['card_no'];}
if (isset($_POST['code'])) {$code = $_POST['code'];}
if (isset($_POST['exp_date'])) {$exp_date = $_POST['exp_date'];}
$card_type = $_POST['card_type'];

//Validate the text fields and the credit card
if($name === ''){
    $nameErr =  "<span class='error'>Name is required</span>";
}

if($email === ''){
    $emailErr =  "<span class='error'>Email is required</span>";
	//if input field is empty 
}
elseif(!(strstr($email, "@")) or !(strstr($email, ".")))
{
	$emailErr =  "<span class='error'>Please write a valid email</span>";
}

if($address === ''){
    $addressErr =  "<span class='error'>Address is required</span>";
}


if($card_no === ''){
    $cardErr =  "<span class='error'>Card Number is required</span>";
}
elseif (checkCreditCard($_POST['card_no'], $_POST['card_type'],$ccerror, $ccerrortext) != true)
{
	$cardErr = "<span class='error'>".$ccerrortext."</span>";
}

if($code === ''){
    $codeErr =  "<span class='error'>Code is required</span>";
}

if($exp_date === ''){
    $exp_dateErr =  "<span class='error'>Expiry Date is required</span>";
}

else{
//If there are no errors
include ('cart.php');
$cart = new Cart();
$counter= $_SESSION['counter'];
$total_price = $_SESSION['total_price'];
require_once('conn_trinketsdb.php');
require_once('gen_id.php');
    	
if ($counter==0){
echo"<br><br><p><b> Your Shopping Cart is empty !!! </b></p>";
echo"<p><b> <a href=shop.php>Go back to products </a> </b></p>";
}
else {
		//Convert the cart string to a cart object
		$cart = unserialize($_SESSION['cart']);
		$depth = $cart->get_depth();
		//Generate the order id
		$order_id = gen_id(8);
		$order_date = date('Y-m-d');
		
		//Use a for loop to Iterate through the cart
		for ($i=0; $i < $depth; $i++) {
			$item = $cart->get_item($i);
			$deleted = $item->deleted;
			if (!$deleted){
				$product_id = $item->get_product_id();
				$qty = $item->get_qty();
				$unit_price = $item->get_unit_price();
				$total_price = $total_price + ($unit_price*$qty);
				//Add the record to order_line table
				//Create the insert query for the order_line table
    			$query = "INSERT INTO order_item 
				VALUES('$order_id', '$product_id', '$qty')";
				//print $query;
				//Run the query using mysql_query()
				$result = mysqli_query($link, $query) or die ("Database Error - Order Line");
    		}
		}
		//Add the record to order table
		$status = "pending";
		$total_price = $_SESSION['total_price'];
		//Create the insert query for the order table
    	$order_query = "INSERT INTO orders VALUES('$order_id', '$email', '$order_date', '$total_price', '$status')";
		//print $order_query;
		//Run the query using mysql_query()
		$result = mysqli_query($link, $order_query) or die ("Database Error - Order Line");
		//$msg($email, "Order Confirmation", $msg);
		mysqli_close($link);
		//OR//echo "Thank you for the order your order number is $order_id <br> Your order details has been emailed to your $_POST[email]";
		//Email the invoice
		
		
		//Empty the cart
		//session_destroy();
		unset($_SESSION['counter']);
		unset($_SESSION['cart']);
		//print_r($_SESSION);
		//print_r($_POST);
		
		$string = "Your order has been processed.\\Thank you for shopping with us! \\nInvoice No: $order_id  \\nName: $name \\nAddress: $address \\nOrder Date: $order_date \\nTotal Amount: $total_price";
		echo "<script>alert(\"$string\");</script>";
		echo "<script>window.location = 'shop.php'</script>";
		//echo "<script>window.location = 'back.php' </script>";
		//echo"<p><b> <a href=shop.php>Go back to Shopping </a> </b></p>";	
		/*echo "Your order has been processed, Thank you for shopping with us!<br/>";
		echo "Invoice No: $order_id <br/>";
		echo "Name: $name<br/>";
		echo "Address: $address<br/>";
		echo "Order Date: $order_date<br/>";
		echo "Total Amount: $total_price<br/>";
		echo"<p><b> <a href=shop.php>Go back to Shopping </a> </b></p>"; */
	}
}
}
?>

<body>
<div class='payment-details-wrapper'>
<h1>Payment Details</h1>
<p>Please enter your credit card and shipping details</p>
<form action="<?php echo $_SERVER['PHP_SELF']?>" action="back.php" method="post" name="process_payment">
	<table class="center" style="width: 61%; height: 350px">
		<tr>
			<td style="width: 173px">Name</td>
			<td class="style1">
			<input name="name" id="name" style="width: 240px" type="text" value="<?php if(isset($name)) {echo $name;} ?>" />
			<?php if(isset($nameErr)) {echo $nameErr;} ?></td>
		</tr>
		<tr>
			<td style="width: 173px">Email Address</td>
			<td class="style1">
			<input name="email" type="text" style="width: 240px" value="<?php if(isset($email)) {echo $email;} ?>" />
			<?php if(isset($emailErr)) {echo $emailErr;} ?></td>
		</tr>
		<tr>
			<td style="width: 173px">Shipping Address</td>
			<td class="style1">
			<textarea name="address" style="width: 205px; height: 91px" value="<?php if(isset($address)) {echo $address;} ?>"></textarea>
			<?php if(isset($addressErr)) {echo $addressErr;} ?></td>
		</tr>
		<tr>
			<td style="width: 173px">Card Type</td>
			<td class="style1"><select name="card_type">
			<option value="Visa">Visa</option>
			<option value="Master Card">Master Card</option>
			<option value="American Express">American Express</option>
			<option value="Carte Blanche">Carte Blanche</option>
			<option value="Discover">Discover</option>
			<option value="Diner's Club">Diner's Club</option>
			<option value="enRoute">enRoute</option>
			<option value="JCB">JCB</option>
			<option value="Solo">Solo</option>
			<option value="Switch">Switch</option>
			</select></td>
		</tr>
		
		<tr>
			<td style="width: 173px">Card Number</td>
			<td class="style1">
			<input name="card_no" type="text" style="width: 220px" placeholder="4111 1111 1111 1111" value="<?php if(isset($card_no)) {echo $card_no;} ?>"/>
			<?php if(isset($cardErr)) {echo $cardErr;} ?></td>
		</tr>
		<tr>
			<td style="width: 173px">Verification Code</td>
			<td class="style1">
			<input name="code" type="text" style="width: 300px" value="<?php if(isset($code)) {echo $code;} ?>" />
			<?php if(isset($codeErr)) {echo $codeErr;} ?></td>
		</tr>
		<tr>
			<td style="width: 173px">Exp. Date</td>
			<td class="style1">
			<input name="exp_date" style="width: 240px" type="text" value="<?php if(isset($exp_date)) {echo $exp_date;} ?>"/>
			<?php if(isset($exp_dateErr)) {echo $exp_dateErr;} ?></td>
		</tr>
		<tr>
			<td style="width: 173px">
			<input class="actionButton" name="action" id="btnSubmit" type="submit" value="Submit" /></td>
			<td>
			<input class="actionButton" name="Reset1" type="reset" value="Reset" /></td>
		</tr>
	</table>
	</div>
</form>

</body>
</html>
