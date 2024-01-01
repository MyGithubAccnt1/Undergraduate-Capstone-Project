<?php
session_start();
?>
<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="UTF-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	  	<meta name="description" content="In partial fulfilment of the requirements for the degree of Bachelor of Science in Information Technology">
	  	<meta name="keywords" content="capstone, project, thesis">
	  	<meta name="author" content="Mhel Voi A. Bernabe">
	  	<?php include('include/style.php') ?>
	  	<link rel="stylesheet" type="text/css" href="./css/slider.css">
		<style>
			header {
				background-color: rgba(0, 0, 0, 0.75);
			}
			.dropdown-menu {
				background-color: rgba(0, 0, 0, 0.75);
			}
			.cart-container {
				padding: 10px;
				height: 50vh;
				overflow-x: hidden;
				overflow-y: auto;
			}
			.cart-container > .row {
				border: 1px solid #000;
				border-style: none none solid none;
				padding: 5px;
				height: 50px;
			}
			.cart-container > .row:hover {
				background-color: rgba(0, 0, 0, 0.1);
			}
			.cart-container > .row > div {
				display: flex;
				align-items: center;
				justify-content: center;
				padding-inline: 10px;
			}
			.cart-container > .row > div:first-child {
				width: 8.25%;
			}
			.cart-img {
				height: 40px;
			}
			.cart-container > .row > div:nth-child(2) {
				width: 24.75%;
				justify-content: left;
			}
			.cart-container > .row > div:nth-child(3) {
				width: 24.75%;
				justify-content: left;
			}
			.cart-container > .row > div:nth-child(4) {
				width: 8.25%;
			}
			.cart-container > .row > div:nth-child(5) {
				width: 24.75%;
				justify-content: left;
			}
			.cart-container > .row > div:nth-child(6) {
				width: 8.25%;
			}
		</style>
	</head>
	<body>
		<main class="container-fluid p-0 m-0">
			<?php include('include/user_header.php') ?>
			<img src="" id="imagePreview" class="imagePreview" alt="Missing_Image">
			<section class="container py-5">
				<h1 class="mb-5">Cart</h1>
				<hr>
				<div class="row">
					<div class="container">
						<div class="cart-container" id="cart-container">
							<!-- dynamic -->
						</div>
					</div>
				</div>
				<div class="row mt-4">
					<div class="container d-flex align-items-center justify-content-evenly">
						<div class="w-100 text-center">
							<a href="checkout_order_summary.php" class="btn btn-sm btn-outline-success rounded-pill w-50">Checkout</a>
						</div>
						<div class="w-100 text-center">
							<a href="index.php" class="btn btn-sm btn-outline-danger rounded-pill w-50">Back</a>
						</div>
					</div>
				</div>
			</section>
			<section class="container py-5">
		    	<div class="row">
		    		<h1 class="mb-5">YOU MAY LIKE</h1>
		    		<hr class="m-0">
		    		<div class="col-12">
		    			<div class="carousel slide p-0" data-ride="carousel" data-interval="0"> 
		    				<div class="carousel-inner">
		    					<div class="item carousel-item active">
		    						<div class="row" id="product-container">
		    							<!-- dynamic -->
		    						</div>
		    					</div>
		    				</div>
		    			</div>
		    		</div>
		    	</div>
			</section>
			<?php include('include/user_footer.php') ?>
		</main>
		<script type="text/javascript">
			$(window).on('load', function() {
			  $(".loader").fadeOut('slow');
			  $(".sticky-top").fadeIn('slow');
			});
		</script>
		<script type="text/javascript" src="js/user_header.js"></script>
		<script type="text/javascript" src="js/cart.js"></script>
		<script type="text/javascript" src="js/image_hover.js"></script>
	</body>
</html>