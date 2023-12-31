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
		<style>
			.main {
				position: absolute;
				top: 0;
				left: 0;
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100vh;
				overflow: hidden;
				display: flex;
				flex-direction: column;
			}
			.main > div:first-child, .main > div:nth-child(3) {
				display: flex;
				align-items: center;
				justify-content: space-evenly;
				height: auto;
			}
			.main > div:nth-child(3) {
				padding: 15px 0;
			}
			.main > div:first-child > h1 {
				margin: 0;
				padding: 10px 0;
			}
			.main > div:nth-child(2) {
				border: 1px solid #000;
				flex: auto;
				height: 75%;
			}
			.cart-container {
				padding: 10px;
				height: 100%;
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
			<img src="" id="imagePreview" class="imagePreview" alt="Missing_Image">
			<section class="main">

				<div class="container">
					<h1>Cart</h1>
				</div>

				<div class="container">
					<div class="cart-container" id="cart-container">
						<!-- dynamic -->
					</div>
				</div>

				<div class="container">
					<div class="w-100 text-center">
						<a href="checkout_order_summary.php" class="btn btn-sm btn-outline-success rounded-pill w-50">Checkout</a>
					</div>
					<div class="w-100 text-center">
						<a href="index.php" class="btn btn-sm btn-outline-danger rounded-pill w-50">Back</a>
					</div>
				</div>

			</section>
		</main>
		<script type="text/javascript" src="js/cart.js"></script>
	</body>
</html>