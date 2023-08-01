<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	  	<?php include('include.php') ?>
		<style>
			.product-card {
			  	margin: 15px 0;
			}
			.product-button {
				width: 50%;
			}
		</style>
	</head>
	<body class="font-monospace bg-light">
		<?php include('header.php') ?>
		<main class="container-fluid my-4 my-width p-0">
			<div class="container">
				<div class="row">
				    <div class="col-sm-12 col-md-12 col-lg-4">
					    <div class="card px-2">
					        <h2 class="text-center">Filter by</h2>
					        <h4 class="text-center">
					        	<hr>Price<hr>
					        </h4>
					        <div class="card-body">
						        <form id="price-range-form">
						            <label for="min-price" class="form-label">Min price: </label>
						            <span id="min-price-txt">₱0</span>
						            <input type="range" class="form-range" min="0" max="999" id="min-price" step="1" value="0">
						            <label for="max-price" class="form-label">Max price: </label>
						            <span id="max-price-txt">₱1000</span>
						            <input type="range" class="form-range" min="1" max="1000" id="max-price" step="1" value="1000">
						        </form>
					        </div>
					    </div>
				    </div>
				    <div class="col-sm-12 col-md-12 col-lg-8">
					    <div class="card">
					        <div class="card-body">
					        	<div class="d-flex justify-content-center">
					        		<a href="customize.php">
					        			<button class="btn btn-outline-success rounded-0 btn-sm">CUSTOMIZE</button>
					        		</a>
					        	</div>
					          	<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
					          		<!-- Wrapper for carousel items -->
					          		<div class="carousel-inner" style="width: 100%">
					          			<div class="item carousel-item active" style="overflow-x: auto;">
					          				<div class="d-flex flex-direction-row gap-4" style="height: auto;">
					          					<?php
											include("connect.php");
											$sql = "SELECT price, title, thumbnail, link FROM product";
											$result = mysqli_query($conn, $sql);
											if (mysqli_num_rows($result) > 0) {
										      		// output data of each row
										      		while($row = mysqli_fetch_assoc($result);) {
										    	?>
													<div class="container p-0 m-0">
														<div class="thumb-wrapper border border-dark m-0" style="width: 200px;">
															<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
															<div class="img-box">
																<img src="<?php $row["thumbnail"] ?>" class="img-fluid" alt="Missing Image">
															</div>
															<div class="thumb-content">
																<h4><?php $row["title"] ?></h4>
																<p class="item-price"><b>₱ <?php $row["price"] ?></b></p>
																<a href="<?php $row["link"] ?>">
																	<button class="rounded-0 btn btn-outline-success btn-sm">View</button>
																</a>
															</div>
														</div>
													</div>
											<?php
										      		}
										    	} else {
										      		echo "0 results";
										   	}
										    	$conn->close();
										    	?>
					          				</div>
					          			</div>
					          		</div>
					          	</div>
					        </div>
					    </div>
				    </div>
				</div>
			</div>
		</main>
		<?php include('footer.php') ?>
		<script type="text/javascript">
			var navigation = document.querySelector("header");
			window.onload = navigation.classList.toggle('bg-dark');
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
	</body>
</html>
