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
			.orders-nav::before{
			    width: 75%;
			}
			.order-container {
				padding: 10px;
				height: 50vh;
				overflow-x: hidden;
				overflow-y: auto;
			}
			.order-container > .row {
				border: 1px solid #000;
				border-style: none none solid none;
				padding: 5px;
				height: 50px;
				overflow: hidden;
			}
			.order-container > .row:not(:first-child) {
			    cursor: pointer;
			}
			.order-container > .row:not(:first-child):hover {
			    background-color: rgba(0, 0, 0, 0.2) !important;
			}
			.order-container > .row > div {
				display: flex;
				align-items: top;
				justify-content: center;
				padding-inline: 10px;
			}
			.order-container > .row > div:first-child {
				width: 25%;
				justify-content: left;
			}
			.order-container > .row > div:nth-child(2) {
				width: 25%;
				justify-content: left;
			}
			.order-container > .row > div:nth-child(3) {
				width: 25%;
			}
			.order-container > .row > div:nth-child(4) {
				width: 25%;
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
			.cart-img {
				width: 100%;
				height: auto;
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
                    <button type="button" onclick="minimize_floating_chat();" class="bg-dark text-center text-white py-2 w-100 border-0">Direct Message</button>
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
			<img src="" id="imagePreview" class="imagePreview" style="display: none; position: absolute; z-index: 3;">
			<img src="" id="guide" style="display: none; position: absolute; z-index: 3;">
			<section class="container py-5">
				<h2 class="mb-5">
					My Orders
					<button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="order_guide">
						<small>?</small>
					</button>
				</h2>
				<hr>
				<div class="row">
					<div class="container">
						<div class="order-container" id="order-container">
							<!-- dynamic -->
						</div>
					</div>
				</div>
				<div class="row text-center p-3 gy-2">
					<div class="col-sm-12 col-md-6">
						<a href="index.php" class="btn btn-sm btn-outline-danger rounded-pill w-75">Back</a>
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

            <div id="view_order" class="p-3" style="position: absolute; top: 65px; left: 0; height: 100%; width: 100%; z-index: 2; display: none; overflow-y: auto;">
                <div class="p-3" style="background-color: rgba(255, 255, 255, 0.9);">
                    <button class="btn btn-outline-danger rounded-0 mb-3 btn-sm" id="close_order_details">X</button>
                    <div class="container">
                        <div class="row">
                        	<div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                <div class="container">
                                    <div class="row border border-dark text-start" style="display: flex; flex-direction: column;">
                                        <div class="bg-dark text-center text-white py-2">DETAILS</div>
                                        <div style="overflow-x:hidden; overflow-y:auto;" class="p-3" id="order_details">
                                            <!-- dynamic -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                <div class="container">
                                    <div class="row border border-dark text-start" style="display: flex; flex-direction: column;">
                                        <div class="bg-dark text-center text-white py-2">ITEMS</div>
                                        <div style="overflow-x:hidden; overflow-y:auto; flex: 1;" class="p-3" id="order_items">
                                            <!-- dynamic -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="container">
                                    <div class="row border border-dark text-start" style="display: flex; flex-direction: column;">
                                        <div class="bg-dark text-center text-white py-2">PAYMENTS</div>
                                        <div style="overflow-x:hidden; overflow-y:auto;" class="p-3" id="order_payments">
                                            <!-- dynamic -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php include('include/user_footer.php') ?>
		</main>
		<script type="text/javascript">
			$(window).on('load', function() {
			  	$(".loader").fadeOut('slow');
			  	$(".sticky-top").fadeIn('slow');
			});
		</script>
		<script type="text/javascript" src="js/user_header.js"></script>
		<script type="text/javascript" src="js/order.js"></script>
		<script type="text/javascript" src="js/image_hover.js"></script>
	</body>
</html>