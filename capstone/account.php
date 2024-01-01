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
				background-color: rgba(0, 0, 0, 0.75);
			}
			.dropdown-menu {
				background-color: rgba(0, 0, 0, 0.75);
			}
			input {
				margin-bottom: 15px;
			}
			.profile-options {
				display: flex;
				justify-content: space-evenly;
				align-items: center;
				flex-direction: row;
				gap: 10px;
			}
			@media (max-width: 767px) {
			    .profile-options {
			    	flex-direction: column;
			    }
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
		<main class="container-fluid p-0 m-0">
			<?php include('include/user_header.php') ?>
			<section class="container py-5">
				<h2 class="mb-5">My Profile</h2>
				<hr>
				<form action="" id="personal">
					<div class="row text-muted">
						<h5 class="mb-4 mt-0">Personal details</h5>
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
                            <input type="text" class="form-control" value="<?php echo $_SESSION['caddress']; ?>" name="caddress" disabled>
                        </div>
                        <div class="col-md-12 mt-0 mb-3 profile-options">
                        	<div class="w-100">
                            	<button type="submit" class="btn btn-sm btn-outline-success py-1 w-100 rounded-pill">Update Personal Details</button>
                            </div>
                            <div class="w-100">
                            	<button class="btn btn-sm btn-outline-primary py-1 w-100 rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample">Update Address</button>
                            </div>
                        </div>
					</div>
				</form>
                <div class="collapse mb-3" id="collapseExample">
                	<div class="card card-body border">
                		<form action="" id="address">
                			<div class="row">
		                        <div class="col-sm-12 col-md-6 col-lg-4">
		                            <label class="form-label">Country</label>
		                            <input type="text" class="form-control" value="<?php echo $_SESSION['country']; ?>" disabled>
		                        </div>
		                        <div class="col-sm-12 col-md-6 col-lg-4">
		                            <label class="form-label">Region</label>
		                            <select name="region" class="form-control" id="region"></select>
		                            <input type="hidden" class="form-control" name="region_text" id="region-text" required>
		                        </div>
		                        <div class="col-sm-12 col-md-6 col-lg-4">
		                            <label class="form-label">Province</label>
		                            <select name="province" class="form-control" id="province"></select>
		                            <input type="hidden" class="form-control" name="province_text" id="province-text" required>
		                        </div>
		                        <div class="col-sm-12 col-md-6 col-lg-4">
		                            <label class="form-label">City / Municipality</label>
		                            <select name="city" class="form-control" id="city"></select>
		                            <input type="hidden" class="form-control" name="city_text" id="city-text" required>
		                        </div>
		                        <div class="col-sm-12 col-md-6 col-lg-4">
		                            <label class="form-label">Barangay</label>
		                            <select name="barangay" class="form-control" id="barangay"></select>
		                            <input type="hidden" class="form-control" name="barangay_text" id="barangay-text" required>
		                        </div>
		                        <div class="col-sm-12 col-md-6 col-lg-4">
		                            <label for="street-text" class="form-label">Subdivision</label>
		                            <input type="text" class="form-control" name="subdivision" placeholder="Sample Subd.">
		                        </div>
		                        <div class="col-sm-12 col-md-6 col-lg-4">
		                            <label for="street-text" class="form-label">Street / Apartment / Building</label>
		                            <input type="text" class="form-control" name="street" placeholder="Sample St. / Apt. / Bldg.">
		                        </div>
		                        <div class="col-sm-12 col-md-6 col-lg-4">
		                            <label for="street-text" class="form-label">Phase</label>
		                            <input type="text" class="form-control" name="phase" placeholder="Ph. Sample">
		                        </div>
		                        <div class="col-sm-12 col-md-6 col-lg-4">
		                            <label for="street-text" class="form-label">Block</label>
		                            <input type="text" class="form-control" name="block" placeholder="Blk. Sample">
		                        </div>
		                        <div class="col-sm-12 col-md-6 col-lg-4">
		                            <label for="street-text" class="form-label">Lot</label>
		                            <input type="text" class="form-control" name="lot" placeholder="Lot Sample">
		                        </div>
		                        <div class="d-flex justify-content-center align-items-center">
		                        	<button type="submit" class="btn btn-sm btn-outline-success py-1 w-75 rounded-pill">Submit Address</button>
		                        </div>
		                    </div>
	                    </form>
                    </div>
            	</div>
            </section>
            <section class="container py-5">
				<form action="" id="passwords">
                    <div class="row text-muted">
                        <h5 class="mb-4 mt-0">Change Password</h5>
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
                    	  	<button type="submit" class="btn btn-sm btn-outline-success py-1 w-75 rounded-pill">Update Password</button>
                    	</div>
                    </div>
				</form>
			</section>
			<section class="container py-5">
				<div class="row text-muted">
				    <h5 class="mb-4 mt-0">Customer Support</h5>
                    <div class="col-md-12 mt-0">
                        <div class="stick-top bg-dark text-center text-white py-2">Chat with SBM</div>
                        <div class="border border-black card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px;" id="support-container">
							<!-- dynamic -->
                        </div>
                        <div class="stick-bot">
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
			});
		</script>
		<script type="text/javascript" src="js/user_header.js"></script>
		<script type="text/javascript" src="js/ph-address-selector.js"></script>
		<script type="text/javascript" src="js/account.js"></script>
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