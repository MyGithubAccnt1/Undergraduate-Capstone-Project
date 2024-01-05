<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
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
		</style>
	</head>
	<body>
		<main class="container-fluid p-0">
			<?php include('include/user_header.php') ?>
			<img src="" id="imagePreview" class="imagePreview" alt="Missing_Image">
			<section class="container py-5">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="mb-5">Customize</h1>
						<div class="container">
							<div class="row">
								<div class="col-6 d-flex align-items-center justify-content-start" style="overflow-x: hidden;">
									<div style="margin-right: 5px;">Filter:</div>
									<select class="input" id="filter">
										<option value="Logo">Logo Seal</option>
										<option value="Necklace">Necklace</option>
										<option value="Pins">Pins</option>
										<option value="Table">Table Nameplate</option>
									</select>
								</div>
								<div class="col-6 d-flex align-items-center justify-content-end">
									<a href="create_customize.php" class="btn btn-sm btn-outline-success rounded-0">+ Create</a>
								</div>
							</div>
						</div>
						<hr class="mt-2 mb-0">
						<div class="carousel slide p-0" data-ride="carousel" data-interval="0"> 
							<div class="carousel-inner">
								<div class="item carousel-item active">
									<div class="row" id="product-container">
										<!-- dynamic -->
									</div>
									<div>
										<button class="btn btn-sm btn-outline-dark rounded-0" id="prev">< Prev</button>
										<button class="btn btn-sm btn-outline-dark rounded-0" id="next">Next ></button>
									</div>
								</div>
							</div>
						</div>
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
		<script type="text/javascript" src="js/customize.js"></script>
		<script type="text/javascript" src="js/image_hover.js"></script>
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