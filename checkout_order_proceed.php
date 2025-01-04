<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

	if (!empty($_SESSION['fname']) && !empty($_SESSION['lname']) && !empty($_SESSION['mnumber']) && !empty($_SESSION['address_1'])) {
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
			.ellipsis {
				text-overflow: ellipsis;
				overflow: hidden;
			}
		</style>
	</head>
	<body>
		<main class="container-fluid p-0">
			<?php include('include/user_header.php') ?>
			<img src="" id="guide" style="display: none; position: absolute; z-index: 3;">
			<section class="container py-5">
				<h2 class="mb-5">Order Summary</h2>
				<hr>
				<div class="row mt-3">
					<div class="col-12" style="position: relative;">
						<div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height: 12px;">
							<div class="progress-bar" style="width: 100%">100%</div>
						</div>
						<div style="position: absolute; top: -2px; right: 0; margin-right: 1%; background-color: #000; border-radius: 180px; width: 16px; height: 15px; display: flex; align-items: center; justify-content: center; border: 2.5px solid #0D6EFD;">
							..
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="container text-start p-3">
							<div class="row">
								<h5 class="text-center">PAYMENT METHOD</h5>
								<div class="col-12">
									<div class="row">
										<div class="col-12 text-start">
											<input type="radio" checked>
											<label><small><b>Gcash</b></small></label>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 text-center p-1">
											<div class="border border-dark p-4 bg-white">
												<input type="radio" id="full-payment" checked>
												<label class="full-payment">
													<button style="background-color: inherit; border: none;">
														<small>
															<b>Full Payment</b>
														</small>
													</button>
												</label>
												<div style="display: none; height: 0; transition: height 0.5s linear;" id="fp-display">
													<div class="row">
														<div class="col-sm-12 col-md-6 col-lg-6 mx-auto my-auto">
															<h6 class="text-start mb-1"><small>Name: <b>JE●●●●●N L.</b></small></h6>
															<h6 class="text-start mb-1"><small>Mobile Number: 0967 395 6545</small></h6>
															<h6 class="text-start mb-1"><small>Amount: ₱<span id="full-amount"></span></small></h6>
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6 mx-auto my-1 text-center">
															<img src="images/gcash.png" class="img-fluid border border-dark" alt="X">
														</div>
													</div>
													<p class="text-center text-danger"><b><small>Your order would take up to 3-7 working days.</small></b></p>
													<p class="text-start"><small>Upload your Gcash proof of payment via:</small></p>
													<p class="text-start">
														<small><span class="text-danger">* </span>IMAGE</small>
							                            <button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2 image_guide" style="height: 30px; width: 30px;">
								                        	<small>?</small>
								                        </button>
													</p>
													<div class="row">
														<div class="col-sm-12 col-md-6 col-lg-6">
															<small><input type="file" id="gcashfp_image" accept="image/*"></small>
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6">
															<img src="" id="uploaded_gcashfp_image" class="img-fluid">
														</div>
													</div>
													<p class="text-center"><small>OR</small></p>
													<p class="text-start">
														<small><span class="text-danger">* </span>TEXT</small>
							                            <button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2 text_guide" style="height: 30px; width: 30px;">
								                        	<small>?</small>
								                        </button>
													</p>
													<small><textarea class="w-50" type="text" rows="5" style="resize: none;" id="gcashfp_text"></textarea></small>
												</div>
											</div>
										</div>
										<div class="col-sm-12 col-md-6 col-lg-6 text-center p-1">
											<div class="border border-dark p-4 bg-white">
												<input type="radio" id="down-payment">
												<label class="down-payment">
													<button style="background-color: inherit; border: none;">
														<small>
															<b>Down Payment 50%</b>
														</small>
													</button>
												</label>
												<div style="display: none; height: 0; transition: height 0.5s linear;" id="dp-display">
													<div class="row">
														<div class="col-sm-12 col-md-6 col-lg-6 mx-auto my-auto">
															<h6 class="text-start mb-1"><small>Name: <b>JE●●●●●N L.</b></small></h6>
															<h6 class="text-start mb-1"><small>Mobile Number: 0967 395 6545</small></h6>
															<h6 class="text-start mb-1"><small>Amount: ₱<span id="down-amount"></span></small></h6>
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6 mx-auto my-1 text-center">
															<img src="images/gcash.png" class="img-fluid border border-dark" alt="X">
														</div>
													</div>
													<p class="text-center text-danger"><b><small>Your order will be delivered once you have fully paid.</small></b></p>
													<p class="text-start"><small>Upload your Gcash proof of payment via:</small></p>
													<p class="text-start">
														<small><span class="text-danger">* </span>IMAGE:</small>
														<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2 image_guide" style="height: 30px; width: 30px;">
								                        	<small>?</small>
								                        </button>
													</p>
													<div class="row">
														<div class="col-sm-12 col-md-6 col-lg-6">
															<small><input type="file" id="gcashdp_image" accept="image/*"></small>
														</div>
														<div class="col-sm-12 col-md-6 col-lg-6">
															<img src="" id="uploaded_gcashdp_image" class="img-fluid">
														</div>
													</div>
													<p class="text-center"><small>OR</small></p>
													<p class="text-start">
														<small><span class="text-danger">* </span>TEXT:</small>
							                            <button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2 text_guide" style="height: 30px; width: 30px;">
								                        	<small>?</small>
								                        </button>
													</p>
													<small><textarea class="w-50" type="text" rows="5" style="resize: none;" id="gcashdp_text"></textarea></small>
												</div>
											</div>
										</div>
									</div>
								</div>
                                <div class="col-12 px-5 mt-3">
                                <p>We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this <a href="privacypolicy.php" target="_blank">Privacy Policy</a>.</p>
                                </div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
						<div class="container border border-dark text-start p-3 bg-white">
							<h1 class="text-center bg-dark text-white">SALES INVOICE</h1>
							<h6 class="text-center"><small>
								Saint Benedict Medallion
								<br>
								Trece Martires City, Cavite
								<br>
								<p id="date"></p></small>
							</h6>
							<h6 class="m-0 ellipsis" id="buyer"><small>Buyer: <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?></small></h6>
							<h6 class="m-0 ellipsis"><small>Number: <?php echo $_SESSION['mnumber']; ?></small></h6>
							<h6 class="m-0 ellipsis"><small>Email: <?php echo $_SESSION['email']; ?></small></h6>
							<h6 class="m-0 ellipsis"><small id="address"></small></h6>
							<h6 class="ellipsis"><small id="payment">Payment Method: Gcash / <span id="method"></span></small></h6>
							<div class="container" id="cart-container">
								<!-- dynamic -->
							</div>
						</div>
					</div>
				</div>
				<div class="row text-center p-3 gy-2">
					<div class="col-sm-12 col-md-6">
						<a href="checkout_order_summary.php" class="btn btn-sm btn-outline-danger rounded-pill w-75">Back</a>
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
		<script type="text/javascript" src="js/checkout_order_proceed.js"></script>
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