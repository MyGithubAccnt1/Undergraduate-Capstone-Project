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
	  	<?php include('include.php') ?>
	</head>
	<body class="font-monospace">
		<?php include('header.php') ?>
		<main class="container-fluid">
			<div class="container-fluid my-width my-4">
                <div class="row mx-0 my-4 p-0">
                    <h2>checkout</h2>
                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height: 12px">
                      <div class="progress-bar" style="width: 100%">100%</div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-sm-12 col-md-8">
                        <div class="row g-3">
                            <h4 class="my-2">Payment Method</h4>
                            <div class="col-md-6">
                                <input type="radio" id="cod" value="Cash On Delivery" checked>
                                <label for="cod">Cash On Delivery</label>
                            </div>
                        </div>
                        <div class="row my-3"><p>We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this <a href="https://www.freeprivacypolicy.com/live/353db79e-7657-4eff-b91f-9ad4e772791f" target="_blank">Privacy Policy</a>.</p></div>
                    </div>
                    <div class="col-sm-12 col-md-4 text-center">
                        <h4 class="my-2">ORDER SUMMARY</h4>
                        <div class="m-0 p-0 border border-dark rounded">
                            <div class="row m-0 p-0">
                                <div class="col-6"><p class="my-auto">ITEM</p></div>
                                <div class="col-3"><p class="my-auto">QTY</p></div>
                                <div class="col-3"><p class="my-auto">PRICE</p></div>
                                <hr class="border border-dark border-1 my-1 opacity-100">
                            </div>
                            <div class="row m-0 p-0">
                                <div class="row m-0 p-0">
                                    <div class="col-6"><p class="text-start my-auto"><?php echo $_SESSION['title']; ?></p></div>
                                    <div class="col-3"><p class="my-auto"><?php echo $_SESSION['qty']; ?></p></div>
                                    <div class="col-3"><p class="text-end my-auto">₱<?php echo $_SESSION['price']; ?></p></div>
                                </div>
                            </div>
                            <div class="row m-0 p-0">
                                <hr class="border border-dark border-1 my-1 opacity-100">
                                <p class="text-start my-auto">TOTAL: ₱<?php echo $_SESSION['price']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <a href="#!">
                        <button class="btn btn-danger btn-sm mt-3 w-75 rounded-pill">PROCEED</button>
                    </a>
                </div>
            </div>
		</main>
		<?php include('footer.php') ?>
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
<?php
}else{
    echo"<script>alert('Notice: Please login to proceed.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>
