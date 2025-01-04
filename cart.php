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
				background-color: rgba(0, 0, 0, 1.0);
			}
			.dropdown-menu {
				background-color: rgba(0, 0, 0, 1.0);
			}
			.cart-nav::before{
			    width: 100%;
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
				overflow: hidden;
			}
			.cart-container > .row:not(:first-child):hover {
			    background-color: rgba(0, 0, 0, 0.1);
			}
			.cart-container > .row > div {
				display: flex;
				align-items: top;
				justify-content: center;
				padding-inline: 10px;
			}
			.cart-container > .row > div:first-child {
				width: 8.25%;
			}
			.cart-img {
				margin-top: 3px;
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
				margin-top: 3px;
			}
		</style>
	</head>
	<body>
		<main class="container-fluid p-0">
			<?php include('include/user_header.php') ?>
			<img src="" id="imagePreview" class="imagePreview" alt="Missing_Image">
			<section class="container py-5">
				<h2 class="mb-5">Cart</h2>
				<hr>
				<div class="row">
					<div class="container">
						<div class="cart-container" id="cart-container">
							<!-- dynamic -->
						</div>
					</div>
				</div>
				<div class="row text-center p-3 gy-2">
					<div class="col-sm-12 col-md-6">
						<a href="index.php" class="btn btn-sm btn-outline-danger rounded-pill w-75">Back</a>
					</div>
					<div class="col-sm-12 col-md-6">
						<a href="checkout_order_summary.php" class="btn btn-sm btn-outline-success rounded-pill w-75">Checkout</a>
					</div>
				</div>
			</section>
			<section class="container py-5">
		    	<div class="row">
		    		<div class="col-12">
		    			<h2 class="m-0"><small>YOU MAY LIKE</small></h2>
		    			<hr class="mt-2 mb-0">
		    			<div class="carousel slide p-0" data-ride="carousel" data-interval="0"> 
		    				<div class="carousel-inner">
		    					<div class="item carousel-item active">
		    						<div class="row" id="you_may_like-container">
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