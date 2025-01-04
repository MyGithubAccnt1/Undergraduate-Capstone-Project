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
		<link rel="stylesheet" type="text/css" href="./css/slider.css">
		<style>
			header {
				background-color: rgba(0, 0, 0, 1.0);
			}
			.dropdown-menu {
				background-color: rgba(0, 0, 0, 1.0);
			}
			.necklace-nav::before{
			    width: 75%;
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
                    <button type="button" onclick="minimize_floating_chat();" class="bg-dark text-center text-white py-2 w-100 border-0">Customer Support</button>
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
                    				<button type="submit" class="btn btn-sm btn-danger py-1 w-100 rounded-pill">Send</button>
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
			<section class="container py-5">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="mb-5">NECKLACE</h2>
						<div class="d-flex justify-content-start align-items-center">
							<div style="margin-right: 5px;">Filter:</div>
							<select class="input" id="filter">
								<option value="None">None</option>
								<option value="Price">Price</option>
							</select>
						</div>
						<hr class="mt-2 mb-0">

						<div class="container mt-2 px-5 border border-black" id="price" style="display: none; padding-block: 5px;">
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="container py-5">
		    	<div class="row">
		    		<div class="col-12">
		    			<h2 class="m-0"><small>YOU MAY LIKE</small></h2>
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
			  	window.localStorage.setItem('page', '0');
			  	$('.floating_chat_head').fadeIn('slow');
			});
		</script>
		<script type="text/javascript" src="js/user_header.js"></script>
		<script type="text/javascript" src="js/necklace.js"></script>
		<script type="text/javascript" src="js/image_hover.js"></script>
		<script type="text/javascript" src="js/support.js"></script>
	</body>
</html>