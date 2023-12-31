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
				background-color: #000;
			}
			.dropdown-menu {
				background-color: #000;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="./css/slider.css">
	</head>
	<body>
		<main class="container-fluid p-0 m-0">
			<?php include('include/user_header.php') ?>
			<section>
				<div class="container py-5">

					<div class="row">
						<div class="col-md-12 text-center">

							<h1 class="mb-5">Necklace</h1>
							<div class="d-flex justify-content-start align-items-center">
								<div style="margin-right: 5px;">Filter:</div>
	                    	    <select class="input" id="filter">
	                    	    	<option value="None">None</option>
	                    	    	<option value="Price">Price</option>
	                    	    </select>
							</div>
							<hr class="mt-2 mb-0 mx-0 p-0">

							<div class="container mt-2 px-5 border border-black" id="price" style="display: none; padding-block: 5px; background-color: rgba(0, 0, 0, 0.1);">
								<p class="text-start m-0" id="min-text">Min price: PHP 0</p>
								<input type="range" class="form-range" min="0" max="999" id="min-price" step="1" value="0">
								<input type="range" class="form-range" min="1" max="1000" id="max-price" step="1" value="1000">
								<p class="text-start m-0" id="max-text">Max price: PHP 1000</p>
							</div>

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

				</div>
			</section>
			<?php include('include/user_footer.php') ?>
		</main>
		<script type="text/javascript">
			$(window).on('load', function() {
			  	$(".loader").fadeOut('slow');
			  	window.localStorage.setItem('page', '0');
			});
		</script>
		<script type="text/javascript" src="js/user_header.js"></script>
		<script type="text/javascript" src="js/ph-address-selector.js"></script>
		<script type="text/javascript" src="js/necklace.js"></script>
	</body>
</html>