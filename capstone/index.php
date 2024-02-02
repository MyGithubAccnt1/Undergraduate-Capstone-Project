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
	  	<link rel="stylesheet" type="text/css" href="./css/why_choose_us.css">
	  	<link rel="stylesheet" type="text/css" href="./css/slider.css">
		<link rel="stylesheet" type="text/css" href="./css/new_arrival.css">
		<style>
			.home-nav::before{
			    width: 100%;
			}
			.hero-section {
		  		position: absolute;
		  		z-index: -1;
		  		top: 0;
		  		left: 0;
		  		height: 100vh;
		  		width: 100%;
		  		background-image: url('images/bg.gif');
		  		background-size: cover;
		  		background-repeat: no-repeat;
		  		filter: brightness(35%);
		  	}
		  	.hero {
		  		height: calc(100vh - 50px);
				display: flex;
				justify-content: center;
				align-items: center;
		  	}
		</style>
	</head>
	<body>
		<main class="container-fluid p-0">
			<?php include('include/user_header.php') ?>
			<?php
			if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
			?>
			<section class="floating_chat_head" onclick="maximize_floating_chat();">
				<section class="floating_chat_body">
                    <button type="button" onclick="minimize_floating_chat();" class="bg-dark text-center text-white py-2 w-100 border-0">Chat with SBM</button>
                    <div id="support-container">
                    	<!-- dynamic -->
                    </div>
                    <form id="support-form">
                    	<div class="comment-area">
                    		<div class="bg-dark" style="display: flex; justify-content: center; align-items: center; flex-direction: row; margin: 0; padding: 0;">
                    			<div class="w-100 p-1">
                    				<textarea class="form-control rounded-pill" placeholder="Type your message here." rows="1" name="comment" required></textarea>
                    			</div>
                    			<div class="w-50 p-1 d-flex align-items-center">
                    				<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Send</button>
                    			</div>
                    		</div>
                    	</div>
                    </form>
				</section>
			</section>
			<?php
			}
			?>
			<img src="" id="imagePreview" class="imagePreview" alt="Missing_Image">
			<section class="hero-section"></section>
			<section class="hero container">
				<div class="row text-white text-start justify-content-center">
					<div class="col-sm-12 col-md-8">
						<div class="container">
							<h1>The place for people who loves religious jewelry and fashion items.</h1>
							<br>
							<p>Our timeless designs are inspired by faith and nature, crafted with quality materials and love.</p>
						</div>
					</div>
					<div class="col-sm-12 col-md-4 d-none d-md-block">
						<?php
						if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
						?>
						<div class="container">
							<p class="p-0">Thank you for choosing us. You are one of <?php include ('./php/get_user_count.php') ?> registered users as of today.</p>
						</div>
						<?php
						} else {
						?>
						<div class="container">
							<p class="d-none d-lg-block">We are proud to have <?php include ('./php/get_user_count.php') ?> registered users as of today.</p>
							<p>Don’t miss this opportunity to create your very own account.</p>
							<a href="signin.php">
								<button type="button" class="btn btn-md btn-success mt-5 rounded-0">REGISTER NOW FOR FREE</button>
							</a>
						</div>
						<?php
						}
						?>
					</div>
					<div class="container"><hr></div>
					<a href="#learn-more" class="w-50 btn btn-sm btn-danger rounded-pill">Learn More</a>
				</div>
			</section>
			<section class="container py-5" id="learn-more">
				<div class="row d-flex justify-content-center text-center why-container py-5">
					<h2 class="mb-5">Why Choose Us?</h2>
					<div class="col-md-2 why-box">
						<div>
							<i class="fas fa-shipping-fast fa-lg" style="height: 25px; width: 25px;"></i>
						</div>
						<div>
							<h5><small>Free Shipping</small></h5>
						</div>
					</div>
					<div class="col-md-2 why-box">
						<div>
							<i class="fas fa-handshake" style="height: 25px; width: 25px;"></i>
						</div>
						<div>
							<h5><small>Big Discounts</small></h5>
						</div>
					</div>
					<div class="col-md-2 why-box">
						<div>
							<i class="fas fa-award" style="height: 25px; width: 25px;"></i>
						</div>
						<div>
							<h5><small>Certified</small></h5>
						</div>
					</div>
					<div class="col-md-2 why-box">
						<div>
							<i class="fas fa-people-carry fa-lg" style="height: 25px; width: 25px;"></i>
						</div>
						<div>
							<h5><small>Cash on Delivery</small></h5>
						</div>
					</div>
					<div class="col-md-2 why-box">
						<div>
							<i class="fas fa-clipboard-check" style="height: 25px; width: 25px;"></i>
						</div>
						<div>
							<h5><small>Real-Time Updates</small></h5>
						</div>
					</div>
				</div>
			</section>
			<section class="container py-5">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="mb-5">Popular Products</h2>
						<div class="d-flex justify-content-start align-items-center">
							<div style="margin-right: 5px;">Category:</div>
                    	    <select class="input" id="category">
                    	    	<option value="Directory">Directory Marker</option>
                    	    	<option value="Necklace" selected>Necklace</option>
                    	        <option value="Pin">Pins</option>
                    	        <option value="Table">Table Nameplates</option>
                    	    </select>
						</div>
						<hr class="mt-2 mb-0 mx-0 p-0">
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
			<section class="container py-5">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="mb-5">New Arrivals</h2>
					</div>
					<div class="container" style="overflow-x: hidden;">
						<div class="slider">
						    <div class="rotator" id="new_arrival-container">
						    	<!-- dynamic -->
						    </div>
						</div>
					</div>
				</div>
			</section>
			<section class="container py-5">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="mb-5">Services</h2>
						<div class="carousel slide p-0" data-ride="carousel" data-interval="0"> 
							<div class="carousel-inner">
								<div class="item carousel-item active">
									<div class="row">

										<div class="col-sm-12 col-md-4">
											<div class="thumb-wrapper">
												<div class="img-box">
													<img src="images/delivery.jpg" class="img-responsive" alt="Missing Image">
													<input type="hidden" name="image" value="images/delivery.jpg">
												</div>
												<div class="thumb-content">
													<h5>Nation Wide Delivery</h5>
													<p>Your go-to for beautiful handmade necklaces. Choose from a selection of high-quality, one-of-a-kind pieces.</p>
													<a href="necklace.php" class="btn">Order Now</a>
												</div>
											</div>
										</div>

										<div class="col-sm-12 col-md-4">
											<div class="thumb-wrapper">
												<div class="img-box">
													<img src="images/cross.png" class="img-responsive" alt="Missing Image">
													<input type="hidden" name="image" value="images/cross.png">
												</div>
												<div class="thumb-content">
													<h5>Customization</h5>
													<p>Offering customers the opportunity to personalize the design of their chosen product.</p>
													<a href="customize.php" class="btn">Learn More</a>
												</div>
											</div>
										</div>

										<div class="col-sm-12 col-md-4">
											<div class="thumb-wrapper">
												<div class="img-box">
													<img src="images/clean.jpg" class="img-responsive" alt="Missing Image">
													<input type="hidden" name="image" value="images/clean.jpg">
												</div>
												<div class="thumb-content">
													<h5>Cleaning & Maintenance</h5>
													<p>Providing customers with a professional cleaning and maintenance service for their necklaces.</p>
													<button type="button" onclick="maximize_floating_chat();" class="btn">Message Us</button>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="container py-5">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="mb-5">About Us</h2>
						<p>I'm the proud owner of Saint Benedict Medallion, a business in Trece Martires City that specializes in making and selling beautiful, unique necklaces. As a small business, I'm passionate about providing my customers with one-of-a-kind pieces that are as special and meaningful to them as they are to me. My necklaces are all handmade with care and attention to detail, using only the finest materials. I'm committed to create pieces that will last a lifetime, and I'm proud to say that the quality of my products speaks for itself. I'm always happy to work with my customers to create something special for them. I hope you'll come and visit my store soon - I'm sure you'll find something unique and beautiful that you'll love.</p>
					</div>
				</div>
			</section>
			<section class="container py-5">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="mb-5">Location</h2>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6242.9620110606675!2d120.8525477349758!3d14.276026010202813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd81b44ee6817f%3A0x99dbeb82e2e88a1b!2sUNO!5e1!3m2!1sen!2sph!4v1705042739806!5m2!1sen!2sph" width="100%" height="400" style="border: none;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</section>
			<?php include('include/user_footer.php') ?>
		</main>
		<script type="text/javascript">
			$(window).on('load', function() {
			  	$(".loader").fadeOut('slow');
			  	$(".sticky-top").fadeIn('slow');
			  	$('.floating_chat_head').fadeIn('slow');
			});
		</script>
		<script type="text/javascript" src="js/custom_user_header.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/image_hover.js"></script>
		<script type="text/javascript" src="js/support.js"></script>
	</body>
</html>