<?php 
session_start();
error_reporting(0);
ini_set('display_errors', 0);
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

	if (!empty($_SESSION['fname']) || !empty($_SESSION['lname']) || !empty($_SESSION['mnumber'])) {
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
							<div class="progress-bar" style="width: 50%">50%</div>
						</div>
						<div style="position: absolute; top: -2px; left: 0; margin-left: 49.5%; background-color: #000; border-radius: 180px; width: 16px; height: 15px; display: flex; align-items: center; justify-content: center; border: 2.5px solid #0D6EFD;">
							..
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="container text-start p-3">
							<div class="row">
								<h5 class="text-center">BILLING ADDRESS</h5>
								<div class="col-md-6">
								    <label class="form-label">First Name</label>
								    <input type="text" id="fname" class="form-control" value="<?php echo $_SESSION['fname']; ?>" disabled>
								</div>
								<div class="col-md-6">
								    <label class="form-label">Last Name</label>
								    <input type="text" id="lname" class="form-control" value="<?php echo $_SESSION['lname']; ?>" disabled>
								</div>
								<div class="col-md-6">
								    <label class="form-label">Mobile Number</label>
								    <input type="text" id="mnumber" class="form-control" value="<?php echo $_SESSION['mnumber']; ?>" disabled>
								</div>
								<div class="col-md-6">
								    <label class="form-label">Email</label>
								    <input type="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" disabled>
								</div>
								<div class="col-md-12">
								    <label class="form-label">Complete Address</label>
								    <input type="text" id="caddress" class="form-control" value="<?php echo $_SESSION['caddress']; ?>" disabled>
								</div>
								<div class="col-md-12 my-3">
								    <div class="w-50 mx-auto">
								    	<button class="btn btn-sm btn-outline-success py-1 w-100 rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" onclick="alt_address();">Add Alternative Address</button>
								    </div>
								</div>
							</div>
							<div class="collapse" id="collapseExample">
								<div class="card card-body border border-dark">
									<div class="row">
										<div class="col-md-12">
										    <label class="form-label">Alternative Address</label>
										    <input type="text" id="alt-address" class="form-control">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="container border border-dark text-start p-3">
							<h1 class="text-center bg-dark text-white">SALES INVOICE</h1>
							<h6 id="date"></h6>
							<h6>
								Seller: Saint Benedict Medallion
								<br>
								Address: Trece Martires City, Cavite
							</h6>
							<h6 class="m-0">Buyer: <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?></h6>
							<h6 class="m-0">Number: <?php echo $_SESSION['mnumber']; ?></h6>
							<h6>Email: <?php echo $_SESSION['email']; ?></h6>
							<h6>Address: <?php echo $_SESSION['caddress']; ?></h6>
							<h6 id="alternative_address"></h6>
							<div class="container" id="cart-container">
								<!-- dynamic -->
							</div>
						</div>
					</div>
				</div>
				<div class="row text-center p-3 gy-2">
					<div class="col-sm-12 col-md-6">
						<a href="cart.php" class="btn btn-sm btn-outline-danger rounded-pill w-75">Back</a>
					</div>
					<div class="col-sm-12 col-md-6">
						<a class="btn btn-sm btn-outline-success rounded-pill w-75" id="proceed">Proceed</a>
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
		<script type="text/javascript" src="js/checkout_order_summary.js"></script>
	</body>
</html>
<?php
	} else {
		    echo"<script>alert('Notice: There are some empty field in your profile, please fill it up to continue.');</script>";
		    $script = "<script>window.location = 'account.php';</script>";
		    echo $script;
	}
} else {
	echo"<script>var xlink = window.location.href;</script>";
	echo"<script>window.localStorage.setItem('xlink', xlink);</script>";
    echo"<script>alert('Notice: Please login to proceed.');</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>