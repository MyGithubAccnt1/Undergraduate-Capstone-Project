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
			header {
				background-color: rgba(0, 0, 0, 1.0);
			}
			.dropdown-menu {
				background-color: rgba(0, 0, 0, 1.0);
			}
			.profile-nav::before{
			    width: 100%;
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
                    <button type="button" onclick="minimize_floating_chat();" class="bg-dark text-center text-white py-2 w-100 border-0">Chat with SBM</button>
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
			<img src="images/auto-complete.gif" id="guide" style="display: none; position: absolute;">
			<section class="container py-5">
				<h2 class="mb-5">My Profile</h2>
				<hr>
				<form id="personal">
					<div class="row text-muted">
						<h2 class="mb-4 mt-0"><small>Personal details</small></h2>
						<div class="col-md-6">
						    <label class="form-label">First Name</label>
						    <input type="text" class="form-control" value="<?php echo $_SESSION['fname']; ?>" name="fname" required>
						</div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['lname']; ?>" name="lname" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['mnumber']; ?>" name="mnumber" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" disabled>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Complete Address</label>
                            <button type="button" class="btn btn-sm rounded-0 btn-outline-danger ms-2" style="height: 30px; width: 30px;" id="caddress_guide"><small>?</small></button>
                            <input type="text" class="form-control" value="<?php echo (!empty($_SESSION['caddress']) ? $_SESSION['caddress'] : null); ?>" name="caddress" required>
                        </div>
                        <div class="col-sm-12 text-center">
                        	<div class="row gy-3 p-3">
                        		<button type="submit" class="btn btn-sm btn-outline-success py-1 mx-auto w-50 rounded-pill">Update Personal Details</button>
                        	</div>
                        </div>
					</div>
				</form>
            </section>
            <section class="container py-5">
				<form action="" id="passwords">
                    <div class="row text-muted">
                        <h2 class="mb-4 mt-0"><small>Change Password</small></h2>
                        <div class="col-md-6">
                            <label class="form-label">Old password</label>
                            <input type="password" class="form-control" id="old_password" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">New password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" required>
                        </div>
                        <div class="d-flex justify-content-center">
                    	  	<button type="submit" class="btn btn-sm btn-outline-success py-1 w-50 rounded-pill">Update Password</button>
                    	</div>
                    </div>
				</form>
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