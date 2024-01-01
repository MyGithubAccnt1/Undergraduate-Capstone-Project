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
		<link rel="stylesheet" type="text/css" href="./css/preview.css">
		<link rel="stylesheet" type="text/css" href="./css/slider.css">
		<style>
			header {
				background-color: rgba(0, 0, 0, 1.0);
			}
			.dropdown-menu {
				background-color: rgba(0, 0, 0, 1.0);
			}
			.card {
			    box-shadow: 5px 6px 6px 2px #e9ecef;
			    border-radius: 4px;
			}
			.comment-area textarea{
			    resize: none; 
			    border: 1px solid #000;
			}
			.ellipsis {
				text-overflow: ellipsis;
				overflow: hidden;
			}
		</style>
	</head>
	<body>
		<main class="container-fluid p-0">
			<?php include('include/user_header.php') ?>
			<img src="" id="imagePreview" class="imagePreview" alt="Missing_Image">
			<section class="container py-5">
				<div class="row">
					<div class="col-md-12">
						<div id="content-wrapper">
							<div>
								<div class="d-flex justify-content-center m-0 p-0">
									<img id="featured" src="">
								</div>
								<!-- <div class="d-flex justify-content-center m-0 p-0">
									<div id="slide-wrapper" class="m-0 p-0">
										<i class="fas fa-angle-left arrow" id="slideLeft"></i>
										<div id="slider">
											<img class="thumbnail active-img" id="thumbnail" src="">
											<img class="thumbnail" src="" alt="Missing_Image">
											<img class="thumbnail" src="" alt="Missing_Image">
											<img class="thumbnail" src="" alt="Missing_Image">
											<img class="thumbnail" src="" alt="Missing_Image">
											<img class="thumbnail" src="" alt="Missing_Image">
											<img class="thumbnail" src="" alt="Missing_Image">
										</div>
										<i class="fas fa-angle-right arrow" id="slideRight"></i>
									</div>
								</div> -->
							</div>
							<div class="product-details">
								<h1 class="text-center" id="title"></h1>
								<div class="container"><hr></div>
								<div>
									<div class="col-md-12 text-center">
										<div class="row gy-3 p-3">
											<div class="col-sm-12 col-md-6">
												<h4 id="price" class="m-1"></h4>
											</div>
											<div class="col-sm-12 col-md-6" style="display: flex; justify-content: center; align-items: center;">
												<h5 style="margin-right: 5px;">Quantity: </h5>
												<input type="number" id="quantity" value="1" style="width: 45px;">
											</div>
										</div>
									</div>
								    
								    <h5>DESCRIPTION</h5>
								    <p id="decription"></p>
								    <?php
								    if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
								    ?>
								    <div class="col-md-12 text-center">
								    	<div class="row gy-3 p-3">
								    		<div class="col-sm-12 col-md-6">
								    			<button class="btn btn-sm btn-outline-success py-1 w-75 rounded-pill" type="button" onclick="add_to_cart();">Add to Cart</button>
								    		</div>
								    		<div class="col-sm-12 col-md-6">
								    			<button class="btn btn-sm btn-outline-danger py-1 w-75 rounded-pill" type="button" onclick="buy_now();">Buy Now</button>
								    		</div>
								    	</div>
								    </div>
						    	    <?php
						    	    } else {
					    	    	?>
					    	    	<div class="col-md-12 mt-0 mb-3 preview-options">
					    	    		<div class="w-100">
					    	    			<button class="btn btn-sm btn-outline-success py-1 w-100 rounded-pill" type="button" onclick="redirect_to_login();">Add to Cart</button>
					    	    		</div>
					    	    		<div class="w-100">
					    	    			<button class="btn btn-sm btn-outline-danger py-1 w-100 rounded-pill" type="button" onclick="redirect_to_login();">Buy Now</button>
					    	    		</div>
					    	    	</div>
						    	    <?php
						    	    }
						        	?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="container py-5">
				<?php
				if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
				?>
				<div class="row">
                    <div class="col-md-12">
                        <div class="stick-top bg-dark text-center text-white py-2">Comment Section</div>
                        <div class="border border-black card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px;" id="comment-container">
							<!-- dynamic -->
                        </div>
                        <div class="stick-bot">
							<form id="comment-form">
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
                        </div>
                    </div>
				</div>	
			    <?php
			    } else {
			    ?>
			    <div class="row">
                    <div class="col-md-12">
                        <div class="stick-top bg-dark text-center text-white py-2">Comment Section</div>
                        <div class="border border-black card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px;" id="comment-container">
							<!-- dynamic -->
                        </div>
                        <div class="stick-bot">
							<div class="comment-area">
								<div class="bg-dark" style="display: flex; justify-content: center; align-items: center; flex-direction: row; margin: 0; padding: 0;">
									<div class="w-100 p-1">
										<textarea class="form-control rounded-pill" placeholder="Sign in to leave a comment." rows="1" name="comment" required></textarea>
									</div>
									<div class="w-50 p-1 d-flex align-items-center">
										<button type="button" class="btn btn-sm btn-primary py-1 w-100 rounded-pill" onclick="redirect_to_login();">Send</button>
									</div>
								</div>
							</div>
                        </div>
                    </div>
				</div>	
			    <?php
			    }
		    	?>
		    </section>
		    <section class="container py-5">
		    	<div class="row">
		    		<h1 class="mb-5">YOU MAY LIKE</h1>
		    		<hr class="m-0">
		    		<div class="col-12">
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
			<?php include('include/user_footer.php') ?>
		</main>
		<script type="text/javascript">
			$(window).on('load', function() {
			  $(".loader").fadeOut('slow');
			  $(".sticky-top").fadeIn('slow');
			  $('#title').text(window.localStorage.getItem('title'));
			  $('#featured').attr('src', window.localStorage.getItem('thumbnail'));
			  $('#price').text('PHP ' + window.localStorage.getItem('price'));
			  $('#decription').text(window.localStorage.getItem('description'));
			});
		</script>
		<script type="text/javascript" src="js/user_header.js"></script>
		<script type="text/javascript" src="js/preview.js"></script>
		<script type="text/javascript" src="js/image_hover.js"></script>
	</body>
</html>