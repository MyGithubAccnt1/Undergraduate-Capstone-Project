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
			<img src="" id="imagePreview" class="imagePreview" alt="Missing_Image">
			<section class="container py-5">
				<h2 class="mb-5">Customize Summary</h2>
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
								<div class="col-md-12 p-3" id="choose_address">
								    <label class="form-label">Choose Address:</label>
								    <div class="row border border-dark bg-white">
								    	
								    	<div class="col-11">
								    		<small style="font-style: italic;">Home Address</small>
								    		<p class="ms-5 ellipsis" style="font-style: italic;"><small><?php echo $_SESSION['address_1'] ?></small></p>
								    	</div>

								    	<div class="col-1 d-flex align-items-center justify-content-center">
								    		<input type="radio" name="address" value="<?php echo $_SESSION['address_1'] ?>" checked>
								    	</div>
								    </div>
								    <?php
								    	if (!empty($_SESSION['address_2'])) {
								    ?>
								    	<div class="row border border-dark bg-white" style="border-style: none solid solid solid !important;">
									    	
									    	<div class="col-11">
									    		<small style="font-style: italic;">Work Address</small>
									    		<p class="ms-5 ellipsis" style="font-style: italic;"><small><?php echo $_SESSION['address_2'] ?></small></p>
									    	</div>

									    	<div class="col-1 d-flex align-items-center justify-content-center">
									    		<input type="radio" name="address" value="<?php echo $_SESSION['address_2'] ?>">
									    	</div>
									    </div>
								    <?php
								    	}
								    ?>
								    <div class="row mt-3">

								    	<p class="d-inline-flex gap-1">
								    	  	<button class="btn btn-sm btn-success rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
									    	    Add an alternative address
								    	  	</button>
								    	</p>

								    	<div class="collapse" id="collapseExample">
								    	  	<div class="col-12" style="display: flex; flex-direction: column;">

	    		                            	<div class="w-100 d-flex justify-content-around">
	    			                                <small style="font-style: italic;">Alternative Address</small>
	    		                                    <button type="button" class="btn btn-sm rounded-0 btn-danger" onclick="location_api();" style="margin-left: auto;">
	    		        	                        	<small>Use my exact location</small>
	    		        	                        </button>
	    		                            	</div>

									    		<input type="text" name="alternative" class="p-2">
									    	</div>
								    	</div>
								    	
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="container border border-dark text-start p-3 bg-white">
							<h1 class="text-center bg-dark text-white">SALES INVOICE</h1>
							<h6 class="text-center">
								Saint Benedict Medallion
								<br>
								Trece Martires City, Cavite
								<br>
								<p id="date"></p>
							</h6>
							<h6 class="m-0 ellipsis" id="buyer">Buyer: <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?></h6>
							<h6 class="m-0 ellipsis">Number: <?php echo $_SESSION['mnumber']; ?></h6>
							<h6 class="m-0 ellipsis">Email: <?php echo $_SESSION['email']; ?></h6>
							<h6 class="ellipsis" id="address">Address: <?php echo $_SESSION['address_1']; ?></h6>
							<div class="container" id="cart-container">
								<!-- dynamic -->
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="container border border-dark text-start p-3 bg-white">
							<h1 class="text-center bg-dark text-white">ESTIMATION</h1>
							<div class="p-5">
								<h6 class="text-center text-danger">
									<b><small>THIS IS NOT A FIXED PRICE LIST</small></b>
								</h6>
								<h6>
									<small>LOGO SEAL</small>
								</h6>
								<h6><small class="ms-5">STANDARD SIZE - 18 inches</small></h6>
								<br>
								<h6>
									<small class="ms-5">STAINLESS ~ ₱25 per square inch</small>
								</h6>
								<h6><small class="ms-5">18 inches = 324 square inches</small></h6>
								<h6><small class="ms-5">324 square inches X ₱25 = ₱8,100</small></h6>
								<br>
								<h6><small class="ms-5">BRASS ~ ₱40 per square inch</small></h6>
								<h6><small class="ms-5">18 inches = 324 square inches</small></h6>
								<h6><small class="ms-5">324 square inches X ₱40 = ₱12,960</small></h6>
								<h6 class="text-center text-danger">
									<b><small>MESSAGE US IF YOU NEED A LARGER ONE</small></b>
								</h6>
								<h6><small>NECKLACE: </small></h6>
								<h6><small class="ms-5">ANY MATERIAL ~ ₱599.00</small></h6>
								<h6><small>TABLE NAMEPLATE: </small></h6>
								<h6><small class="ms-5">~ ₱2,800.00</small></h6>
								<h6 class="text-center text-danger">
									<b><small>WE GIVE GENEROUS DISCOUNTS</small></b>
								</h6>
								<h6 class="text-center text-danger">
									<b><small>JUST MESSAGE US AFTER FINALIZING YOUR ORDER</small></b>
								</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="row text-center p-3 gy-2">
					<div class="col-sm-12 col-md-6">
						<a href="customize.php" class="btn btn-sm btn-outline-danger rounded-pill w-75">Back</a>
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
		<script type="text/javascript" src="js/checkout_customize_summary.js"></script>
		<script type="text/javascript" src="js/image_hover.js"></script>
	</body>
</html>
<?php
	} else {
		echo"<script>var xlink = window.location.href;</script>";
		echo"<script>window.localStorage.setItem('xlink', xlink);</script>";
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