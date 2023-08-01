<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	  	<?php include('include.php') ?>
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
		</style>
	</head>
	<body class="font-monospace bg-light">
		<?php include('header.php') ?>
		<main class="container-fluid">
			<section class="bg"></section>
			<section class="row d-flex justify-content-center align-items-center text-left text-white" style="height: calc(100vh - 50px);">
				<div class="my-width p-3">
					<h1 style="font-size: 3rem;">SAINT BENEDICT MEDALLION</h1><br><br><br>
					<p class="d-none d-md-block">A place for people who loves religious jewelry and fashion items.<br>Saint Benedict Medallion is specialized in handcrafted necklaces.<br>Our timeless designs are inspired by faith and nature, crafted with quality materials and love.</p><hr>
					<a href="#!">
						<button class="btn btn-danger rounded-0 btn-md">SHOP NOW</button>
					</a>
				</div>
			</section><br>
			<div class="row">
				<div class="container-xl my-width d-block d-md-none">
					<div class="row">
						<div class="col-md-12">
							<h2>Featured Products</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="one_sm_slideshow" style="height: auto;">
										<?php
										include("connect.php");
										$sql = "SELECT price, title, thumbnail FROM product";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="col-sm-6 p-0">
													<div class="thumb-wrapper border border-dark" style="width: 200px;">
														<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<form action="get_product.php" method="POST">
																<input type="hidden" name="title" value="<?php echo $row['title']?>">
																<h4><?php echo $row['title']?></h4>
																<p class="item-price"><b>₱ <?php echo $row['price']?></b></p>
																<button type="submit" class="rounded-0 btn btn-outline-success btn-sm">View</button>
															</form>
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
				<div class="container-xl my-width d-none d-sm-block">
					<div class="row">
						<div class="col-md-12">
							<h2>Featured Products</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="one_md_slideshow" style="height: auto;">
										<?php
										include("connect.php");
										$sql = "SELECT price, title, thumbnail FROM product";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="container p-0 m-0">
													<div class="thumb-wrapper border border-dark m-0" style="width: 200px;">
														<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<form action="get_product.php" method="POST">
																<input type="hidden" name="title" value="<?php echo $row['title']?>">
																<h4><?php echo $row['title']?></h4>
																<p class="item-price"><b>₱ <?php echo $row['price']?></b></p>
																<button type="submit" class="rounded-0 btn btn-outline-success btn-sm">View</button>
															</form>
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
				<div class="container-fluid py-5" style="background-color: #1c2331;">
					<div class="m-0 p-0 mx-auto my-width slide-edit" style="overflow: hidden;">
						<h2 class = "text-center text-white">New Arrivals</h2>
						<div class="container-fluid m-0 p-0">
							<div class="slider">
							    	<div class="rotator">
									<div class="items">
										<a href="preview.php">
											<img src="images/set1.png" style="background-color: white;"/>
										</a>
									</div>
									<div class="items">
										<a href="preview.php">
											<img src="images/set2.png" style="background-color: white;"/>
										</a>
									</div>
									<div class="items">
										<a href="preview.php">
											<img src="images/set3.png" style="background-color: white;"/>
										</a>
									</div>
									<div class="items">
										<a href="preview.php">
											<img src="images/set4.png" style="background-color: white;"/>
										</a>
									</div>
									<div class="items">
										<a href="preview.php">
											<img src="images/set5.png" style="background-color: white;"/>
										</a>
									</div>
									<div class="items">
										<a href="preview.php">
											<img src="images/set6.png" style="background-color: white;"/>
										</a>
									</div>
									<div class="items">
									    	<a href="preview.php">
											<img src="images/set7.png" style="background-color: white;"/>
										</a>
								   	</div>
								    	<div class="items">
								    		<a href="preview.php">
											<img src="images/set8.png" style="background-color: white;"/>
										</a>
								    	</div>
								    	<div class="items">
								    		<a href="preview.php">
											<img src="images/set9.png" style="background-color: white;"/>
										</a>
								    	</div>
							    	</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-xl my-width d-block d-md-none">
					<div class="row">
						<div class="col-md-12">
							<h2>Necklaces</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">
								<!-- Carousel indicators -->
								<ol class="carousel-indicators">
									<a href="product.php">
										<button class="btn btn-outline-success btn-sm rounded-0">View All</button>
									</a>
								</ol>   
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="two_sm_slideshow" style="height: auto;">
										<?php
										include("connect.php");
										$sql = "SELECT price, title, thumbnail, link FROM product";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="col-sm-6 p-0">
													<div class="thumb-wrapper border border-dark" style="width: 200px;">
														<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<h4><?php echo $row['title']?></h4>
															<p class="item-price"><b>₱ <?php echo $row['price']?></b></p>
															<a href="<?php echo $row['link']?>">
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
				<div class="container-xl my-width d-none d-sm-block">
					<div class="row">
						<div class="col-md-12" id="go-here">
							<h2>Necklaces</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">
								<ol class="carousel-indicators">
									<a href="product.php">
										<button class="btn btn-outline-success btn-sm rounded-0">View All</button>
									</a>
								</ol>
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="two_md_slideshow" style="height: auto;">
										<?php
										include("connect.php");
										$sql = "SELECT price, title, thumbnail, link FROM product";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="container p-0 m-0">
													<div class="thumb-wrapper border border-dark m-0" style="width: 200px;">
														<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<h4><?php echo $row['title']?></h4>
															<p class="item-price"><b>₱ <?php echo $row['price']?></b></p>
															<a href="<?php echo $row['link']?>">
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
				<div class="container-xl my-width d-block d-md-none">
					<div class="row">
						<div class="col-md-12">
							<h2>Pins</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">
								<!-- Carousel indicators -->
								<ol class="carousel-indicators">
									<a href="product.php">
										<button class="btn btn-outline-success btn-sm rounded-0">View All</button>
									</a>
								</ol>   
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="three_sm_slideshow" style="height: auto;">
										<?php
										include("connect.php");
										$sql = "SELECT price, title, thumbnail, link FROM product";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="col-sm-6 p-0">
													<div class="thumb-wrapper border border-dark" style="width: 200px;">
														<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<h4><?php echo $row['title']?></h4>
															<p class="item-price"><b>₱ <?php echo $row['price']?></b></p>
															<a href="<?php echo $row['link']?>">
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
				<div class="container-xl my-width d-none d-sm-block">
					<div class="row">
						<div class="col-md-12">
							<h2>Pins</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">
								<!-- Carousel indicators -->
								<ol class="carousel-indicators">
									<a href="product.php">
										<button class="btn btn-outline-success btn-sm rounded-0">View All</button>
									</a>
								</ol>   
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="three_md_slideshow" style="height: auto;">
										<?php
										include("connect.php");
										$sql = "SELECT price, title, thumbnail, link FROM product";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="container p-0 m-0">
													<div class="thumb-wrapper border border-dark m-0" style="width: 200px;">
														<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<h4><?php echo $row['title']?></h4>
															<p class="item-price"><b>₱ <?php echo $row['price']?></b></p>
															<a href="<?php echo $row['link']?>">
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
				<div class="container-xl my-width d-block d-md-none">
					<div class="row">
						<div class="col-md-12">
							<h2>Table Nameplates</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">
								<!-- Carousel indicators -->
								<ol class="carousel-indicators">
									<a href="product.php">
										<button class="btn btn-outline-success btn-sm rounded-0">View All</button>
									</a>
								</ol>   
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="four_sm_slideshow" style="height: auto;">
										<?php
										include("connect.php");
										$sql = "SELECT price, title, thumbnail, link FROM product";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="col-sm-6 p-0">
													<div class="thumb-wrapper border border-dark" style="width: 200px;">
														<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<h4><?php echo $row['title']?></h4>
															<p class="item-price"><b>₱ <?php echo $row['price']?></b></p>
															<a href="<?php echo $row['link']?>">
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
				<div class="container-xl my-width d-none d-sm-block">
					<div class="row">
						<div class="col-md-12">
							<h2>Table Nameplates</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">
								<!-- Carousel indicators -->
								<ol class="carousel-indicators">
									<a href="product.php">
										<button class="btn btn-outline-success btn-sm rounded-0">View All</button>
									</a>
								</ol>   
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="four_md_slideshow" style="height: auto;">
										<?php
										include("connect.php");
										$sql = "SELECT price, title, thumbnail, link FROM product";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="container p-0 m-0">
													<div class="thumb-wrapper border border-dark m-0" style="width: 200px;">
														<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<h4><?php echo $row['title']?></h4>
															<p class="item-price"><b>₱ <?php echo $row['price']?></b></p>
															<a href="<?php echo $row['link']?>">
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
				<div class="container-xl my-width d-block d-md-none">
					<div class="row">
						<div class="col-md-12">
							<h2>Logo Seal</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">
								<!-- Carousel indicators -->
								<ol class="carousel-indicators">
									<a href="product.php">
										<button class="btn btn-outline-success btn-sm rounded-0">View All</button>
									</a>
								</ol>   
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="five_sm_slideshow" style="height: auto;">
										<?php
										include("connect.php");
										$sql = "SELECT price, title, thumbnail, link FROM product";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="col-sm-6 p-0">
													<div class="thumb-wrapper border border-dark" style="width: 200px;">
														<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<h4><?php echo $row['title']?></h4>
															<p class="item-price"><b>₱ <?php echo $row['price']?></b></p>
															<a href="<?php echo $row['link']?>">
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
				<div class="container-xl my-width d-none d-sm-block">
					<div class="row">
						<div class="col-md-12">
							<h2>Logo Seal</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">
								<!-- Carousel indicators -->
								<ol class="carousel-indicators">
									<a href="product.php">
										<button class="btn btn-outline-success btn-sm rounded-0">View All</button>
									</a>
								</ol>   
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="five_md_slideshow" style="height: auto;">
										<?php
										include("connect.php");
										$sql = "SELECT price, title, thumbnail, link FROM product";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="container p-0 m-0">
													<div class="thumb-wrapper border border-dark m-0" style="width: 200px;">
														<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<h4><?php echo $row['title']?></h4>
															<p class="item-price"><b>₱ <?php echo $row['price']?></b></p>
															<a href="<?php echo $row['link']?>">
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
				<div class="container-fluid py-5 text-white text-center" style="background-color: #1c2331;">
					<div class="container-xl my-width d-none d-lg-block">
						<div class="row">
							<div class="col-md-12">
								<h2>Services</h2>
								<div id="myCarouService" class="carousel slide" data-ride="carousel" data-interval="0"> 
									<!-- Wrapper for carousel items -->
									<div class="carousel-inner">
										<div class="item carousel-item active">
											<div class="row">
												<div class="col-sm-4">
													<div class="thumb-wrapper border border-dark">
														<div class="img-box">
															<img src="images/delivery.jpg" class="img-fluid" alt="">
														</div>
														<div class="thumb-content">
															<h4>Nation Wide Delivery</h4>
															<p class="item-price"><b>Your go-to for beautiful handmade necklaces. Choose from a selection of high-quality, one-of-a-kind pieces, or create your own design for a truly unique accessory.</b></p>
														</div>						
													</div>
												</div>
												<div class="col-sm-4">
													<div class="thumb-wrapper border border-dark">
														<div class="img-box">
															<img src="images/cross.png" class="img-fluid" alt="">
														</div>
														<div class="thumb-content">
															<h4>Customization</h4>
															<p class="item-price"><b>Offering customers the opportunity to select the design and type of necklace they desire.</b></p>
														</div>						
													</div>
												</div>		
												<div class="col-sm-4">
													<div class="thumb-wrapper border border-dark">
														<div class="img-box">
															<img src="images/clean.jpg" class="img-fluid" alt="">
														</div>
														<div class="thumb-content">
															<h4>Cleaning & Maintenance</h4>
															<p class="item-price"><b>Providing customers with a professional cleaning and maintenance service for their necklaces.</b></p>
														</div>						
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="container-xl my-width d-none d-md-block d-lg-none">
						<div class="row">
							<div class="col-md-12">
								<h2>Services</h2>
								<div id="myCarouService" class="carousel slide" data-ride="carousel" data-interval="0"> 
									<!-- Wrapper for carousel items -->
									<div class="carousel-inner">
										<div class="item carousel-item active">
											<div class="row">
												<div class="col-sm-6">
													<div class="thumb-wrapper border border-dark">
														<div class="img-box">
															<img src="images/delivery.jpg" class="img-fluid" alt="">
														</div>
														<div class="thumb-content">
															<h4>Nation Wide Delivery</h4>
															<p class="item-price"><b>Your go-to for beautiful handmade necklaces. Choose from a selection of high-quality, one-of-a-kind pieces, or create your own design for a truly unique accessory.</b></p>
														</div>						
													</div>
												</div>
												<div class="col-sm-6">
													<div class="thumb-wrapper border border-dark">
														<div class="img-box">
															<img src="images/cross.png" class="img-fluid" alt="">
														</div>
														<div class="thumb-content">
															<h4>Customization</h4>
															<p class="item-price"><b>Offering customers the opportunity to select the design and type of necklace they desire.</b></p>
														</div>						
													</div>
												</div>		
												<div class="col-sm-6 mt-4">
													<div class="thumb-wrapper border border-dark">
														<div class="img-box">
															<img src="images/clean.jpg" class="img-fluid" alt="">
														</div>
														<div class="thumb-content">
															<h4>Cleaning & Maintenance</h4>
															<p class="item-price"><b>Providing customers with a professional cleaning and maintenance service for their necklaces.</b></p>
														</div>						
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="container-xl my-width d-block d-md-none">
						<div class="row">
							<div class="col-md-12">
								<h2>Services</h2>
								<div id="myCarouService" class="carousel slide m-0 p-0" data-ride="carousel" data-interval="0"> 
									<!-- Wrapper for carousel items -->
									<div class="carousel-inner" style="width: 100%;">
										<div class="item carousel-item active">
											<div class="row">
												<div class="col-sm-7">
													<div class="thumb-wrapper border border-dark">
														<div class="img-box">
															<img src="images/delivery.jpg" class="img-fluid" alt="">
														</div>
														<div class="thumb-content">
															<h4>Nation Wide Delivery</h4>
															<p class="item-price"><b>Your go-to for beautiful handmade necklaces. Choose from a selection of high-quality, one-of-a-kind pieces, or create your own design for a truly unique accessory.</b></p>
														</div>						
													</div>
												</div>
												<div class="col-sm-7 mt-4">
													<div class="thumb-wrapper border border-dark">
														<div class="img-box">
															<img src="images/cross.png" class="img-fluid" alt="">
														</div>
														<div class="thumb-content">
															<h4>Customization</h4>
															<p class="item-price"><b>Offering customers the opportunity to select the design and type of necklace they desire.</b></p>
														</div>						
													</div>
												</div>		
												<div class="col-sm-7 mt-4">
													<div class="thumb-wrapper border border-dark">
														<div class="img-box">
															<img src="images/clean.jpg" class="img-fluid" alt="">
														</div>
														<div class="thumb-content">
															<h4>Cleaning & Maintenance</h4>
															<p class="item-price"><b>Providing customers with a professional cleaning and maintenance service for their necklaces.</b></p>
														</div>						
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid mt-5 mb-3 text-center my-width">
					<div class="row">
						<h2>Why Choose Us?</h2>
					</div><br><br>
					<div class="row mb-0 pb-0 d-flex justify-content-center" style="gap: 20px;">
						<div class="col-md-2">
							<i class="fas fa-shipping-fast fa-lg" style="font-size: 1.75rem"></i><br><br>
							<h5>Free Shipping</h5>
						</div>
						<div class="col-md-2">
							<i class="fas fa-handshake" style="font-size: 1.75rem"></i><br><br>
							<h5>Big Discounts</h5>
						</div>
						<div class="col-md-2">
							<i class="fas fa-check-circle" style="font-size: 1.75rem"></i>
							<i class="fas fa-award" style="font-size: 1.75rem"></i><br><br>
							<h5>Verified</h5>
						</div>
						<div class="col-md-2">
							<i class="fas fa-people-carry fa-lg" style="font-size: 1.75rem"></i><br><br>
							<h5>Cash on Delivery</h5>
						</div>
						<div class="col-md-2">
							<i class="fas fa-clipboard-check" style="font-size: 1.75rem"></i><br><br>
							<h5>Real-Time Updates</h5>
						</div>
					</div>
				</div>
				<div class="container-fluid text-center py-5 text-white" style="background-color: #1c2331;">
					<div class="row">
						<h4>About Us</h4>
					</div><br>
					<div class="row my-width mx-auto" style="text-align: justify;">
						<p>I'm the proud owner of Saint Benedict Medallion, a business in Trece Martires City that specializes in making and selling beautiful, unique necklaces. As a small business, I'm passionate about providing my customers with one-of-a-kind pieces that are as special and meaningful to them as they are to me. My necklaces are all handmade with care and attention to detail, using only the finest materials. I'm committed to create pieces that will last a lifetime, and I'm proud to say that the quality of my products speaks for itself. I'm always happy to work with my customers to create something special for them. I hope you'll come and visit my store soon - I'm sure you'll find something unique and beautiful that you'll love.</p>
					</div>
				</div>
				<div class="container-fluid mt-3">
					<div class="row">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123734.56420033834!2d120.78699919463828!3d14.27041091980823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd806bdc892737%3A0x760e08400b4e91d8!2sTrece%20Martires%2C%20Cavite!5e0!3m2!1sen!2sph!4v1685830770393!5m2!1sen!2sph" width="100%" height="450" style="" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</main>
		<?php include('footer.php') ?>
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
		<script>
			$(document).ready(function () {
			  showAllItems(); //Display all items with no filter applied
			  $(".wish-icon i").click(function(){
			  	$(this).toggleClass("fa-heart fa-heart-o");
			  });
			});
			function showAllItems() {
				//Default grid to show all items on page load in
				$("#one_sm_slideshow").empty();
				for (let i = 0; i < category_items.length; i++) {
				    let item_content =
				    '<div class="col-sm-6 p-0" data-available-sizes="' + 
				    category_items[i]["sizes"] + 
				    '"><div class="thumb-wrapper border border-dark" style="width: 200px;"><span class="wish-icon"><i class="fa fa-heart-o"></i></span><div class="img-box"><img src="' + 
				    category_items[i]["thumbnail"] +
				    '" class="img-fluid" alt="Missing Image"></div><div class="thumb-content"><h4>' +
				    category_items[i]["title"] +
				    '</h4><p class="item-price"><b>₱' +
				    category_items[i]["price"] +
				    '</b></p><a href="' +
				    category_items[i]["link"] +
				    '" class="btn btn-outline-success rounded-0 btn-sm">View</a></div></div></div>';
				    $("#one_sm_slideshow").append(item_content);
				}
				$("#one_md_slideshow").empty();
				for (let i = 0; i < category_items.length; i++) {
				    let item_content =
				    '<div class="container p-0 m-0" data-available-sizes="' + 
				    category_items[i]["sizes"] + 
				    '"><div class="thumb-wrapper border border-dark m-0" style="width: 200px;"><span class="wish-icon"><i class="fa fa-heart-o"></i></span><div class="img-box"><img src="' + 
				    category_items[i]["thumbnail"] +
				    '" class="img-fluid" alt="Missing Image"></div><div class="thumb-content"><h4>' +
				    category_items[i]["title"] +
				    '</h4><p class="item-price"><b>₱' +
				    category_items[i]["price"] +
				    '</b></p><a href="' +
				    category_items[i]["link"] +
				    '" class="btn btn-outline-success rounded-0 btn-sm">View</a></div></div></div>';
				    $("#one_md_slideshow").append(item_content);
				}
			}
		</script>
	</body>
</html>
