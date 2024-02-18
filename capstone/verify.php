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
		  		filter: brightness(25%);
		  	}
		  	.hero {
		  		height: calc(100vh - 50px);
				display: flex;
				justify-content: center;
				align-items: center;
		  	}
		  	.hero > .row {
		  		min-width: 320px;
		  		width: 50%;
		  		padding: 50px 25px;

		  		background-color: rgba(255, 255, 255, 0.1);
			    box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
			    border: 1px solid rgba(255, 255, 255, 0.5);
			    border-radius: 5px;
			    border-right: 1px solid rgba(255, 255, 255, 0.2);
			    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
			    backdrop-filter: blur(5px);
		  	}
			.verification-close {
				position: absolute;
				top: 0;
				left: 0;
				margin: 10px 0 0 15px;
			}
		</style>
	</head>
	<body>
		<section class="loader"></section>
		<main class="container-fluid p-0">
			<section class="hero-section"></section>
			<section class="hero container">
				<div class="row">
					<button type="button" class="verification-close btn-main py-1 my-3 w-25 rounded-pill">Back</button>
					<div class="col-md-12 py-5">
						<form action="" id="verify">
	  					    <div class="form-outline mt-4 mb-0">
	  					    	<input type="text" placeholder="Enter Verification Code" class="form-control rounded-0" name="otp" required>
	  					    </div>
		    	  			<div class="d-flex justify-content-center">
		    	  			  	<button type="submit" class="btn-main py-1 mt-3 w-100 rounded-pill">Confirm</button>
		    	  			</div>
						</form>
					</div>
				</div>
			</section>
		</main>
		<script type="text/javascript">
			$(window).on('load', function() {
			  $(".loader").fadeOut('slow');
			  $('#verify').find("input[name='otp']").focus();
			});
		</script>
		<script type="text/javascript" src="js/verify.js"></script>
	</body>
</html>