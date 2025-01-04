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
                white-space: normal;
                overflow: hidden;
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
					<div class="col-md-12">
						<div id="content-wrapper">
							<div>
								<div class="d-flex justify-content-center m-0 p-0">
									<img id="featured" src="" class="cool">
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
								<div id="options">
									<!-- dynamic -->
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
                        <div class="border border-black card-body bg-white" style="overflow-x:hidden; overflow-y:auto; height: 200px; transform: scaleY(-1);" id="comment-container">
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
											<button type="submit" class="btn btn-sm btn-danger py-1 w-100 rounded-pill">Send</button>
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
                        <div class="border border-black card-body bg-white" style="overflow-x: hidden; overflow-y: auto; height: 200px; transform: scaleY(-1);" id="comment-container">
							<!-- dynamic -->
                        </div>
                        <div class="stick-bot">
							<div class="comment-area">
								<div class="bg-dark" style="display: flex; justify-content: center; align-items: center; flex-direction: row; margin: 0; padding: 0;">
									<div class="w-100 p-1">
										<textarea class="form-control rounded-pill" placeholder="Sign in to leave a comment." rows="1" name="comment" required></textarea>
									</div>
									<div class="w-50 p-1 d-flex align-items-center">
										<button type="button" class="btn btn-sm btn-danger py-1 w-100 rounded-pill" onclick="redirect_to_login();">Send</button>
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
		    		<div class="col-12">
		    			<h1 class="m-0">YOU MAY LIKE</h1>
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
			  $('.floating_chat_head').fadeIn('slow');
			});
		</script>
		<script type="text/javascript" src="js/user_header.js"></script>
		<script type="text/javascript" src="js/preview.js"></script>
		<script type="text/javascript" src="js/image_hover.js"></script>
		<script type="text/javascript" src="js/support.js"></script>
	</body>
</html>