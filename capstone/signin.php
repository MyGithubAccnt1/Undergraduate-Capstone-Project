<?php 
error_reporting(0);
ini_set('display_errors', 0);
session_start(); 
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $script = "<script>window.location = 'account.php';</script>";
    echo $script;
}else{
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
			.bg{
		  		position: absolute;
		  		z-index: -2;
		  		top: 50px;
		  		left: 0;
		  		height: -webkit-calc(100vh - 50px);
				height: -moz-calc(100vh - 50px);
				height: calc(100vh - 50px);
		  		width: 100%;
		  		background-image: url('images/bg.gif');
		  		background-size: cover;
		  		background-repeat: no-repeat;
		  		filter: brightness(30%);
		  	}
			.container {
			    width: 100%;
			    background-color: rgba(255, 255, 255, 0.1);
			    box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
			    border: 1px solid rgba(255, 255, 255, 0.5);
			    border-right: 1px solid rgba(255, 255, 255, 0.2);
			    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
			    backdrop-filter: blur(5px);
			}
			.whole {
				height: -webkit-calc(100vh - 50px);
				height: -moz-calc(100vh - 50px);
				height: calc(100vh - 50px);
				width: 100%;
			}
			footer{
				position: absolute;
				top: 0;
				left: 0;
				margin-top: 100vh;
			}
			.btn-signin {
			    background-color: #794B29;
			    color: white;
			}
		</style>
	</head>
	<body class="font-monospace">
		<?php include('./include/header.php') ?>
		<main class="container-fluid m-0 p-0">
			<section class="bg"></section>
			<section class="d-flex justify-content-center align-items-center text-center text-white whole">
				<div class="p-0" style="max-width: 350px;">
					<div class="container-fluid d-flex justify-content-center p-0">
						<div class="container rounded">
							<div class="container-fluid my-4">
							    <div class="container-fluid">
							    	<div class="d-flex justify-content-center align-items-center">
								      	<ul class="nav nav-underline pb-0 d-flex justify-content-center" id="myTab" role="tablist">
									    	<li class="nav-item" role="presentation">
									      	    <a class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" role="tab" aria-controls="all-tab-pane" aria-selected="true" aria-current="page" href="#">Login</a>
									      	</li>
									      	<li class="nav-item">
									      	    <a class="nav-link" id="customize-tab" data-bs-toggle="tab" data-bs-target="#customize-tab-pane" role="tab" aria-controls="customize-tab-pane" aria-selected="false"href="#">Register</a>
									      	</li>
								      	</ul>
								    </div>
							    </div>
							    <div class="container-fluid">
							    	<div class="tab-content" id="myTabContent">
							    	  	<div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
							    	  		<div class="container-fluid">
							    	  			<form action="" id="login">
								    	  			<div class="form-outline my-4">
								    	  			    <input type="email" placeholder="Enter your email" class="form-control rounded-0" name="email" required>
								    	  			</div>
								    	  			<div class="form-outline mb-4">
								    	  			    <input type="password" class="form-control rounded-0" placeholder="Enter your password" name="password" class="form-control" required>
								    	  			    <i class="uil uil-eye-slash showHidePw"></i>
								    	  			</div>
								    	  			<div class="row p-0 m-0" style="font-size: 0.75rem;">
								    	  			    <div class="col-6 p-0 m-0" style="display: flex; align-items: center; justify-content: center; cursor: pointer;">
								    	  			        <input
								    	  			        class="form-check-input"
								    	  			        style="margin-right: 5px;"
								    	  			        type="checkbox"
								    	  			        unchecked/>
								    	  			        <small>Remember Me</small>
								    	  			    </div>
								    	  			    <div class="col-6 p-0 m-0" style="display: flex; align-items: center; justify-content: center; cursor: pointer;">
								    	  			    	<small>Forgot Password?</small>
								    	  			    </div>
								    	  			</div>
								    	  			<div class="d-flex justify-content-center">
								    	  			  	<button type="submit" class="btn-main py-1 my-3 w-100 rounded-pill">Sign in</button>
								    	  			</div>
							    	  			</form>
							    	  		</div>
							    	  	</div>
							    	  	<div class="tab-pane fade" id="customize-tab-pane" role="tabpanel" aria-labelledby="customize-tab" tabindex="0">
						    	  			<div class="container-fluid">
					    	  				    <form action="" id="register">
					    	  					    <div class="form-outline my-4">
					    	  					    	<input type="email" placeholder="Enter your email" class="form-control rounded-0" name="email" required>
					    	  					    </div>
					    	  					    <div class="form-outline mb-4">
					    	  					    	<input type="password" class="form-control rounded-0" placeholder="Enter your password" name="password" required>
					    	  					    	<i class="uil uil-eye-slash showHidePw"></i>
					    	  					    </div>
					    	  					    <div class="form-outline mb-4">
					    	  					        <input type="password" class="form-control rounded-0"placeholder="Repeat your password" name="repeat" required>
					    	  					        <i class="uil uil-eye-slash showHidePw"></i>
					    	  					    </div>
					    	  					    <div class="row m-0 mb-1 p-0">
								    	  			    <div class="col d-flex justify-content-center align-items-center">
								    	  			        <input 
								    	  			        class="form-check-input" 
								    	  			        style="margin-right: 5px;" 
								    	  			        type="checkbox" 
								    	  			        id="acceptTNC" 
								    	  			        unchecked/>
								    	  			        <label class="form-check-label" style="font-size: 0.75rem;">
								    	  			        	<small>Accept <a href="https://www.privacypolicyonline.com/live.php?token=r2kj81dFhmzvA2BRCVmzH585g5j7EWRR" target="_blank">Terms and Conditions</a></small>
								    	  			        </label>
								    	  			    </div>
								    	  			</div>
								    	  			<div class="d-flex justify-content-center">
								    	  			  	<button type="submit" class="btn-main py-1 my-3 w-100 rounded-pill">Register</button>
								    	  			</div>
					    	  				    </form>
						    	  			</div>
							    	  	</div>
							    	</div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<?php include('./include/footer.php') ?>
		<script>
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
		<script src="./js/signin.js"></script>
		<script type="text/javascript">
			$(document).on("submit", "#register", function (event) {
		        event.preventDefault();
		        var email = $(this).find("input[name='email']").val();
		        var password = $(this).find("input[name='password']").val();
		        var repeat = $(this).find("input[name='repeat']").val();
		        var acceptTNC = document.getElementById('acceptTNC');

		        if (acceptTNC.checked) {

		        	if (password === repeat) {

		        		$.ajax({
		        		    url: './php/register.php',
		        		    type: 'POST',
		        		    data: {
		        		    	email: email,
		        		    	password: password
		        		    },
		        		    success: function (data) {
		        		    	
		        		    	if (data === "1") {
		        		    		alert('Notice: This email is already in used, please try another email.');
		        		    		$(this).find("input[name='email']").val('');
		        		    	} else if (data === "2") {
		        		    		alert('Notice: An account is successfully created.');
		        		    		window.location.href = "account.php";
		        		    	} else if (data === "3") {
		        		    		alert('Notice: An unexpected error occur during the creation of your account, please try again.');
		        		    	} else {
		        		    		alert('Notice: [' + data + ']');
		        		    	}

		        		    }
		        		});

		        	} else {

		        		alert('The password does not match, please try again.');
		        		$(this).find("input[name='repeat']").val('');

		        	}

		        } else {

		        	alert('Please read and accept our Terms and Conditions.');

		        }
		    });
		</script>
		<script type="text/javascript">
			$(document).on("submit", "#login", function (event) {
		        event.preventDefault();
		        var email = $(this).find("input[name='email']").val();
		        var password = $(this).find("input[name='password']").val();
		        $.ajax({
		            url: './php/login.php',
		            type: 'POST',
		            data: {
		            	email: email,
		            	password: password
		            },
		            success: function (data) {
		            	
		            	if (data === "1") {
		            		alert('Notice: Invalid Email or Password.')
		            		$(this).find("input[name='email']").val('');
		            		$(this).find("input[name='password']").val('');
		            	} else if (data === "2") {
		            		alert('Notice: Logging in successful, welcome back [Administrator]!')
		            		window.location.href = "account.php";
		            	} else if (data === "3") {
		            		alert('Notice: Logging in successful, welcome back!')
		            		window.location.href = "index.php";
		            	} else {
		            		alert('Notice: [' + data + ']')
		            	}

		            }
		        });
		    });
		</script>
	</body>
</html>
<?php 
}
?>