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
							<a href="checkout.php">
							    <button class="btn-main py-1 mt-4 w-75 rounded-pill">BACK</button>
							</a>
						</div>
						<div class="col-6">
							<div class="row text-center">
							    <form action="" class="order">
							        <button type="submit" class="btn-main py-1 mt-4 w-75 rounded-pill">PROCEED</button>
							    </form>
							</div>
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
	                            <h4 class="my-2">Payment Method</h4>
	                            <div class="col-md-6">
	                                <input type="radio" id="cod" value="Cash On Delivery" checked>
	                                <label for="cod">Cash On Delivery</label>
	                            </div>
	                        </div>
	                        <div class="row my-3"><p>We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this <a href="https://www.privacypolicyonline.com/live.php?token=ZM97DWorTAK1pM4vwfamZ0eMicuqecNN" target="_blank">Privacy Policy</a>.</p></div>
	                    </div>
	                    <div class="col-sm-12 col-md-4 text-center">
	                        <h2 class="">ORDER SUMMARY</h2>
	                        <div class="m-0 p-0 border border-dark border-2 opacity-100 rounded-0">
	                            <div class="row m-0 p-0">
	                                <div class="col-5"><p class="my-auto">ITEM</p></div>
	                                <div class="col-3"><p class="my-auto">QTY</p></div>
	                                <div class="col-4"><p class="my-auto">PRICE</p></div>
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
	</body>
</html>
<script type="text/javascript">
	$(document).on("submit", ".order", function (event) {
        event.preventDefault(event);
        var fname = window.localStorage.getItem('fname');
        var lname = window.localStorage.getItem('lname');
        var mnumber = window.localStorage.getItem('mnumber');
        var email = window.localStorage.getItem('email');
   		var caddress = window.localStorage.getItem('caddress');
   		$.ajax({
   		    url: './php/add_history.php',
   		    type: 'POST',
   		    data: {
   		    	fname: fname,
   		    	lname: lname,
   		    	mnumber: mnumber,
   		    	email: email,
   		    	caddress: caddress
   		    },
   		    success: function (data) {
   		    	
   		    	if (data === "1") {
   		    		alert('Notice: Your cart is empty.');
   		    		window.location.href = "index.php";
   		    	} else if (data === "2") {
   		    		alert('Notice: Only 1 order can be made every minute per account.');
   		    	} else if (data === "3") {
   		    		alert('Notice: An unexpected error occur during submitting your order, please try again.');
   		    	} else if (data === "4") {
   		    		alert('Notice: Order has been submitted successfully.');
   		    		window.location.href = "view_order.php";
   		    	} else  if (data === "4") {
   		    		alert('Notice: The system experienced some error and cannot clear your cart automatically, order has been submitted successfully.');
   		    		window.location.href = "view_order.php";
   		    	} else {
   		    		alert('Notice: [' + data + ']');
   		    	}
   		    }
   		});
    });
</script>
<?php 
}else{
	echo"<script>var xlink = window.location.href;</script>";
	echo"<script>window.localStorage.setItem('xlink', xlink);</script>";
    echo"<script>alert('Notice: Please login to proceed.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>
