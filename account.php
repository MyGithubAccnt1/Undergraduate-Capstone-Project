<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
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
			header {
				background-color: rgba(0, 0, 0, 1.0);
			}
			.dropdown-menu {
				background-color: rgba(0, 0, 0, 1.0);
			}
			.profile-nav::before{
			    width: 75%;
			}
			input {
				margin-bottom: 15px;
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
			<img src="images/auto-complete.gif" id="guide" style="display: none; position: absolute; z-index: 3;">
			<section class="container py-5">
				<h2 class="mb-5">My Profile</h2>
				<hr>
				<div class="row">
					<h3 class="mb-4 mt-0"><small>Personal Details</small></h3>
					<div class="row m-0 p-0" id="personal_details">
	                    <!-- dynamic -->
					</div>
                    <div class="col-sm-12 text-center">
                    	<div class="row gy-3 p-3">
                    		<button type="button" class="btn btn-sm btn-outline-success py-1 mx-auto w-50 rounded-pill" id="personal_button">Update Personal Details</button>
                    	</div>
                    </div>
				</div>
            </section>
            <section class="container py-5">
				<form action="" id="passwords">
                    <div class="row">
                        <h3 class="mb-4 mt-0"><small>Change Password</small></h3>
                        <div class="col-md-6">
                            <label class="form-label">Old password <span class="text-danger" style="font-style: italic;"><small>* Required</small></span></label>
                            <input type="password" class="form-control" id="old_password" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">New password <span class="text-danger" style="font-style: italic;"><small>* Required</small></span></label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Confirm Password <span class="text-danger" style="font-style: italic;"><small>* Required</small></span></label>
                            <input type="password" class="form-control" id="confirm_password" required>
                        </div>
                        <div class="d-flex justify-content-center">
                    	  	<button type="submit" class="btn btn-sm btn-outline-success py-1 w-50 rounded-pill">Update Password</button>
                    	</div>
                    </div>
				</form>
			</section>
			<section id="personal_edit" class="p-3" style="position: absolute; top: 65px; left: 0; height: 100%; width: 100%; z-index: 2; display: none; overflow-y: auto;">
            	<div class="p-3" style="background-color: rgba(255, 255, 255, 0.9);">
                    <div class="container">
                        <form id="personal_details_edit">
                        	<div class="row text-muted py-3">
	                            <div class="col-sm-12 col-md-6 col-lg-6">
	                                <label class="form-label">First Name <span class="text-danger" style="font-style: italic;"><small>* Required</small></span></label>
	                                <input type="text" class="form-control" name="fname" required>
	                            </div>
	                            <div class="col-sm-12 col-md-6 col-lg-6">
	                                <label class="form-label">Last Name <span class="text-danger" style="font-style: italic;"><small>* Required</small></span></label>
	                                <input type="text" class="form-control" name="lname" required>
	                            </div>
	                            <div class="col-12">
	                                <label class="form-label">Mobile Number <span class="text-danger" style="font-style: italic;"><small>* Required</small></span></label>
	                                <input type="text" class="form-control" name="mnumber" oninput="validate(this)" required>
	                            </div>
	                            <div class="col-12">
	                            	<div class="w-100 d-flex justify-content-around">
		                                <label class="form-label">Home Address <span class="text-danger" style="font-style: italic;"><small>* Required</small></span></label>
	                                    <button type="button" class="btn btn-sm rounded-0 btn-outline-danger" onclick="location_api('address_1');" style="margin-left: auto;">
	        	                        	<small>Use my exact location</small>
	        	                        </button>
	                            	</div>
	                                <input type="text" class="form-control" name="address_1" required>
	                            </div>
	                            <div class="col-12">
	                            	<div class="w-100 d-flex justify-content-around">
		                                <label class="form-label">Work Address</label>
	                                    <button type="button" class="btn btn-sm rounded-0 btn-outline-danger" onclick="location_api('address_2');" style="margin-left: auto;">
	        	                        	<small>Use my exact location</small>
	        	                        </button>
	                            	</div>
	                                <input type="text" class="form-control" name="address_2">
	                            </div>
	                            <div class="col-sm-12 col-md-6 col-lg-6 text-center mt-1 mb-1">
	                            	<button type="button" class="btn btn-sm btn-outline-danger py-1 mx-auto w-75 rounded-pill" id="personal_edit_close">Cancel</button>
	                            </div>
	                            <div class="col-sm-12 col-md-6 col-lg-6 text-center mt-1 mb-1">
	                            	<button type="submit" class="btn btn-sm btn-outline-success py-1 mx-auto w-75 rounded-pill">Save</button>
	                            </div>
                            </div>
                        </form>
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
		<script type="text/javascript" src="js/account.js"></script>
		<script type="text/javascript" src="js/support.js"></script>
	</body>
</html>
<?php 
}else{
	echo"<script>var xlink = window.location.href;</script>";
	echo"<script>window.localStorage.setItem('xlink', xlink);</script>";
    echo"<script>alert('Notice: Please login to proceed.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>