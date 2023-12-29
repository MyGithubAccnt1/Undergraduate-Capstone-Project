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
		<style>
			.bg {
		  		position: absolute;
		  		z-index: -1;
		  		top: 0;
		  		left: 0;
		  		height: 100vh;
		  		width: 100%;
		  		background-image: url('images/bg.gif');
		  		background-size: cover;
		  		background-repeat: no-repeat;
		  		filter: brightness(25%);
		  	}
		  	.main {
		  		position: absolute;
		  		top: 0;
		  		left: 0;
		  		height: 100vh;
		  		width: 100%;
				margin: 0;		  		
				padding: 0;
				display: flex;
				justify-content: center;
				align-items: center;
		  	}
		  	.hero-text {
		  		font-size: 3rem;
		  	}
		  	@media screen and (max-width: 768px) {
		  	    .main > .container {
		  	    	margin-top: 50px;
		  	    }
		  	    .main .hero-text {
		  	    	font-size: 2.5rem;
		  	    }
		  	}
		  	@media screen and (max-width: 425px) {
		  	    .main > .container {
		  	    	margin-top: 0px;
		  	    }
		  	    .main .hero-text {
		  	    	font-size: 2.4rem;
		  	    }
		  	}
		  	@media screen and (max-width: 375px) {
		  	    .main .hero-text {
		  	    	font-size: 2rem;
		  	    }
		  	}
		  	@media screen and (max-width: 320px) {
		  	    .main .hero-text {
		  	    	font-size: 1.75rem;
		  	    }
		  	}
		  	.sub {
		  		position: absolute;
		  		top: 100vh;
		  		left: 0;
		  		width: 100%;
		  		overflow-y: hidden;
		  		overflow-x: hidden;
		  	}
		  	.sub .why-container {
		  		overflow-x: hidden;
		  		overflow-y: hidden;
		  	}
		  	.sub .why-box {
		  		border: 1px solid #000;
		  		border-radius: 6px;
		  		display: flex;
		  		align-items: center;
		  		justify-content: start;
		  		flex-direction: column;
		  		gap: 20px;
		  		margin: 10px;
		  		padding: 20px 10px 10px 10px;
		  	}
		  	@media screen and (max-width: 1440px) {
		  		.why-box:nth-child(6) {
		  	        animation: slide6 5s linear infinite paused;
		  	    }
		  	    @keyframes slide6 {
		  	    	0% {
	  	          	    opacity: 1;
	          	  	}
  	          	  	20% {
	  	          	    transform: translateX(150%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	21% {
	  	          	    opacity: 0;
  	          	  	}
  	          	  	35% {
	  	          	    transform: translateX(-550%);
	  	          	    opacity: 0;
  	          	  	}
  	          	  	36% {
	  	          	    opacity: 1;
  	          	  	}
  	          	  	100% {
	  	          	    transform: translateX(0);
	  	          	    opacity: 1;
  	          	  	}
	  	        }
		  	    .why-box:nth-child(5) {
		  	        animation: slide5 5s linear infinite paused;
		  	    }
		  	    @keyframes slide5 {
	  	          	0% {
	  	          	    opacity: 1;
	          	  	}
  	          	  	20% {
	  	          	    transform: translateX(150%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	25% {
	  	          	    transform: translateX(250%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	26% {
	  	          	    opacity: 0;
  	          	  	}
  	          	  	40% {
	  	          	    transform: translateX(-510%);
	  	          	    opacity: 0;
  	          	  	}
  	          	  	41% {
	  	          	    opacity: 1;
  	          	  	}
  	          	  	100% {
	  	          	    transform: translateX(0);
	  	          	    opacity: 1;
  	          	  	}
	  	        }
		  	    .why-box:nth-child(4) {
		  	        animation: slide4 5s linear infinite paused;
		  	    }
		  	    @keyframes slide4 {
	  	          	0% {
	  	          	    opacity: 1;
	          	  	}
  	          	  	20% {
	  	          	    transform: translateX(150%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	25% {
	  	          	    transform: translateX(250%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	30% {
	  	          	    transform: translateX(350%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	31% {
	  	          	    opacity: 0;
  	          	  	}
  	          	  	45% {
	  	          	    transform: translateX(-470%);
	  	          	    opacity: 0;
  	          	  	}
  	          	  	46% {
	  	          	    opacity: 1;
  	          	  	}
  	          	  	100% {
	  	          	    transform: translateX(0);
	  	          	    opacity: 1;
  	          	  	}
	  	        }
	  	        .why-box:nth-child(3) {
		  	        animation: slide3 5s linear infinite paused;
		  	    }
		  	    @keyframes slide3 {
	  	          	0% {
	  	          	    opacity: 1;
	          	  	}
  	          	  	20% {
	  	          	    transform: translateX(150%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	25% {
	  	          	    transform: translateX(250%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	30% {
	  	          	    transform: translateX(350%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	35% {
	  	          	    transform: translateX(450%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	36% {
	  	          	    opacity: 0;
  	          	  	}
  	          	  	50% {
	  	          	    transform: translateX(-430%);
	  	          	    opacity: 0;
  	          	  	}
  	          	  	51% {
	  	          	    opacity: 1;
  	          	  	}
  	          	  	100% {
	  	          	    transform: translateX(0);
	  	          	    opacity: 1;
  	          	  	}
	  	        }
	  	        .why-box:nth-child(2) {
		  	        animation: slide2 5s linear infinite paused;
		  	    }
		  	    @keyframes slide2 {
	  	          	0% {
	  	          	    opacity: 1;
	          	  	}
  	          	  	20% {
	  	          	    transform: translateX(150%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	25% {
	  	          	    transform: translateX(250%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	30% {
	  	          	    transform: translateX(350%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	35% {
	  	          	    transform: translateX(450%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	40% {
	  	          	    transform: translateX(550%);
	  	          	    opacity: 1;
  	          	  	}
  	          	  	41% {
  	          	  		transform: translateX(600%);
	  	          	    opacity: 0;
  	          	  	}
  	          	  	55% {
	  	          	    transform: translateX(-390%);
	  	          	    opacity: 0;
  	          	  	}
  	          	  	56% {
	  	          	    opacity: 1;
  	          	  	}
  	          	  	100% {
	  	          	    transform: translateX(0);
	  	          	    opacity: 1;
  	          	  	}
	  	        }
		  	}
		  	@media screen and (max-width: 425px) {
		  		.sub .why-box {
		  	    	width: 75%;
		  	    }
		  	    .why-box:nth-child(2) {
		  	        transform: translateX(-100%);
		  	        animation: slideRight 1s linear forwards paused;
		  	    }
		  	    .why-box:nth-child(3) {
		  	        transform: translateX(-200%);
		  	        animation: slideRight 1.1s linear forwards paused;
		  	    }
		  	    .why-box:nth-child(4) {
		  	        transform: translateX(-300%);
		  	        animation: slideRight 1.2s linear forwards paused;
		  	    }
		  	    .why-box:nth-child(5) {
		  	        transform: translateX(-400%);
		  	        animation: slideRight 1.3s linear forwards paused;
		  	    }
		  	    .why-box:nth-child(6) {
		  	        transform: translateX(-500%);
		  	        animation: slideRight 1.4s linear forwards paused;
		  	    }
		  	    @keyframes slideRight {
	  	          	0% {
	  	          		
	  	          	}
	  	          	100% {
	  	            	transform: translateX(0);
	  	          	}
	  	        }
		  	}
		</style>
		<link rel="stylesheet" type="text/css" href="./css/slider.css">
		<link rel="stylesheet" type="text/css" href="./css/new_arrival.css">
	</head>
	<body>
		<main class="container-fluid p-0 m-0">
			<?php include('include/user_header.php') ?>
			<img src="" id="imagePreview" class="imagePreview" alt="Missing_Image">
			<section class="bg"></section>
			<section class="main">
				<div class="container">
					<div class="row text-white text-start justify-content-center">
						<div class="col-sm-12 col-md-8">
							<div class="container p-5">
								<h1 class="hero-text">The place for people who loves religious jewelry and fashion items.</h1>
								<br>
								<p class="d-block d-md-none d-lg-block">Our timeless designs are inspired by faith and nature, crafted with quality materials and love.</p>
							</div>
						</div>
						<div class="col-sm-12 col-md-4 d-none d-md-block">
							<?php
							if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
							?>
							<div class="container p-5">
								<p class="p-0">Thank you for choosing us. You are one of <?php include ('./php/get_user_count.php') ?> registered users as of today.</p>
							</div>
							<?php
							} else {
							?>
							<div class="container p-5">
								<p class="p-0 d-none d-lg-block">We are proud to have <?php include ('./php/get_user_count.php') ?> registered users as of today.</p>
								<p class="p-0">Don’t miss this opportunity to create your very own account.</p>
								<a class="m-0 p-0" href="signin.php">
									<button type="button" class="btn btn-outline-success py-1 m-0 rounded-0">REGISTER NOW FOR FREE</button>
								</a>
							</div>
							<?php
							}
							?>
						</div>
						<hr>
						<a href="#learn-more" class="w-50 btn btn-sm btn-outline-danger rounded-pill">Learn More</a>
					</div>
				</div>
			</section>
			<section class="sub" id="learn-more">

				<div class="container py-5">
					<div class="row d-flex justify-content-center text-center why-container">
						<h1 class="mb-5">Why Choose Us?</h1>
						<div class="col-md-2 why-box">
							<div>
								<i class="fas fa-shipping-fast fa-lg"></i>
							</div>
							<div style="display: flex; align-items: start;">
								<h5>Free Shipping</h5>
							</div>
						</div>
						<div class="col-md-2 why-box">
							<div>
								<i class="fas fa-handshake"></i>
							</div>
							<div>
								<h5>Big Discounts</h5>
							</div>
						</div>
						<div class="col-md-2 why-box">
							<div>
								<i class="fas fa-award"></i>
							</div>
							<div>
								<h5>Certified</h5>
							</div>
						</div>
						<div class="col-md-2 why-box">
							<div>
								<i class="fas fa-people-carry fa-lg"></i>
							</div>
							<div>
								<h5>Cash on Delivery</h5>
							</div>
						</div>
						<div class="col-md-2 why-box">
							<div>
								<i class="fas fa-clipboard-check"></i>
							</div>
							<div>
								<h5>Real-Time Updates</h5>
							</div>
						</div>
					</div>
				</div>

				<div class="container py-5">

					<div class="row">
						<div class="col-md-12 text-center">

							<h1 class="mb-5">Popular Products</h1>
							<div class="d-flex justify-content-start align-items-center">
								<div style="margin-right: 5px;">Category:</div>
	                    	    <select class="input" id="category">
	                    	    	<option value="Necklace">Necklace</option>
	                    	    	<option value="Logo">Logo Seal</option>
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

				</div>

				<div class="container py-5">

					<div class="row">

						<div class="col-md-12 text-center">
							<h1 class="mb-5">New Arrivals</h1>
						</div>

						<div class="container">
							<div class="slider">
							    <div class="rotator" id="new_arrival-container">
							    	<!-- dynamic -->
							    </div>
							</div>
						</div>

					</div>

				</div>

				<div class="container py-5">

					<div class="row">
						<div class="col-md-12 text-center">

							<h1 class="mb-5">Services</h1>

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
														<p>Your go-to for beautiful handmade necklaces. Choose from a selection of high-quality, one-of-a-kind pieces, or create your own design for a truly unique accessory.</p>
														<a href="#" class="btn">Learn More</a>
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
														<a href="#" class="btn">Learn More</a>
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
														<a href="#" class="btn">Learn More</a>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

				<div class="container py-5">

					<div class="row">

						<div class="col-md-12 text-center">
							<h1 class="mb-5">About Us</h1>
							<p>I'm the proud owner of Saint Benedict Medallion, a business in Trece Martires City that specializes in making and selling beautiful, unique necklaces. As a small business, I'm passionate about providing my customers with one-of-a-kind pieces that are as special and meaningful to them as they are to me. My necklaces are all handmade with care and attention to detail, using only the finest materials. I'm committed to create pieces that will last a lifetime, and I'm proud to say that the quality of my products speaks for itself. I'm always happy to work with my customers to create something special for them. I hope you'll come and visit my store soon - I'm sure you'll find something unique and beautiful that you'll love.</p>
						</div>

					</div>

				</div>

				<div class="container">

					<div class="row">
						<div class="col-md-12 text-center">
							<h1 class="mb-5">Location</h1>
							<iframe
				                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123734.56420033834!2d120.78699919463828!3d14.27041091980823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd806bdc892737%3A0x760e08400b4e91d8!2sTrece%20Martires%2C%20Cavite!5e0!3m2!1sen!2sph!4v1685830770393!5m2!1sen!2sph"
				                width="100%"
				                height="400"
				                style=""
				                allowfullscreen="false"
				                loading="lazy"
				                referrerpolicy="no-referrer-when-downgrade"
				            ></iframe>
						</div>
					</div>

				</div>

				<?php include('include/user_footer.php') ?>
				
			</section>
		</main>
		<script type="text/javascript">
			$(window).on('load', function() {
			  $(".loader").fadeOut('slow');
			});
		</script>
		<script type="text/javascript" src="js/user_header.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>
