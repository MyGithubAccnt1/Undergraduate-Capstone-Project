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
			.bg{
		  		position: absolute;
		  		z-index: -1;
		  		top: 0;
		  		left: 0;
				height: 100vh;
		  		width: 100%;
		  		background-image: url('images/bg.gif');
		  		background-size: cover;
		  		background-repeat: no-repeat;
		  		filter: brightness(30%);
		  		padding: 0;
		  		margin: 0;
		  		display: flex;
		  		align-items: center;
		  		justify-content: center;
		  	}
		  	.main {
		  		height: 100vh;
		  		width: 100%;
		  		display: flex;
			    justify-content: center;
			    align-items: center;
		  	}
			.verification-container {
				min-width: 320px;
			    width: 50%;
			    background-color: rgba(255, 255, 255, 0.1);
			    box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
			    border: 1px solid rgba(255, 255, 255, 0.5);
			    border-radius: 5px;
			    border-right: 1px solid rgba(255, 255, 255, 0.2);
			    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
			    backdrop-filter: blur(5px);
			    display: flex;
			    justify-content: center;
			    align-items: center;
			    color: #fff;
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
		<main class="container-fluid p-0 m-0">
			<section class="bg"></section>
			<section class="main">
				<div class="verification-container">
					<button type="button" class="verification-close btn-main py-1 my-3 w-25 rounded-pill">Back</button>
					<div class="w-75 py-5">
						<form action="" id="verify">
	  					    <div class="form-outline mt-4 mb-0">
	  					    	<input type="text" placeholder="Enter your verification code" class="form-control rounded-0" name="otp" required>
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
			});
		</script>
		<script type="text/javascript" src="js/forgot_verify.js"></script>
	</body>
</html>