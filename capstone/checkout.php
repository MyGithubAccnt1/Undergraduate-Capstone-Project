<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
	error_reporting(0);
	ini_set('display_errors', 0);
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
		</style>
	</head>
	<body class="font-monospace">
		<main class="container-fluid m-0 p-0">
			<section>
				<div class="container-fluid my-width my-4">
					<div class="row text-center">
						<div class="col-6">
							<a href="account.php">
							    <button class="btn-main py-1 mt-4 w-75 rounded-pill">BACK</button>
							</a>
						</div>
						<div class="col-6">
							<a href="proceed.php">
							    <button class="btn-main py-1 mt-4 w-75 rounded-pill">NEXT</button>
							</a>
						</div>
	                </div>
	                <div class="row gx-5">
	                    <div class="col-sm-12 col-md-8">
	                    	<div class="row mx-0 my-4 p-0">
	                    	    <h2>checkout</h2>
	                    	    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height: 12px">
	                    	      <div class="progress-bar" style="width: 50%">50%</div>
	                    	    </div>
	                    	</div>
	                        <div class="row g-3">
	                            <h4 class="my-2">Billing Address</h4>
	                            <div class="col-md-6">
	                                <label class="form-label">First Name</label>
	                                <input type="text" class="form-control" value="<?php echo $_SESSION['fname']; ?>">
	                            </div>
	                            <div class="col-md-6">
	                                <label class="form-label">Last Name</label>
	                                <input type="text" class="form-control" value="<?php echo $_SESSION['lname']; ?>">
	                            </div>
	                            <div class="col-md-6">
	                                <label class="form-label">Mobile Number</label>
	                                <input type="text" class="form-control" value="<?php echo $_SESSION['mnumber']; ?>">
	                            </div>
	                            <div class="col-md-6">
	                                <label class="form-label">Email</label>
	                                <input type="email" class="form-control" value="<?php echo $_SESSION['email']; ?>">
	                            </div>
	                            <div class="col-md-12">
	                                <label class="form-label">Complete Address</label>
	                                <input type="email" class="form-control" value="<?php echo $_SESSION['caddress']; ?>">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-sm-12 col-md-4 text-center">
	                        <h2 class="">ORDER SUMMARY</h2>
	                        <div class="m-0 p-0 border border-dark border-2 opacity-100 rounded-0">
	                            <div class="row m-0 p-0">
	                                <div class="col-6"><p class="my-auto">ITEM</p></div>
	                                <div class="col-3"><p class="my-auto">QTY</p></div>
	                                <div class="col-3"><p class="my-auto">PRICE</p></div>
	                                <hr class="border border-dark border-1 my-1 opacity-100">
	                            </div>
	                            <div class="row m-0 p-0">
	                                <div class="row m-0 p-0">
	                                    <?php include ('./php/get_checkout.php') ?>
	                                </div>
	                            </div>
	                            <div class="row m-0 p-0">
	                                <hr class="border border-dark border-1 my-1 opacity-100">
	                                <small><?php include ('./php/subtotal_cart.php') ?></small>
	                            </div>
	                        </div>
	                    </div>
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
	</body>
</html>
<?php 
}else{
    echo"<script>alert('Notice: Please login to proceed.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>
