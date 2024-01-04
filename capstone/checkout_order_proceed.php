<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
	error_reporting(0);
	ini_set('display_errors', 0);
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
		<style>
			header {
				background-color: rgba(0, 0, 0, 1.0);
			}
			.dropdown-menu {
				background-color: rgba(0, 0, 0, 1.0);
			}
			input {
				margin-bottom: 15px;
			}
			.checkout-options {
				display: flex;
				justify-content: space-evenly;
				align-items: center;
				flex-direction: row;
			}
		</style>
	</head>
	<body>
		<main class="container-fluid p-0">
			<?php include('include/user_header.php') ?>
			<section class="container py-5">
				<h2 class="mb-5">Order Summary</h2>
				<hr>
				<div class="row mt-3">
					<div class="col-12" style="position: relative;">
						<div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height: 12px;">
							<div class="progress-bar" style="width: 100%">100%</div>
						</div>
						<div style="position: absolute; top: -2px; left: 0; margin-left: 98%; background-color: #000; border-radius: 180px; width: 16px; height: 15px; display: flex; align-items: center; justify-content: center; border: 2.5px solid #0D6EFD;">
							..
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-7">
						<div class="container text-start p-3">
							<div class="row">
								<h5 class="text-center">PAYMENT METHOD</h5>
								<div class="col-md-6">
								    <input type="radio" id="cod" value="Cash On Delivery" checked>
	                                <label for="cod">Cash On Delivery</label>
                                </div>
                                <div class="col-md-12">
                                <p>We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this <a href="https://www.freeprivacypolicy.com/live/e89caaee-d937-4d6e-bcde-c47ca892ee3b" target="_blank">Privacy Policy</a>.</p>
                                </div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-5 p-3">
						<div class="container border border-dark text-start p-3">
							<h5 class="text-center">SALES INVOICE</h5>
							<p class="text-end" id="date"></p>
							<p>
								Seller: Saint Benedict Medallion
								<br>
								Address: Trece Martires City, Cavite
							</p>
							<p class="m-0">Buyer: <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?></p>
							<p class="m-0">Number: <?php echo $_SESSION['mnumber']; ?></p>
							<p>Email: <?php echo $_SESSION['email']; ?></p>
							<p>Address: <?php echo $_SESSION['caddress']; ?></p>
							<p id="alternative_address"></p>
							<p>Mode: COD</p>
							<div class="container" id="cart-container">
								<!-- dynamic -->
							</div>
						</div>
					</div>
				</div>
				<div class="row text-center p-3 gy-2">
					<div class="col-sm-12 col-md-6">
						<a class="btn btn-sm btn-outline-success rounded-pill w-75" id="proceed">Proceed</a>
					</div>
					<div class="col-sm-12 col-md-6">
						<a href="checkout_order_summary.php" class="btn btn-sm btn-outline-danger rounded-pill w-75">Back</a>
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
		<script type="text/javascript" src="js/checkout_order_proceed.js"></script>
	</body>
</html>
<?php 
}else{
	echo"<script>var xlink = window.location.href;</script>";
	echo"<script>window.localStorage.setItem('xlink', xlink);</script>";
    echo"<script>alert('Notice: Please login to proceed.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>