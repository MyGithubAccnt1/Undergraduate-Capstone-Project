<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ICO">
	  	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/capstone/"; include($IPATH."include.html"); ?>
		<style>
			.bg{
		  		position: absolute;
		  		z-index: -2;
		  		top: 0;
		  		left: 0;
		  		height: 100vh;
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
			    backdrop-filter: blur(25px);
			}
			.whole {
				height: -webkit-calc(100vh - 50px);
				height: -moz-calc(100vh - 50px);
				height: calc(100vh - 50px);
			}
			footer{
				position: absolute;
				top: 0;
				left: 0;
				margin-top: 100vh;
			}
		</style>
	</head>
	<body class="font-monospace">
		<?php include($IPATH."header.html"); ?>
		<main class="container-fluid">
			<section class="bg"></section>
			<section class="row d-flex justify-content-center align-items-center text-center text-white whole">
				<div class="border p-0" style="min-width: 320px; max-width:	420px;">
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
							    	  			<form>
								    	  			<div class="form-outline my-4">
								    	  			    <input type="email" placeholder="Enter your email" class="form-control rounded-0" required>
								    	  			</div>
								    	  			<div class="form-outline mb-4">
								    	  			    <input type="password" class="form-control rounded-0" placeholder="Enter your password" class="form-control" required>
								    	  			    <i class="uil uil-eye-slash showHidePw"></i>
								    	  			</div>
								    	  			<div class="row p-0 m-0">
								    	  			    <div class="col-6 p-0 m-0 d-flex justify-content-center align-items-center">
								    	  			        <input class="form-check-input" style="margin-right: 5px;" type="checkbox" checked/>
								    	  			        <label class="form-check-label" style="margin-top: 13px;">
								    	  			        	<p>Remember Me</p>
								    	  			     	</label>
								    	  			    </div>
								    	  			    <div class="col-6 d-flex justify-content-center align-items-center">
								    	  			    	<a class="text-white" href="#">
								    	  			    		<p class="my-auto">Forgot Password?</p>
								    	  			    	</a>
								    	  			    </div>
								    	  			</div>
								    	  			<div class="d-flex justify-content-center">
								    	  			  	<button type="submit" class="btn btn-primary my-3 w-100 rounded-pill">Sign in</button>
								    	  			</div>
							    	  			</form>
							    	  		</div>
							    	  	</div>
							    	  	<div class="tab-pane fade" id="customize-tab-pane" role="tabpanel" aria-labelledby="customize-tab" tabindex="0">
						    	  			<div class="container-fluid">
					    	  				    <form>
					    	  					    <div class="form-outline my-4">
					    	  					    	<input type="email" placeholder="Enter your email" class="form-control rounded-0" required>
					    	  					    </div>
					    	  					    <div class="form-outline mb-4">
					    	  					    	<input type="password" class="form-control rounded-0" placeholder="Enter your password" class="form-control" required>
					    	  					    	<i class="uil uil-eye-slash showHidePw"></i>
					    	  					    </div>
					    	  					    <div class="form-outline mb-4">
					    	  					        <input type="password" class="form-control rounded-0" placeholder="Repeat your password" class="form-control" required>
					    	  					        <i class="uil uil-eye-slash showHidePw"></i>
					    	  					    </div>
					    	  					    <div class="row m-0 p-0">
								    	  			    <div class="col d-flex justify-content-center align-items-center">
								    	  			        <input class="form-check-input" style="margin-right: 5px;" type="checkbox" checked/>
								    	  			        <label class="form-check-label" style="margin-top: 13px;">
								    	  			        	<p>Accept Terms and Conditions</p>
								    	  			        </label>
								    	  			    </div>
								    	  			</div>
								    	  			<div class="d-flex justify-content-center">
								    	  			  	<button type="submit" class="btn btn-success my-3 w-100 rounded-pill">Register</button>
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
		<?php include($IPATH."footer.html"); ?>
		<script>
			var navbar = document.querySelector('header')
			window.onscroll = function() {
			  if (window.pageYOffset > 0) {
			    navbar.classList.add('bg-dark')
			  } else {
			    navbar.classList.remove('bg-dark')
			  }
			}
		</script>
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
		<script type="text/javascript">signin.js</script>
	</body>
</html>