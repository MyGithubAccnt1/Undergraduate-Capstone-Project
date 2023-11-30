<?php
session_start();
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
		  		height: calc(100vh - 50px);
		  		width: 100%;
		  		background-image: url('images/bg.gif');
		  		background-size: cover;
		  		background-repeat: no-repeat;
		  		filter: brightness(30%);
		  	}
		  	.whole {
				height: -webkit-calc(100vh - 50px);
				height: -moz-calc(100vh - 50px);
				height: calc(100vh - 50px);
				width: 100%;
			}
			.btn-home {
			    background-color: #794B29;
			    color: white;
			}
		</style>
	</head>
	<body class="font-monospace">
		<?php include('./include/header.php') ?>
		<main class="container-fluid p-0 m-0">
			<section class="bg"></section>
			<section class="row d-flex justify-content-center align-items-center text-left text-white whole">
				<div class="my-width p-3">
					<h1 style="font-size: 3rem;">SAINT BENEDICT MEDALLION</h1><br><br><br>
					<p class="d-none d-md-block">A place for people who loves religious jewelry and fashion items.<br>Saint Benedict Medallion is specialized in handcrafted necklaces.<br>Our timeless designs are inspired by faith and nature, crafted with quality materials and love.</p><hr>
					<a href="signin.php">
						<button class="btn-main py-1 rounded-0">REGISTER NOW FOR FREE</button>
					</a><br><br>
					<p>Join the <?php include ('./php/get_total_rows.php') ?> others who already joined.</p>
				</div>
			</section>
			<section>
				<div class="container-xl my-width d-block d-md-none" style="border: 1px solid #000; border-style: none solid none solid;">
					<div class="row">
						<div class="col-md-12">
							<h2>Popular Products</h2>
							<p class="d-none d-md-block text-center">Here are some of our very first creations. What are you waiting for? Try to get yours now...</p>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="one_sm_slideshow" style="height: auto;">
										<?php
										include("./php/connect.php");
										$sql = "SELECT price, title, thumbnail FROM product ORDER BY `popularity` DESC";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="col-sm-6 p-0">
													<div class="thumb-wrapper rounded-0 text-dark border border-dark" style="width: 200px; background-color: #D0B89F;">
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<form action="./php/get_product.php" method="POST">
																<input type="hidden" name="title" value="<?php echo $row['title']?>">
																<h4><?php echo $row['title']?></h4>
																<p class="item-price"><b>PHP <?php echo $row['price']?></b></p>
																<button type="submit" class="rounded-0 btn-main btn btn-md">View</button>
															</form>
														</div>
													</div>
												</div>
										<?php
											}
										} else {
	                                    ?>
	                                    	<p class="w-100 text-center text-dark">[There is no available product at the moment]</p>
	                                    <?php
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
				<div class="container-xl my-width d-none d-sm-block" style="border: 1px solid #000; border-style: none solid none solid;">
					<div class="row">
						<div class="col-md-12">
							<h2>Popular Products</h2>
							<p class="d-none d-md-block text-center">Here are some of our very first creations. What are you waiting for? Try to get yours now...</p>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="one_md_slideshow" style="height: auto;">
										<?php
										include("./php/connect.php");
										$sql = "SELECT price, title, thumbnail FROM product ORDER BY `popularity` DESC";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="container p-0 m-0">
													<div class="thumb-wrapper rounded-0 text-dark m-0 border border-dark" style="width: 200px; background-color: #D0B89F;">
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<form action="./php/get_product.php" method="POST">
																<input type="hidden" name="title" value="<?php echo $row['title']?>">
																<h4><?php echo $row['title']?></h4>
																<p class="item-price"><b>PHP <?php echo $row['price']?></b></p>
																<button type="submit" class="rounded-0 btn-main btn btn-md">View</button>
															</form>
														</div>
													</div>
												</div>
										<?php
											}
										} else {
	                                    ?>
	                                    	<p class="w-100 text-center text-dark">[There is no available product at the moment]</p>
	                                    <?php
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
			</section>
			<section class="my-width mx-auto py-4" style="border: 1px solid #000; border-style: none solid none solid;">
				<hr>
			</section>
			<section>
				<div class="container-fluid m-0 p-0 slide-edit mx-auto">
					<div class="m-0 pt-0 pb-5 mx-auto my-width slide-edit" style="overflow: hidden; border: 1px solid #000; border-style: none solid none solid;">
						<h2 class = "text-center">New Arrivals</h2>
						<div class="container-fluid m-0 p-0">
							<div class="slider">
							    <div class="rotator">
							    	<?php
							    	include("./php/connect.php");
							    	$counter = 0;
							    	$sql = "SELECT thumbnail FROM product ORDER BY `id` DESC";
							    	$result = $conn->query($sql);
							    	if ($result->num_rows > 0) {
							    		// output data of each row
							    		while($row = $result->fetch_assoc()) {
							    			$counter = $counter + 1;
							    			if ($counter > 9) {

							    			} else {
							    	?>
							    	<div class="items">
										<a href="#!">
											<img src="<?php echo $row['thumbnail']?>" alt="Missing Image" style="background-color: #D0B89F;"/>
										</a>
									</div>
									<?php
											}
										}
									} else {
                                    ?>
                                    	<p class="w-100 text-center text-dark">[There is no available product at the moment]</p>
                                    <?php
                                    }
                                    $conn->close();
                                    ?>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="container-fluid m-0 p-0 text-center" style="background-color: #D0B89F;">
					<div class="container-xl my-width d-none d-lg-block" style="border: 1px solid #000; border-style: none solid none solid;">
						<div class="row">
							<div class="col-md-12">
								<h2>Services</h2>
								<div id="myCarouService" class="carousel slide" data-ride="carousel" data-interval="0"> 
									<!-- Wrapper for carousel items -->
									<div class="carousel-inner">
										<div class="item carousel-item active">
											<div class="row text-dark">
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
															<p class="item-price"><b>Providing customers with a professional cleaning and maintenance service for their necklaces. Exclusive only to customers with delivered order history.</b></p>
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
					<div class="container-xl my-width d-none d-md-block d-lg-none" style="border: 1px solid #000; border-style: none solid none solid;">
						<div class="row">
							<div class="col-md-12">
								<h2>Services</h2>
								<div id="myCarouService" class="carousel slide" data-ride="carousel" data-interval="0"> 
									<!-- Wrapper for carousel items -->
									<div class="carousel-inner">
										<div class="item carousel-item active">
											<div class="row text-dark">
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
															<p class="item-price"><b>Providing customers with a professional cleaning and maintenance service for their necklaces. Exclusive only to customers with delivered order history.</b></p>
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
					<div class="container-xl my-width d-block d-md-none" style="border: 1px solid #000; border-style: none solid none solid;">
						<div class="row">
							<div class="col-md-12">
								<h2>Services</h2>
								<div id="myCarouService" class="carousel slide m-0 p-0" data-ride="carousel" data-interval="0"> 
									<!-- Wrapper for carousel items -->
									<div class="carousel-inner" style="width: 100%;">
										<div class="item carousel-item active">
											<div class="row text-dark">
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
															<p class="item-price"><b>Providing customers with a professional cleaning and maintenance service for their necklaces. Exclusive only to customers with delivered order history.</b></p>
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
			</section>
			<section>
				<div class="container-fluid pt-5 pb-3 text-center my-width" style="border: 1px solid #000; border-style: none solid none solid;">
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
			</section>
			<section class="my-width mx-auto py-5" style="border: 1px solid #000; border-style: none solid none solid;">
				<hr>
			</section>
			<section>
				<div class="container-fluid text-center my-width py-4" style="border: 1px solid #000; border-style: none solid none solid;">
					<div class="row">
						<h2>About Us</h2>
					</div><br>
					<div class="row mx-auto" style="text-align: justify;">
						<p>I'm the proud owner of Saint Benedict Medallion, a business in Trece Martires City that specializes in making and selling beautiful, unique necklaces. As a small business, I'm passionate about providing my customers with one-of-a-kind pieces that are as special and meaningful to them as they are to me. My necklaces are all handmade with care and attention to detail, using only the finest materials. I'm committed to create pieces that will last a lifetime, and I'm proud to say that the quality of my products speaks for itself. I'm always happy to work with my customers to create something special for them. I hope you'll come and visit my store soon - I'm sure you'll find something unique and beautiful that you'll love.</p>
					</div>
				</div>
			</section>
			<section>
				<div class="container-fluid mt-3">
					<div class="row">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123734.56420033834!2d120.78699919463828!3d14.27041091980823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd806bdc892737%3A0x760e08400b4e91d8!2sTrece%20Martires%2C%20Cavite!5e0!3m2!1sen!2sph!4v1685830770393!5m2!1sen!2sph" width="100%" height="450" style="" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
	</body>
</html>
