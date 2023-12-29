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
			.bg{
		  		position: absolute;
		  		z-index: -1;
		  		top: 0;
		  		left: 0;
				height: 100vh;
		  		width: 100%;
		  		background-image: url('images/bg.gif');
		  		background-size: cover;
		  		background-repeat: no-repeat;
		  		filter: brightness(25%);
		  	}
		  	.main{
		  		position: absolute;
		  		top: 50px;
		  		left: 0;
		  		height: -webkit-calc(100vh - 50px);
				height: -moz-calc(100vh - 50px);
				height: calc(100vh - 50px);
		  		width: 100%;
		  		padding: 0;
		  		margin: 0;
		  		display: flex;
		  		align-items: center;
		  		justify-content: center;
		  	}
		  	.container {
			    min-width: 320px;
			    width: 50%;
			    background-color: rgba(255, 255, 255, 0.1);
			    box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
			    border: 1px solid rgba(255, 255, 255, 0.5);
			    border-radius: 5px;
			    border-right: 1px solid rgba(255, 255, 255, 0.2);
			    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
			    backdrop-filter: blur(5px);
			    display: flex;
			    justify-content: center;
			    align-items: center;
			    flex-direction: column;
			    color: #fff;
			}
			.signin_navigation {
				display: flex;
				justify-content: space-evenly;
				align-items: center;
				text-align: center;
				margin-top: 20px;
			}
			.nav-link {
				border: none;
				padding: 3px 5px;
				margin: 0;
			}
			.nav-link:hover {
				border: 1px dashed #fff;
				border-style: none none solid none;
				color: #fff !important;
			}
			.active {
				color: #fff !important;
				border: 1px dashed #fff;
				border-style: none none solid none;
			}
			.termsNcondition {
				position: absolute;
				z-index: 3;
				top: 50px;
				left: 0;
				width: 100%;
				height: calc(100vh - 50px);
				display: flex;
				align-items: center;
				justify-content: center;
				visibility: hidden;
			}
			.darker {
				position: absolute;
				z-index: 2;
				top: 50px;
				left: 0;
				width: 100%;
				height: calc(100vh - 50px);
				display: flex;
				align-items: center;
				justify-content: center;
				visibility: hidden;
			}
			.darkercontainer {
			    width: 100%;
			    height: 100%;
				filter: brightness(50%);
				backdrop-filter: blur(10px);
			}
			.tnc-close {
				position: absolute;
				top: 0;
				left: 0;
				margin: 10px 0 0 15px;
			}
		</style>
	</head>
	<body>
		<main class="container-fluid p-0 m-0">
			<?php include('include/user_header.php') ?>
			<section class="bg"></section>
			<section class="darker">
				<section class="darkercontainer p-5"></section>
			</section>
			<section class="termsNcondition">
				<div class="container p-5">
					<button type="button" class="tnc-close btn-main pt-1 mt-3 w-25 rounded-pill">Back</button>
					<div class="w-100 mt-4 text-white" style="height: 50vh; overflow-y: auto; overflow-x: hidden;">
						<h1 class="font-monospace text-center">Terms and Conditions</h1><br>
						<p class="font-monospace text-start">These terms and conditions outline the rules and regulations for the use of Saint Benedict Medallion's Website, located at http://20.205.112.210/.</p>
						<p class="font-monospace text-start">By accessing this website we assume you accept these terms and conditions. Do not continue to use Saint Benedict Medallion if you do not agree to take all of the terms and conditions stated on this page.</p>
						<p class="font-monospace text-start">The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Philippines. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
						<h5 class="font-monospace text-start">License</h5>
						<p class="font-monospace text-start">Unless otherwise stated, Saint Benedict Medallion and/or its licensors own the intellectual property rights for all material on Saint Benedict Medallion. All intellectual property rights are reserved. You may access this from Saint Benedict Medallion for your own personal use subjected to restrictions set in these terms and conditions.</p>
						<p class="font-monospace text-start">You must not:</p>
						<li class="font-monospace text-start">Republish material from Saint Benedict Medallion;</li>
						<li class="font-monospace text-start">Sell, rent or sub-license material from Saint Benedict Medallion;</li>
						<li class="font-monospace text-start">Reproduce, duplicate or copy material from Saint Benedict Medallion;</li>
						<li class="font-monospace text-start">Redistribute content from Saint Benedict Medallion.</li>
						<p class="font-monospace text-start">This Agreement shall begin on the date hereof.</p>
						<p class="font-monospace text-start">Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Saint Benedict Medallion does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Saint Benedict Medallion,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, Saint Benedict Medallion shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>
						<p class="font-monospace text-start">Saint Benedict Medallion reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>
						<p class="font-monospace text-start">You warrant and represent that:</p>
						<li class="font-monospace text-start">You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
						<li class="font-monospace text-start">The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
						<li class="font-monospace text-start">The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy;</li>
						<li class="font-monospace text-start">The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li><br>
						<h5 class="font-monospace text-start">Content Liability</h5>
						<p class="font-monospace text-start">We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>
						<h5 class="font-monospace text-start">Removal of links from our website</h5>
						<p class="font-monospace text-start">If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>
						<p class="font-monospace text-start">We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>
						<h5 class="font-monospace text-start">Disclaimer</h5>
						<p class="font-monospace text-start">To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>
						<li class="font-monospace text-start">limit or exclude our or your liability for death or personal injury;</li>
						<li class="font-monospace text-start">limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
						<li class="font-monospace text-start">limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
						<li class="font-monospace text-start">exclude any of our or your liabilities that may not be excluded under applicable law.</li><br>
						<p class="font-monospace text-start">The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>
						<p class="font-monospace text-start">As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>
					</div>
				</div>
			</section>
			<section class="main">
				<div class="container">
					<div class="w-100">
				      	<ul class="nav nav-fill signin_navigation" id="myTab" role="tablist">
					    	<li class="nav-item" role="presentation">
					      	    <a class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane" role="tab" aria-controls="login-tab-pane" aria-selected="true" aria-current="page" href="#">LOGIN</a>
					      	</li>
					      	<li class="nav-item">
					      	    <a class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-tab-pane" role="tab" aria-controls="register-tab-pane" aria-selected="false" href="#">REGISTER</a>
					      	</li>
				      	</ul>
					</div>
					<div class="w-75">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active signin_navigation border-0" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab" tabindex="0">
								<form action="" id="login">
				    	  			<div class="form-outline my-4">
				    	  			    <input type="email" placeholder="Enter your email" class="form-control rounded-0" name="email" id="email" required>
				    	  			</div>
				    	  			<div class="form-outline mb-4">
				    	  			    <input type="password" class="form-control rounded-0" placeholder="Enter your password" name="password" id="password" required>
				    	  			    <i class="uil uil-eye-slash"></i>
				    	  			</div>
				    	  			<div class="row p-0 m-0">
				    	  			    <div class="col-6 p-0 m-0 d-flex justify-content-start align-items-center">
				    	  			        <input class="form-check-input" style="margin: 0 5px 0 0;" type="checkbox" id="remember-check"/>
				    	  			        <button type="button" title="Save Login Credentials" style="font-size: 0.74rem; border: none; margin: 0; padding: 0;background-color: inherit; color: #fff;" id="remember-button">Remember Me</button>
				    	  			    </div>
				    	  			    <div class="col-6 p-0 m-0 d-flex align-items-center justify-content-end">
				    	  			    	<button type="button" title="Recover forgotten password" style="font-size: 0.74rem; border: none; margin: 0; padding: 0; background-color: inherit; color: #fff;" id="forgot-button">Forgot Password?</button>
				    	  			    </div>
				    	  			</div>
				    	  			<div class="d-flex justify-content-center">
				    	  			  	<button type="submit" class="btn-main py-1 my-3 w-100 rounded-pill">Sign in</button>
				    	  			</div>
			    	  			</form>
							</div>
							<div class="tab-pane fade signin_navigation border-0" id="register-tab-pane" role="tabpanel" aria-labelledby="register-tab" tabindex="0">
								<form action="" id="register">
	    	  					    <div class="form-outline my-4">
	    	  					    	<input type="email" placeholder="Enter your email" class="form-control rounded-0" name="email" required>
	    	  					    </div>
	    	  					    <div class="form-outline mb-4">
	    	  					    	<input type="password" class="form-control rounded-0" placeholder="8-16 digit password" name="password" required>
	    	  					    	<i class="uil uil-eye-slash"></i>
	    	  					    </div>
	    	  					    <div class="form-outline mb-4">
	    	  					        <input type="password" class="form-control rounded-0"placeholder="Repeat your password" name="repeat" required>
	    	  					        <i class="uil uil-eye-slash"></i>
	    	  					    </div>
	    	  					    <div class="row m-0 p-0">
				    	  			    <div class="col d-flex justify-content-center align-items-center">
				    	  			        <input class="form-check-input" style="margin: 0 5px 0 0;" type="checkbox" id="accept-check"/>
				    	  			        <label class="form-check-label d-flex align-items-center">
				    	  			        	<button type="button" style="font-size: 0.74rem; border: none; margin: 0; padding: 0; background-color: inherit; color: #fff;" title="View our Terms & Conditions" id="accept-button">Accept Terms & Conditions</button>
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
			</section>
		</main>
		<script type="text/javascript">
			$(window).on('load', function() {
			  $(".loader").fadeOut('slow');
			  $('#login').find("input[name='email']").focus();
			});
		</script>
		<script type="text/javascript" src="js/user_header.js"></script>
		<script type="text/javascript" src="js/signin.js"></script>
	</body>
</html>