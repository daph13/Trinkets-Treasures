<?php
session_start();
?>
<html>
	<head>
		<link rel="icon" type="img/jpeg" href="images/logo.jpeg">		
		<title>Trinkets& Treasures</title>
		<link href="styles/shop.css" rel="stylesheet" type="text/css" media="all">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
		<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
		<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
		<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
		<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	</head>	
	<body>
	<br/>
	<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">
		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
						<!--<a href="#">trinkets<span>&treasures</span></a> -->
						<img src="images/logo.jpeg" class="logo_image" />
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="index.html">home</a></li>
								<li><a href="about.html">about</a></li>
								<li><a href="shop.php">shop</a></li>
								<li><a href="https://dinastrinketsandtreasures.blogspot.com.au/">blog</a></li>
								<li><a href="contact.html">contact</a></li>
							</ul>
							<ul class="navbar_user">
								<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
								<li class="user-icon"><a href="#"><i class="fa fa-user" aria-hidden="true"></i>
									<!-- <ul class="user-details">
										<li aria-hidden="true">Username</li>
										<li aria-hidden="true">Email</li>
									</ul> -->
									</a>
								</li>
								<li class="checkout">
									<a href="view_cart.php">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									</a>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>
		<div class="container">
		<div>
			<div class="category"><a href="shop.php">Bookmarks</a></div>
			<div class="category"><a href="shop_2.php">Bracelets</a></div>
			<div class="category"><a href="shop_3.php">Earrings</a></div>
		</div>

<?php
require_once("conn_trinketsdb.php");

$query = "select * from product where category_id='bracelet'";
$result = mysqli_query($link, $query);

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$product_id = $row['product_id'];
		$product_name = $row['product_name'];
		$category_id = $row['category_id'];
		$description = $row['description'];
		$unit_price = $row['unit_price'];
		
			echo '<div class="product-wrapper">';
			echo '	<form action=add_to_cart.php method=POST>';
			echo '		<div class="product-grid-product">';
			echo "			<img alt='product_id' src='images/$product_id' class='product-grid_img_2'/>";
			echo '		</div>';
			echo "		<div id='product_name' class='product-grid_name'> $product_name </div>";
			echo "		<div id='price' class='product-grid_price'>$unit_price AUD</div>";
			echo '		<div class="product-grid_extend-wrapper">';
			echo '			<div class="product-grid_extend">';
			echo "				<p class='product-grid-description'> $description <br/></p>";
			echo "				<input class='product-grid_btn product-grid_add-to-cart' type='submit' name='add' id='add' value='Add to Cart'/>";
			echo "				<input name='qty' value=1 type=hidden />";
			echo "				<input name=product_id id=$product_id value=$product_id type=hidden />";
			echo '			</div>';
			echo '		</div>';
			echo '	</div>';
			echo '	</form>';
		
	}
	
	if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}
	
	mysqli_close($link);
?>

		</div>
		</div>
	</body>
</html>