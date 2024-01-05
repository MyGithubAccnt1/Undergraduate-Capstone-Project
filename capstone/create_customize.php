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
		<style>
			.custom-collapse {
	            transition: height 0.5s linear;
	            overflow: hidden;
	            height: 0;
	        }
	        .custom-collapse.show {
	            height: auto;
	        }
			.left {
				height: 80vh;
				overflow: hidden;
			}
			.left > div {
				height: 80vh;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			.right {
				height: 80vh;
				overflow: hidden;
			}
			.right > div {
				height: 80vh;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			.canvas-size {
				border: 1px solid #fff;
				padding: 0;
				overflow: hidden;
			}
			.comment-area textarea{
			    resize: none; 
			    border: 1px solid #000;
			}
		</style>
	</head>
	<body>
		<section class="loader"></section>
		<main class="container-fluid p-0 bg-dark">
			<section class="container">
				<div class="row text-white text-center">
					<div class="col-md-6 left">

						<div id="1">

							<div class="row gy-3 py-5">
								<div class="col-6 d-flex justify-content-start">
									<a href="customize.php" class="btn btn-outline-light rounded-0 w-50">Back</a>
								</div>
								<h1 class="mb-3">Select Product</h1>
								<hr>
								<div class="col-12">
									<button type="button" id="logo_seal" class="btn btn-outline-light rounded-0 w-50">Logo Seal</button>
								</div>
								<div class="col-12">
									<button type="button" id="necklace" class="btn btn-outline-light rounded-0 w-50">Necklace</button>
								</div>
								<div class="col-12">
									<button type="button" id="pins" class="btn btn-outline-light rounded-0 w-50">Pins</button>
								</div>
								<div class="col-12">
									<button type="button" id="table_nameplate" class="btn btn-outline-light rounded-0 w-50">Table Nameplate</button>
								</div>
							</div>

						</div>

						<div id="2">

							<div class="custom-collapse collapse py-5" id="logo_seal_material">
							  	<div class="row gy-3">
							  		<div class="col-md-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 reset">Reset</button>
							  		</div>
									<h1 class="mb-3">Select Material</h1>
									<hr>
									<div class="col-md-12">
										<button type="button" id="logo_seal_gold" class="btn btn-outline-light rounded-0 w-50">Gold</button>
									</div>
									<div class="col-md-12">
										<button type="button" id="logo_seal_silver" class="btn btn-outline-light rounded-0 w-50">Silver</button>
									</div>
									<div class="col-md-12">
										<button type="button" id="logo_seal_bronze" class="btn btn-outline-light rounded-0 w-50">Bronze</button>
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_material">
							  	<div class="row gy-3">
							  		<div class="col-md-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 reset">Reset</button>
							  		</div>
									<h1 class="mb-3">Select Material</h1>
									<hr>
									<div class="col-md-12">
										<button type="button" id="necklace_gold" class="btn btn-outline-light rounded-0 w-50">Gold</button>
									</div>
									<div class="col-md-12">
										<button type="button" id="necklace_silver" class="btn btn-outline-light rounded-0 w-50">Silver</button>
									</div>
									<div class="col-md-12">
										<button type="button" id="necklace_bronze" class="btn btn-outline-light rounded-0 w-50">Bronze</button>
									</div>
								</div>
							</div>

						</div>

						<div id="3">

							<div class="custom-collapse collapse py-5" id="logo_seal_shape">
							  	<div class="row gy-3">
							  		<div class="col-md-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 reset">Reset</button>
							  		</div>
									<h1 class="mb-3">Select Shape</h1>
									<hr>
									<div class="col-md-12">
										<button type="button" id="logo_seal_circle" class="btn btn-outline-light rounded-0 w-50">Circle</button>
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_shape">
							  	<div class="row gy-3">
							  		<div class="col-md-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 reset">Reset</button>
							  		</div>
									<h1 class="mb-3">Select Shape</h1>
									<hr>
									<div class="col-md-12">
										<button type="button" id="necklace_cross" class="btn btn-outline-light rounded-0 w-50">Cross</button>
									</div>
								</div>
							</div>

						</div>

						<div id="4">

							<div class="custom-collapse collapse py-5" id="logo_seal_logo">
							  	<div class="row gy-3">
							  		<div class="col-md-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 reset">Reset</button>
							  		</div>
									<h1 class="mb-3">Select Logo</h1>
									<hr>
									<div class="col-md-12">
										<input class="options" type="file" id="logo_seal_image" accept="image/png">
									</div>
								</div>
							</div>

						</div>

						<div id="5">

							<div class="custom-collapse collapse py-5" id="logo_seal_company">
							  	<div class="row gy-3">
							  		<div class="col-md-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 reset">Reset</button>
							  		</div>
									<h1 class="mb-3">Insert Company</h1>
									<hr>
									<div class="col-md-12">
										<form id="logo_seal_company_form">
										    <div class="comment-area">
										        <div class="bg-dark" style="display: flex; justify-content: center; align-items: center; flex-direction: row; margin: 0; padding: 0;">
										            <div class="w-100 p-1">
										                <textarea class="form-control rounded-pill" placeholder="Type your company here." rows="1" name="company"></textarea>
										            </div>
										            <div class="w-50 p-1 d-flex align-items-center">
										                <button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Done</button>
										            </div>
										        </div>
										    </div>
										</form>
									</div>
								</div>
							</div>

						</div>

					</div>
					<div class="col-md-6 right py-5">
						<div class="canvas-size">
							<canvas id="canvas"></canvas>
						</div>
					</div>
				</div>
			</section>
			<?php include('include/user_footer.php') ?>
		</main>
		<script type="text/javascript">
			$(window).on('load', function() {
			  $(".loader").fadeOut('slow');
			});
		</script>
		<script type="text/javascript" src="include/fabric-5.4.2.min.js"></script>
		<script type="text/javascript" src="js/create_customize.js"></script>
	</body>
</html>