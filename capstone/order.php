<?php
session_start();
?>
<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="UTF-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
		<link rel="icon" type="image/x-icon" href="images/favicon.ico">
		<link rel="manifest" href="images/site.webmanifest">
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
			.order-container {
				padding: 10px;
				height: 50vh;
				overflow-x: hidden;
				overflow-y: auto;
			}
			.order-container > .row {
				border: 1px solid #000;
				border-style: none none solid none;
				padding: 5px;
				height: 50px;
				overflow: hidden;
			}
			.order-container > .row:not(:nth-child(2)):hover {
			    background-color: rgba(0, 0, 0, 0.1);
			}
			.order-container > .row > div {
				display: flex;
				align-items: top;
				justify-content: center;
				padding-inline: 10px;
			}
			.order-container > .row > div:first-child {
				width: 25%;
				justify-content: left;
			}
			.order-container > .row > div:nth-child(2) {
				width: 25%;
				justify-content: left;
			}
			.order-container > .row > div:nth-child(3) {
				width: 25%;
			}
			.order-container > .row > div:nth-child(4) {
				width: 25%;
			}
			.collapse {
				background-color: rgba(255, 255, 255, 0.9);
			}
			.custom-collapse {
	            transition: height 0.5s linear;
	            overflow: hidden;
	            height: 0;
	        }
	        .custom-collapse.show {
	            height: auto;
	        }
			.collapse > .container {
				border: 1px solid #000;
				border-style: none solid solid solid;
				padding-bottom: 10px;
			}
			.cart-container > .row {
				border: 1px solid #000;
				border-style: none none solid none;
				padding: 5px;
				height: 50px;
				overflow: hidden;
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
				width: 16.50%;
			}
			.cart-container > .row > div:nth-child(5) {
				width: 24.75%;
				justify-content: left;
			}
			.card {
			    box-shadow: 5px 6px 6px 2px #e9ecef;
			    border-radius: 4px;
			}
			.comment-area textarea{
			    resize: none; 
			    border: 1px solid #000;
			}
			.ellipsis {
				text-overflow: ellipsis;
				overflow: hidden;
			}
		</style>
	</head>
	<body>
		<main class="container-fluid p-0">
			<?php include('include/user_header.php') ?>
			<img src="" id="imagePreview" class="imagePreview" alt="Missing_Image">
			<section class="container py-5">
				<h2 class="mb-5">My Orders</h2>
				<hr>
				<div class="row">
					<div class="container">
						<div class="order-container" id="order-container">
							<!-- dynamic -->
						</div>
					</div>
				</div>
				<div class="row text-center p-3 gy-2">
					<div class="col-sm-12 col-md-6">
						
					</div>
					<div class="col-sm-12 col-md-6">
						<a href="index.php" class="btn btn-sm btn-outline-danger rounded-pill w-75">Back</a>
					</div>
				</div>
			</section>
			<section class="container py-5">
		    	<div class="row">
		    		<div class="col-12">
		    			<h1 class="m-0">YOU MAY LIKE</h1>
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
		<script type="text/javascript" src="js/order.js"></script>
		<script type="text/javascript" src="js/image_hover.js"></script>
	</body>
</html>