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
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_product">Back</button>
							  		</div>
									<h1 class="mb-3">Select Material</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="logo_seal_gold" class="btn btn-outline-light rounded-0 w-50">Gold</button>
									</div>
									<div class="col-12">
										<button type="button" id="logo_seal_silver" class="btn btn-outline-light rounded-0 w-50">Silver</button>
									</div>
									<div class="col-12">
										<button type="button" id="logo_seal_bronze" class="btn btn-outline-light rounded-0 w-50">Bronze</button>
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_material">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_product">Back</button>
							  		</div>
									<h1 class="mb-3">Select Material</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="necklace_gold" class="btn btn-outline-light rounded-0 w-50">Gold</button>
									</div>
									<div class="col-12">
										<button type="button" id="necklace_silver" class="btn btn-outline-light rounded-0 w-50">Silver</button>
									</div>
									<div class="col-12">
										<button type="button" id="necklace_bronze" class="btn btn-outline-light rounded-0 w-50">Bronze</button>
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="table_nameplate_material">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50  back_product">Back</button>
							  		</div>
									<h1 class="mb-3">Select Material</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="table_nameplate_wood" class="btn btn-outline-light rounded-0 w-50">Wood</button>
									</div>
								</div>
							</div>

						</div>

						<div id="3">

							<div class="custom-collapse collapse py-5" id="logo_seal_shape">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_logo_seal_shape">Back</button>
							  		</div>
									<h1 class="mb-3">Select Shape</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="logo_seal_circle" class="btn btn-outline-light rounded-0 w-50">Circle</button>
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_shape">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_necklace_shape">Back</button>
							  		</div>
									<h1 class="mb-3">Select Shape</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="necklace_cross" class="btn btn-outline-light rounded-0 w-50">Cross</button>
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="table_nameplate_shape">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_table_nameplate_shape">Back</button>
							  		</div>
									<h1 class="mb-3">Select Shape</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="table_nameplate_rectangle" class="btn btn-outline-light rounded-0 w-50">Rectangle</button>
									</div>
								</div>
							</div>

						</div>

						<div id="4">

							<div class="custom-collapse collapse py-5" id="logo_seal_logo">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_logo_seal_logo">Back</button>
							  		</div>
									<h1 class="mb-3">Select Logo</h1>
									<hr>
									<div class="col-12">
										<input type="file" id="logo_seal_image" accept="image/png">
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_engrave">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_necklace_engrave">Back</button>
							  		</div>
									<h1 class="mb-3">Select Engrave</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="necklace_engrave_text" class="btn btn-outline-light rounded-0 w-50">Text</button>
									</div>
									<div class="col-12">
										<button type="button" id="necklace_engrave_image" class="btn btn-outline-light rounded-0 w-50">Image</button>
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="table_nameplate_logo">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_table_nameplate_logo">Back</button>
							  		</div>
									<h1 class="mb-3">Select Logo</h1>
									<hr>
									<div class="col-12">
										<input type="file" id="table_nameplate_image" accept="image/png">
									</div>
								</div>
							</div>

						</div>

						<div id="5">

							<div class="custom-collapse collapse py-5" id="logo_seal_text">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_logo_seal_text">Back</button>
							  		</div>
									<h1 class="mb-3">Insert Company</h1>
									<hr>
									<div class="col-12">
										<form id="logo_seal_company_form">
										    <div class="comment-area">
										    	<div style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
		            								<span style="margin: 0 5px 0 7px;">Font Style:</span>
		            								<select id="logo_seal_font">
		                                    	        <option value="Arial">Arial</option>
		                                    	        <option value="Courier" selected>Courier</option>
		            									<option value="Helvetica">Helvetica</option>
		            									<option value="Impact">Impact</option>
		            									<option value="Segoe UI">Segoe UI</option>
		            									<option value="Times New Roman">Times New Roman</option>
		            									<option value="Verdana">Verdana</option>
		                                    	    </select>
										        </div>
										        <div class="w-100 p-1" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
										        	<span>Company:</span>
										            <textarea class="form-control rounded-pill" rows="2" name="logo_seal_company" required></textarea>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Done</button>
										        </div>
										    </div>
										</form>
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_text">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_necklace_text">Back</button>
							  		</div>
									<h1 class="mb-3">Insert Text</h1>
									<hr>
									<small>THIS TEXT WILL BE ENGRAVE TO YOUR NECKLACE</small>
									<div class="col-12">
										<form id="necklace_text_form">
										    <div class="comment-area">
										    	<div style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
		            								<span style="margin: 0 5px 0 7px;">Font Style:</span>
		            								<select id="necklace_text_font">
		                                    	        <option value="Arial">Arial</option>
		                                    	        <option value="Courier" selected>Courier</option>
		            									<option value="Helvetica">Helvetica</option>
		            									<option value="Impact">Impact</option>
		            									<option value="Segoe UI">Segoe UI</option>
		            									<option value="Times New Roman">Times New Roman</option>
		            									<option value="Verdana">Verdana</option>
		                                    	    </select>
										        </div>
										        <div class="w-100 p-1" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
										        	<span>Company:</span>
										            <textarea class="form-control rounded-pill" rows="2" name="necklace_text" required></textarea>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Done</button>
										        </div>
										    </div>
										</form>
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_image">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_necklace_image">Back</button>
							  		</div>
									<h1 class="mb-3">Select Image</h1>
									<hr>
									<small>THIS IMAGE WILL BE ENGRAVE TO YOUR NECKLACE</small>
									<div class="col-12">
										<input type="file" id="necklace_image" accept="image/png">
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="table_nameplate_company">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_table_nameplate_company">Back</button>
							  		</div>
									<h1 class="mb-3">Insert Company</h1>
									<hr>
									<div class="col-12">
										<form id="table_nameplate_company_form">
										    <div class="comment-area gy-3">
										        <div class="w-100 p-1" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
										        	<span>Company:</span>
										            <textarea class="form-control rounded-pill" rows="2" name="table_nameplate_company" required></textarea>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Done</button>
										        </div>
										    </div>
										</form>
									</div>
								</div>
							</div>

						</div>

						<div id="6">

							<div class="custom-collapse collapse py-5" id="table_nameplate_name">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_table_nameplate_name">Back</button>
							  		</div>
									<h1 class="mb-3">Insert Name</h1>
									<hr>
									<div class="col-12">
										<form id="table_nameplate_name_form">
										    <div class="comment-area gy-3">
										        <div class="w-100 p-1" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
										        	<span style="margin-left: 30px;">Name:</span>
										            <textarea class="form-control rounded-pill" rows="2" name="table_nameplate_name" required></textarea>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Done</button>
										        </div>
										    </div>
										</form>
									</div>
								</div>
							</div>

						</div>

						<div id="7">

							<div class="custom-collapse collapse py-5" id="table_nameplate_position">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_table_nameplate_position">Back</button>
							  		</div>
									<h1 class="mb-3">Insert Position</h1>
									<hr>
									<div class="col-12">
										<form id="table_nameplate_position_form">
										    <div class="comment-area gy-3">
										        <div class="w-100 p-1" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
										        	<span style="margin-left: 17px;">Position:</span>
										            <textarea class="form-control rounded-pill" rows="1" name="table_nameplate_position" required></textarea>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Done</button>
										        </div>
										    </div>
										</form>
									</div>
								</div>
							</div>

						</div>

						<div id="8">

							<div class="custom-collapse collapse py-5" id="final">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 reset">Reset</button>
							  		</div>
									<h1 class="mb-3">Final Design</h1>
									<hr>
									<div class="col-12">
										<button type="button" class="btn btn-outline-light rounded-0 w-50">TRY ME(Augmented reality)</button>
									</div>
									<div class="col-12">
										<button type="button" class="btn btn-outline-light rounded-0 w-50">ORDER NOW</button>
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