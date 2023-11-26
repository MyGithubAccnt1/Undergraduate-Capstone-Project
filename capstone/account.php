<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
?>
<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	  	<?php include('./include/style.php') ?>
		<style>
			.btn-acccount {
			    background-color: #794B29;
			    color: white;
			}
		</style>
	</head>
	<body class="font-monospace">
		<?php include('./include/header.php') ?>
		<main class="container-fluid m-0 p-0">
			<section>
				<div class="row my-width mx-auto">
	                <div class="col-12">
	                    <div class="my-5">
	                    	<a href="./php/logout.php">
	                        	<div class="d-flex justify-content-end">
	                        	  	<button type="submit" class="btn-main py-1 my-3 w-50 rounded-pill">Logout</button>
	                        	</div>
	                        </a>
	                    <?php
	                    if ($_SESSION['role'] === "Admin") {
	                    ?>
	                        <a href="dashboard.php">
	                        	<div class="d-flex justify-content-end">
	                        	  	<button type="submit" class="btn-main py-1 my-3 w-50 rounded-pill">[Admin Mode]</button>
	                        	</div>
	                        </a>
	                    <?php
		                }else{

		                }
	                    ?>
	                        <h2 class="my-4">My Profile</h2>
	                        <hr>
	                    </div>
	                    <form action="" id="details">
	                        <div class="row mb-0 pb-0 gx-5">
	                            <div class="col mb-0">
	                                <div class="text-center text-danger">[Notice: Putting personal information here is just for convenience and not required by SBM]</div>
	                                <div class="bg-secondary-soft px-4 py-5 rounded">
	                                    <div class="row g-3">
	                                        <h4 class="mb-4 mt-0">Contact detail</h4>
	                                        <div class="col-md-6">
	                                            <label class="form-label">First Name</label>
	                                            <input type="text" class="form-control" value="<?php echo $_SESSION['fname']; ?>" id="fname">
	                                        </div>
	                                        <div class="col-md-6">
	                                            <label class="form-label">Last Name</label>
	                                            <input type="text" class="form-control" value="<?php echo $_SESSION['lname']; ?>" id="lname">
	                                        </div>
	                                        <div class="col-md-6">
	                                            <label class="form-label">Mobile Number</label>
	                                            <input type="text" class="form-control" value="<?php echo $_SESSION['mnumber']; ?>" id="mnumber">
	                                        </div>
	                                        <div class="col-md-6">
	                                            <label class="form-label">Email</label>
	                                            <input type="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" readonly>
	                                        </div>
	                                        <div class="col-md-12">
	                                            <label class="form-label">Complete Address</label>
	                                            <input type="text" class="form-control" value="<?php echo $_SESSION['caddress']; ?>" id="caddress">
	                                        </div>
	                                        <div class="d-flex justify-content-center">
				                        	  	<button type="submit" class="btn-main py-1 my-3 w-75 rounded-pill">Update Details</button>
				                        	</div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </form>
	                    <form action="" id="passwords">
	                        <div class="row mb-0 pb-0 gx-5">
	                            <div class="col">
	                                <div class="bg-secondary-soft px-4 py-5 rounded">
	                                    <div class="row g-3">
	                                        <h4 class="my-4">Change Password</h4>
	                                        <div class="col-md-6">
	                                            <label class="form-label">Old password</label>
	                                            <input type="password" class="form-control" id="old_password" name="password" required>
	                                        </div>
	                                        <div class="col-md-6">
	                                            <label class="form-label">New password</label>
	                                            <input type="password" class="form-control" id="password" required>
	                                        </div>
	                                        <div class="col-md-12">
	                                            <label class="form-label">Confirm Password</label>
	                                            <input type="password" class="form-control" name="new_password" id="confirm_password" required>
	                                        </div>
	                                        <div class="d-flex justify-content-center">
				                        	  	<button type="submit" class="btn-main py-1 my-3 w-75 rounded-pill">Update Password</button>
				                        	</div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </form>
	                    <?php
	                    if ($_SESSION['role'] === "Admin") {

		                }else{
		                ?>	
		                	<div class="row mb-0 pb-0 gx-5">
	                            <div class="col">
	                                <div class="bg-secondary-soft px-4 py-5 rounded">
	                                    <div class="row g-3">

	                                        <h4 class="my-4">Customer Support</h4>
	                                        <div class="col-md-12 mt-0">
	        	                                <div class="stick-top bg-dark text-center text-white py-2">Chat with SBM</div>
	        			                        <div class="border card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px;" id="comments-container">
	        										<!-- dynamic -->
	        			                        </div>
	        			                        <div class="stick-bot">
	        										<form id="comment-form">
	        											<div class="comment-area">
	        												<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>"/>
	        												<input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>"/>
	        												<input type="hidden" name="role" value="<?php echo $_SESSION['role'];?>"/>
	        												<input type="hidden" name="date" value="" id="dateInput"/>
	        												<textarea class="form-control rounded-0" placeholder="Type your message here." rows="1" name="comment" id="comment"></textarea>
	        											</div>
	        											<div class="d-flex justify-content-center">
	        												<button type="submit" class="btn-main rounded-pill py-1 my-1 btn btn-md w-75">Send</button>
	        											</div>
	        										</form>
	        			                        </div>
	                                        </div>

	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    <?php
		                }
	                    ?>
                        
	                </div>
				</div>
			</section>
		</main>
		<?php include('./include/footer.php') ?>
		<script type="text/javascript">
		    var toggleClick = document.querySelector(".box,.icon");
		    var navigation = document.querySelector("header");
		    var removeClick = document.querySelector(".close");
		    toggleClick.addEventListener('click', ()=>{
		        navigation.classList.toggle('active-nav');
		    })
		    removeClick.addEventListener('click', ()=>{
		        navigation.classList.remove('active-nav');
		    })
		</script>
        <script type="text/javascript">
    	    $("#details").submit(function (e) {
    	        e.preventDefault();

    	        var fname = $("#fname").val();
    	        var lname = $("#lname").val();
    	        var mnumber = $("#mnumber").val();
    	        var caddress = $("#caddress").val();

    	        $.ajax({
    	            url: "./php/update_details.php",
    	            method: "POST",
    	            data: {
    	            	fname: fname,
    	            	lname: lname,
    	            	mnumber: mnumber,
    	            	caddress: caddress
    	            },
    	            success: function (data) {
    	                if (data === "1") {
    	                	alert('Notice: Account details has been updated successfully.');
    	                } else {
    	                	alert('Notice: [' + data + ']');
    	                }
    	            },
    		        error: function (xhr, status, error) {
    		            console.error("AJAX Request Error:", status, error);
    		        }
    	        });
    	    });
        </script>
        <script type="text/javascript">
			$(document).on("submit", "#passwords", function (event) {
		        event.preventDefault();
		        var old_password = $("#old_password").val();
		        var password = $("#password").val();
		        var confirm_password = $("#confirm_password").val();

		        if (password === confirm_password) {

		        	if (old_password === password) {

		        		alert('The new password can not be the same with old password.');
		        		$("#password").val('');
		        		$("#confirm_password").val('');

		        	} else {

		        		function rot13Encrypt(str) {
		        		  return str.replace(/[a-zA-Z]/g, function (char) {
		        		    var offset = char <= 'Z' ? 65 : 97;
		        		    return String.fromCharCode((char.charCodeAt(0) - offset + 13) % 26 + offset);
		        		  });
		        		}

		        		var encryptedText = rot13Encrypt(password);
		        		var old_encryptedText = rot13Encrypt(old_password);

		        		$.ajax({
		        		    url: './php/update_password.php',
		        		    type: 'POST',
		        		    data: {
		        		    	old_password: old_encryptedText,
		        		    	password: encryptedText
		        		    },
		        		    success: function (data) {
		        		    	
		        		    	if (data === "1") {
		        		    		alert('Notice: Old password is incorrect.');
		        		    		$("#old_password").val('');
		        		    	} else if (data === "2") {
		        		    		alert('Notice: Account password has been updated successfully, proceed to logging out.');
		        		    		window.location.href = "./php/logout.php";
		        		    	} else {
		        		    		alert('Notice: [' + data + ']');
		        		    	}

		        		    }
		        		});

		        	}
		        	
	        	} else {

	        		alert('The new password does not match, please try again.');
	        		$("#confirm_password").val('');

	        	}
		    });
		</script>
		<script>
			function showComments() {
			    $.ajax({
			        url: "./php/get_messages.php",
			        method: "GET",
			        data: { date: $("#dateInput").val() },
			        success: function (data) {
			            $("#comments-container").html(data);
			        }
			    });
			}
			$("#comment-form").submit(function (e) {
			    e.preventDefault(); // Prevent the form from submitting traditionally

			    var formData = $(this).serialize();

			    $.ajax({
			        url: "./php/add_messages.php", // PHP script to insert comments into the database
			        method: "POST",
			        data: formData,
			        success: function (data) {
			            showComments();
			        }
			    });

			    $(this).find('textarea[name="comment"]').val('');
			});
	
	        showComments();
	        setInterval(showComments, 1000);
		</script>
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