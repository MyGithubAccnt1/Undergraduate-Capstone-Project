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
			.custom-collapse {
	            transition: height 0.5s linear;
	            overflow: hidden;
	            height: 0;
	        }
	        .custom-collapse.show {
	            height: auto;
	        }
			.left {
				height: 100vh;
				overflow: hidden;
			}
			.left > div {
				height: 100vh;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			.right {
				height: 100vh;
				overflow: hidden;
			}
			.right > div {
				margin-top: 10vh;
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
		<img src="" id="guide" style="display: none; position: absolute; z-index: 3;">
		<main class="container-fluid p-0" style="background-image: repeating-linear-gradient(90deg, hsla(57,0%,42%,0.09) 0px, hsla(57,0%,42%,0.09) 1px,transparent 1px, transparent 60px),repeating-linear-gradient(0deg, hsla(57,0%,42%,0.09) 0px, hsla(57,0%,42%,0.09) 1px,transparent 1px, transparent 60px),repeating-linear-gradient(0deg, hsla(57,0%,42%,0.09) 0px, hsla(57,0%,42%,0.09) 1px,transparent 1px, transparent 10px),repeating-linear-gradient(90deg, hsla(57,0%,42%,0.09) 0px, hsla(57,0%,42%,0.09) 1px,transparent 1px, transparent 10px),linear-gradient(90deg, rgb(20,20,20),rgb(20,20,20));">
			<section class="container">
				<div class="row text-white text-center">
					<div class="col-md-6 left">

						<div id="1">

							<div class="row gy-3 py-5">
								<div class="col-6 d-flex justify-content-start">
						  			<a href="index.php" class="btn btn-outline-light rounded-0 w-50">Exit</a>
						  		</div>
								<h1 class="mb-3">
									Select Product
									<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="product_guide">
										<small>?</small>
									</button>
								</h1>
								<hr>
								<div class="col-12">
									<button type="button" id="logo_seal" class="btn btn-outline-light rounded-0 w-50">Logo Seal</button>
								</div>
								<div class="col-12">
									<button type="button" id="necklace" class="btn btn-outline-light rounded-0 w-50">Necklace</button>
								</div>
								<div class="col-12">
									<button type="button" id="table_nameplate" class="btn btn-outline-light rounded-0 w-50">Table Nameplate</button>
								</div>
								<small class="text-danger">OR</small>
								<div class="col-12">
									<button type="button" id="upload_design" class="btn btn-outline-light rounded-0 w-50">Upload Your Own Design</button>
								</div>
							</div>

						</div>

						<div id="2">

							<div class="custom-collapse collapse py-5" id="logo_seal_material">
							  	<div class="row gy-3">
					  				<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">Select Material</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="logo_seal_silver" class="btn btn-outline-light rounded-0 w-50">Stainless</button>
									</div>
									<div class="col-12">
										<button type="button" id="logo_seal_bronze" class="btn btn-outline-light rounded-0 w-50">Brass</button>
									</div>
									<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_product">Back</button>
							  		</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_material">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">Select Material</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="necklace_gold" class="btn btn-outline-light rounded-0 w-50">Gold</button>
									</div>
									<div class="col-12">
										<button type="button" id="necklace_silver" class="btn btn-outline-light rounded-0 w-50">Stainless</button>
									</div>
									<div class="col-12">
										<button type="button" id="necklace_bronze" class="btn btn-outline-light rounded-0 w-50">Brass</button>
									</div>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_product">Back</button>
							  		</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="table_nameplate_logo">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">
										Select Logo
										<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="tablenameplate_logo-guide">
											<small>?</small>
										</button>
									</h1>
									<hr>
									<div class="col-12">
										<input type="file" id="table_nameplate_image" accept="image/png">
									</div>
									<small class="text-danger">WE RECOMMEND USING IMAGES THAT ARE ALREADY EDITED AND HAS NO UNNECESSARY BACKGROUNDS</small>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_product">Back</button>
							  		</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="own_design">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">
										Upload Image
										<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="own_design-guide">
											<small>?</small>
										</button>
									</h1>
									<hr>
									<div class="col-12">
										<input type="file" id="own_design_image" accept="image/*">
									</div>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_own_design">Back</button>
							  		</div>
							  		<div class="col-6 d-flex justify-content-end">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 next_own_design">Next</button>
							  		</div>
							  		<small class="text-danger">HELP US UNDERSTAND YOUR DESIRE BY LEAVING A FEW NOTES FOR US</small>
									<div class="col-12 comment-area">
										<div class="w-75 p-1 mx-auto" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
											<span>Note:</span>
										    <textarea class="form-control rounded-pill" rows="1" name="own_design_note"></textarea>
										</div>
									</div>
								</div>
							</div>

						</div>

						<div id="3">

							<div class="custom-collapse collapse py-5" id="logo_seal_logo">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">
										Select Logo
										<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="directorymarker_logo-guide">
											<small>?</small>
										</button>
									</h1>
									<hr>
									<div class="col-12">
										<input type="file" id="logo_seal_image" accept="image/png">
									</div>
									<small class="text-danger">WE RECOMMEND USING IMAGES THAT ARE ALREADY EDITED AND HAS NO UNNECESSARY BACKGROUNDS</small>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_logo_seal_logo">Back</button>
							  		</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_shape">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">Select Style</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="necklace_shape_cross" class="btn btn-outline-light rounded-0 w-50">Cross</button>
									</div>
									<div class="col-12">
										<button type="button" id="necklace_shape_circle" class="btn btn-outline-light rounded-0 w-50">Circle</button>
									</div>
									<div class="col-12">
										<button type="button" id="necklace_shape_text" class="btn btn-outline-light rounded-0 w-50">Text</button>
									</div>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_necklace_shape">Back</button>
							  		</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="table_nameplate_company">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">
										Insert Text
										<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="tablenameplate_company-guide">
											<small>?</small>
										</button>
									</h1>
									<hr>
									<div class="col-12">
										<form id="table_nameplate_company_form">
										    <div class="comment-area gy-3">
										        <div class="w-100 p-1" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
										        	<span>Text:</span>
										            <textarea class="form-control rounded-pill" rows="2" name="table_nameplate_company"></textarea>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Next</button>
										        </div>
										    </div>
										</form>
									</div>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_table_nameplate_company">Back</button>
							  		</div>
							  		<small class="text-danger">HELP US UNDERSTAND YOUR DESIRE BY LEAVING A FEW NOTES FOR US</small>
									<div class="col-12 comment-area">
										<div class="w-75 p-1 mx-auto" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
											<span>Note:</span>
										    <textarea class="form-control rounded-pill" rows="1" name="table_nameplate_note_uno"></textarea>
										</div>
									</div>
								</div>
							</div>

						</div>

						<div id="4">

							<div class="custom-collapse collapse py-5" id="logo_seal_text">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">
										Insert Text
										<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="directorymarker_company-guide">
											<small>?</small>
										</button>
									</h1>
									<hr>
									<small class="text-danger">FEEL FREE TO TELL US YOUR DESIRED FONT STYLE IN THE NOTE</small>
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
										        	<span>Text:</span>
										            <textarea class="form-control rounded-pill" rows="2" name="logo_seal_company" required></textarea>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Next</button>
										        </div>
										    </div>
										</form>
									</div>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_logo_seal_text">Back</button>
							  		</div>
							  		<small class="text-danger">HELP US UNDERSTAND YOUR DESIRE BY LEAVING A FEW NOTES FOR US</small>
									<div class="col-12 comment-area">
										<div class="w-75 p-1 mx-auto" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
											<span>Note:</span>
										    <textarea class="form-control rounded-pill" rows="1" name="logo_seal_note"></textarea>
										</div>
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_engrave">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">Select Engrave</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="necklace_engrave_text" class="btn btn-outline-light rounded-0 w-50">Text</button>
									</div>
									<div class="col-12">
										<button type="button" id="necklace_engrave_image" class="btn btn-outline-light rounded-0 w-50">Image</button>
									</div>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_necklace_engrave">Back</button>
							  		</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_text_body">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">
										Insert Text
										<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="necklace_text_body-guide">
											<small>?</small>
										</button>
									</h1>
									<hr>
									<div class="col-12">
										<form id="necklace_text_body_form">
										    <div class="comment-area">
										        <div class="w-100 p-1" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
										        	<span>Text:</span>
										            <textarea class="form-control rounded-pill" rows="2" name="necklace_text_body" required></textarea>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Next</button>
										        </div>
										    </div>
										</form>
									</div>
									<small class="text-danger">THIS IS A REPRESENTATION OF WHAT IT ACTUALLY LOOKS LIKE</small>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_necklace_engrave">Back</button>
							  		</div>
							  		<small class="text-danger">HELP US UNDERSTAND YOUR DESIRE BY LEAVING A FEW NOTES FOR US</small>
									<div class="col-12 comment-area">
										<div class="w-75 p-1 mx-auto" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
											<span>Note:</span>
										    <textarea class="form-control rounded-pill" rows="1" name="necklace_note"></textarea>
										</div>
									</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="table_nameplate_name">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">
										Insert Name
										<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="tablenameplate_text-guide">
											<small>?</small>
										</button>
									</h1>
									<hr>
									<div class="col-12">
										<form id="table_nameplate_name_form">
										    <div class="comment-area gy-3">
										        <div class="w-100 p-1" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
										        	<span style="margin-left: 30px;">Name:</span>
										            <textarea class="form-control rounded-pill" rows="2" name="table_nameplate_name" required></textarea>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Next</button>
										        </div>
										    </div>
										</form>
									</div>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_table_nameplate_name">Back</button>
							  		</div>
							  		<small class="text-danger">HELP US UNDERSTAND YOUR DESIRE BY LEAVING A FEW NOTES FOR US</small>
									<div class="col-12 comment-area">
										<div class="w-75 p-1 mx-auto" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
											<span>Note:</span>
										    <textarea class="form-control rounded-pill" rows="1" name="table_nameplate_note_dos"></textarea>
										</div>
									</div>
								</div>
							</div>

						</div>

						<div id="5">

							<div class="custom-collapse collapse py-5" id="necklace_text">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">
										Insert Text
										<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="necklace_engrave_text-guide">
											<small>?</small>
										</button>
									</h1>
									<hr>
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
										        	<span>Text:</span>
										            <textarea class="form-control rounded-pill" rows="2" name="necklace_text" required></textarea>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Clip</button>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="button" class="btn btn-sm btn-primary py-1 w-100 rounded-pill necklace_convert" disabled>Next</button>
										        </div>
										    </div>
										</form>
									</div>
									<small class="text-danger">THIS TEXT WILL BE ENGRAVED TO YOUR NECKLACE</small>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_necklace_text">Back</button>
							  		</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="necklace_image">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">
										Select Image
										<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="necklace_engrave_image-guide">
											<small>?</small>
										</button>
									</h1>
									<hr>
									<div class="col-12">
										<input type="file" id="necklace_image_file" accept="image/png">
									</div>
									<div class="w-75 mx-auto p-1">
										<button type="button" class="btn btn-sm btn-primary py-1 w-100 rounded-pill necklace_convert">Next</button>
									</div>
									<small class="text-danger">WE RECOMMEND USING IMAGES THAT ARE ALREADY EDITED AND HAS NO UNNECESSARY BACKGROUNDS</small>
									<small class="text-danger">THIS IMAGE WILL BE ENGRAVED TO YOUR NECKLACE</small>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_necklace_image">Back</button>
							  		</div>
								</div>
							</div>

							<div class="custom-collapse collapse py-5" id="table_nameplate_position">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">
										Insert Position
										<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="tablenameplate_position-guide">
											<small>?</small>
										</button>
									</h1>
									<hr>
									<div class="col-12">
										<form id="table_nameplate_position_form">
										    <div class="comment-area gy-3">
										        <div class="w-100 p-1" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
										        	<span style="margin-left: 17px;">Position:</span>
										            <textarea class="form-control rounded-pill" rows="1" name="table_nameplate_position" required></textarea>
										        </div>
										        <div class="w-75 mx-auto p-1">
										        	<button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Next</button>
										        </div>
										    </div>
										</form>
									</div>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_table_nameplate_position">Back</button>
							  		</div>
							  		<small class="text-danger">HELP US UNDERSTAND YOUR DESIRE BY LEAVING A FEW NOTES FOR US</small>
									<div class="col-12 comment-area">
										<div class="w-75 p-1 mx-auto" style="display: flex; flex-direction: row; gap: 10px; align-items: center;">
											<span>Note:</span>
										    <textarea class="form-control rounded-pill" rows="1" name="table_nameplate_note_tres"></textarea>
										</div>
									</div>
								</div>
							</div>

						</div>

						<div id="8">

							<div class="custom-collapse collapse py-5" id="final">
							  	<div class="row gy-3">
							  		<div class="col-6 d-flex justify-content-start">
					  		  			<button type="button" class="btn btn-outline-light rounded-0 w-50 exit_customize">Exit</button>
					  		  		</div>
									<h1 class="mb-3">
										Final Design
										<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="final-guide">
											<small>?</small>
										</button>
									</h1>
									<hr>
									<div class="col-12">
										<button type="button" id="try_me_ar" class="btn btn-outline-light rounded-0 w-50">IMAGE PROCESSING</button>
									</div>
									<div class="col-12">
										<button type="button" id="order" class="btn btn-outline-light rounded-0 w-50">ORDER NOW</button>
									</div>
							  		<div class="col-6 d-flex justify-content-start">
							  			<button type="button" class="btn btn-outline-light rounded-0 w-50 back_final">Back</button>
							  		</div>
									<small class="text-danger">FEEL FREE TO UPLOAD A REFERENCE IMAGE OF YOUR DESIRED DESIGN</small>
									<div class="col-12">
										<input type="file" id="final_reference" accept="image/png">
									</div>
								</div>
							</div>

						</div>

					</div>
					<div class="col-md-6 right">
						<div class="canvas-size">
							<canvas id="canvas"></canvas>
						</div>
					</div>
				</div>
			</section>
		</main>
		<script type="text/javascript">
			$(window).on('load', function() {
			  $(".loader").fadeOut('slow');
			});
		</script>
		<script type="text/javascript" src="include/fabric-5.4.2.min.js"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js" integrity="sha512-CeIsOAsgJnmevfCi2C7Zsyy6bQKi43utIjdA87Q0ZY84oDqnI0uwfM9+bKiIkI75lUeI00WG/+uJzOmuHlesMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
		<script type="text/javascript" src="js/customize.js"></script>
	</body>
</html>