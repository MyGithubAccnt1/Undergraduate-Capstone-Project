<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ICO">
	  	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/capstone/"; include($IPATH."include.html"); ?>
	</head>
	<body class="font-monospace bg-light">
		<?php include($IPATH."header.html"); ?>
		<main class="container-fluid">
			<div class="row my-width mx-auto">
                <div class="col-12">
                    <div class="my-5">
                        <h3>My Profile</h3>
                        <hr>
                    </div>
                    <form>
                        <div class="row mb-0 pb-0 gx-5">
                            <div class="col mb-0">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <h4 class="mb-4 mt-0">Contact detail</h4>
                                        <div class="col-md-6">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" value="">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" value="">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" value="">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" value="">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Complete Address</label>
                                            <input type="email" class="form-control" value="">
                                        </div>
                                        <div class="gap-3 d-md-flex justify-content-md-end text-center">
                                            <button type="button" class="btn btn-success btn-md">Update Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0 pb-0 gx-5">
                            <div class="col">
                                <div class="bg-secondary-soft px-4 py-5 rounded">
                                    <div class="row g-3">
                                        <h4 class="my-4">Change Password</h4>
                                        <div class="col-md-6">
                                            <label class="form-label">Old password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">New password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="gap-3 d-md-flex justify-content-md-end text-center">
                                            <button type="button" class="btn btn-success btn-md">Update Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</main>
		<?php include($IPATH."footer.html"); ?>
		<script type="text/javascript">
			var navigation = document.querySelector("header");
			window.onload = navigation.classList.toggle('bg-dark');
		</script>
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
	</body>
</html>