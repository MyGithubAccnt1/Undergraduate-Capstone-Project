<?php 
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
							    	  			<form action="./php/login.php" method="POST">
								    	  			<div class="form-outline my-4">
								    	  			    <input type="email" placeholder="Enter your email" class="form-control rounded-0" name="email" required>
								    	  			</div>
								    	  			<div class="form-outline mb-4">
								    	  			    <input type="password" class="form-control rounded-0" placeholder="Enter your password" name="password" class="form-control" required>
								    	  			    <i class="uil uil-eye-slash showHidePw"></i>
								    	  			</div>
								    	  			<div class="row p-0 m-0">
								    	  			    <div class="col-6 p-0 m-0 d-flex justify-content-center align-items-center">
								    	  			        <input class="form-check-input" style="margin-right: 5px;" type="checkbox" checked/>
								    	  			        <label class="form-check-label">
								    	  			        	<small>Remember Me</small>
								    	  			     	</label>
								    	  			    </div>
								    	  			    <div class="col-6 d-flex justify-content-center align-items-center">
								    	  			    	<a class="text-white" href="#">
								    	  			    		<small class="my-auto">Forgot Password?</small>
								    	  			    	</a>
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
					    	  				    <form action="./php/register.php" method="POST">
					    	  					    <div class="form-outline my-4">
					    	  					    	<input type="email" placeholder="Enter your email" class="form-control rounded-0" name="email" required>
					    	  					    </div>
					    	  					    <div class="form-outline mb-4">
					    	  					    	<input type="password" class="form-control rounded-0" placeholder="Enter your password" id="password" required>
					    	  					    	<i class="uil uil-eye-slash showHidePw"></i>
					    	  					    </div>
					    	  					    <div class="form-outline mb-4">
					    	  					        <input type="password" class="form-control rounded-0"placeholder="Repeat your password" id="confirm_password" name="password" required>
					    	  					        <i class="uil uil-eye-slash showHidePw"></i>
					    	  					    </div>
					    	  					    <div class="row m-0 p-0">
								    	  			    <div class="col d-flex justify-content-center align-items-center">
								    	  			        <input class="form-check-input" style="margin-right: 5px;" type="checkbox" checked/>
								    	  			        <label class="form-check-label">
								    	  			        	<small>Accept Terms and Conditions</small>
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
		<script>
			var password = document.getElementById("password")
			  , confirm_password = document.getElementById("confirm_password");

			function validatePassword(){
			  if(password.value != confirm_password.value) {
			    confirm_password.setCustomValidity("Passwords Don't Match");
			  } else {
			    confirm_password.setCustomValidity('');
			  }
			}

			password.onchange = validatePassword;
			confirm_password.onkeyup = validatePassword;
		</script>
	</body>
</html>
<?php 
}
?>