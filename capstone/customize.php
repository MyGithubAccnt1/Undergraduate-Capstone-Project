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
	  	<?php include('./include/style.php') ?>
		<style>
			.btn-customize {
			    background-color: #794B29;
			    color: white;
			}
			.my-button {
				border: 1px solid #000;
				cursor: pointer;
				background-color: #BB8A5B;
				color: #000;
				padding: 20px 40px;
			}
			.my-button:hover, .material-active{
				border: 1px solid #000;
				background-color: #794B29;
				color: #fff;
			}
			/**{
				outline: 2px solid limegreen;
			}*/
		</style>
	</head>
	<body class="font-monospace">
		<?php include('./include/header.php') ?>
		<main class="container-fluid m-0 p-0">
			<section>
				<div class="container-xl my-width d-block d-md-none">
					<div class="row">
						<div class="col-md-12">
							<div class="text-center text-danger mt-5">[Notice: A saved template can't be deleted if an order is made with it]</div>
							<h2>Saved Templates</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="one_sm_slideshow" style="height: auto;">
										<?php
										$email = $_SESSION['email'];
										include("./php/connect.php");
										$sql = "SELECT * FROM template WHERE email = '$email'";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="col-sm-6 p-0">
													<div class="thumb-wrapper rounded-0 text-dark border border-dark" style="width: 200px;">
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid border" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<form action="" class="template">
																<input type="hidden" name="email" value="<?php echo $row['email']?>">
																<input type="hidden" name="deyt" value="<?php echo $row['deyt']?>">
																<p class="item-price text-start">
																	<b>Created On: <br><br></b>
																	<b style="margin-left: 20px;"><?php echo $row['deyt']?></b>
																</p><br>
																<button type="submit" class="rounded-0 w-100 btn-main btn btn-md mb-2">Select</button>
															</form>
															<form  action="" class="share_template">
																<input type="hidden" name="email" value="<?php echo $row['email']?>">
																<input type="hidden" name="deyt" value="<?php echo $row['deyt']?>">
																<button type="submit" class="rounded-0 w-100 btn-main btn btn-md mb-2">Share</button>
															</form>
															<form  action="" class="delete_template">
																<input type="hidden" name="email" value="<?php echo $row['email']?>">
																<input type="hidden" name="deyt" value="<?php echo $row['deyt']?>">
																<button type="submit" class="rounded-0 w-100 btn-main btn btn-md">Delete</button>
															</form>
														</div>
													</div>
												</div>
										<?php
											}
										} else {
	                                    ?>
	                                    	<p class="w-100 text-center text-dark">[There is no saved template]</p>
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
				<div class="container-xl my-width d-none d-sm-block">
					<div class="row">
						<div class="col-md-12">
							<div class="text-center text-danger mt-5">[Notice: A saved template can't be deleted if an order is made with it]</div>
							<h2>Saved Templates</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="one_md_slideshow" style="height: auto;">
										<?php
										$email = $_SESSION['email'];
										include("./php/connect.php");
										$sql = "SELECT * FROM template WHERE email = '$email'";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="container p-0 m-0">
													<div class="thumb-wrapper rounded-0 text-dark m-0 border border-dark" style="width: 200px;">
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid border" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<form action="" class="template">
																<input type="hidden" name="email" value="<?php echo $row['email']?>">
																<input type="hidden" name="deyt" value="<?php echo $row['deyt']?>">
																<p class="item-price text-start">
																	<b>Created On: <br><br></b>
																	<b style="margin-left: 20px;"><?php echo $row['deyt']?></b>
																</p><br>
																<button type="submit" class="rounded-0 w-100 btn-main btn btn-md mb-2">Select</button>
															</form>
															<form  action="" class="share_template">
																<input type="hidden" name="email" value="<?php echo $row['email']?>">
																<input type="hidden" name="deyt" value="<?php echo $row['deyt']?>">
																<button type="submit" class="rounded-0 w-100 btn-main btn btn-md mb-2">Share</button>
															</form>
															<form  action="" class="delete_template">
																<input type="hidden" name="email" value="<?php echo $row['email']?>">
																<input type="hidden" name="deyt" value="<?php echo $row['deyt']?>">
																<button type="submit" class="rounded-0 w-100 btn-main btn btn-md">Delete</button>
															</form>
														</div>
													</div>
												</div>
										<?php
											}
										} else {
	                                    ?>
	                                    	<p class="w-100 text-center text-dark">[There is no saved template]</p>
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
			<section>
				<div class="container-xl my-width d-block d-md-none">
					<div class="row">
						<div class="col-md-12">
							<h2>Available Templates</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="one_sm_slideshow" style="height: auto;">
										<?php
										include("./php/connect.php");
										$sql = "SELECT * FROM template WHERE email = 'test@admin'";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="col-sm-6 p-0">
													<div class="thumb-wrapper rounded-0 text-dark border border-dark" style="width: 200px;">
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid border" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<form action="" class="template">
																<input type="hidden" name="email" value="<?php echo $row['email']?>">
																<input type="hidden" name="deyt" value="<?php echo $row['deyt']?>">
																<p class="item-price text-start">
																	<b>Created On: <br><br></b>
																	<b style="margin-left: 20px;"><?php echo $row['deyt']?></b>
																</p><br>
																<button type="submit" class="rounded-0 btn-main btn btn-md">Select</button>
															</form>
														</div>
													</div>
												</div>
										<?php
											}
										} else {
	                                    ?>
	                                    	<p class="w-100 text-center text-dark">[There is no saved template]</p>
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
				<div class="container-xl my-width d-none d-sm-block">
					<div class="row">
						<div class="col-md-12">
							<h2>Available Templates</h2>
							<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner" style="width: 100%">
									<div class="item carousel-item active" style="overflow-x: auto;">
										<div class="d-flex flex-direction-row gap-4" id="one_md_slideshow" style="height: auto;">
										<?php
										include("./php/connect.php");
										$sql = "SELECT * FROM template WHERE email = 'test@admin'";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
										?>
												<div class="container p-0 m-0">
													<div class="thumb-wrapper rounded-0 text-dark m-0 border border-dark" style="width: 200px;">
														<div class="img-box">
															<img src="<?php echo $row['thumbnail']?>" class="img-fluid border" alt="Missing Image">
														</div>
														<div class="thumb-content">
															<form action="" class="template">
																<input type="hidden" name="email" value="<?php echo $row['email']?>">
																<input type="hidden" name="deyt" value="<?php echo $row['deyt']?>">
																<p class="item-price text-start">
																	<b>Created On: <br><br></b>
																	<b style="margin-left: 20px;"><?php echo $row['deyt']?></b>
																</p><br>
																<button type="submit" class="rounded-0 btn-main btn btn-md">Select</button>
															</form>
														</div>
													</div>
												</div>
										<?php
											}
										} else {
	                                    ?>
	                                    	<p class="w-100 text-center text-dark">[There is no saved template]</p>
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
		<script type="text/javascript">
			$(document).on("submit", ".template", function (event) {
	            event.preventDefault();
	            var email = $(this).find("input[name='email']").val();
	            var deyt = $(this).find("input[name='deyt']").val();
	            window.localStorage.setItem('email', email);
	            window.localStorage.setItem('deyt', deyt);
	            window.location.href = "make_customize.php";
	        });
		</script>
		<script type="text/javascript">
			$(document).on("submit", ".share_template", function (event) {
	            event.preventDefault();
	            var email = $(this).find("input[name='email']").val();
	            var deyt = $(this).find("input[name='deyt']").val();
	            var link = "http://20.205.112.210/make_customize.php?&email=" + email + "&deyt=" + deyt;
	            // var link = "http://localhost/capstone/make_customize.php?&email=" + email + "&deyt=" + deyt;
	            if (navigator.clipboard) {
	                // Use Clipboard API
	                navigator.clipboard.writeText(link)
	                    .then(function () {
	                        alert('Notice: A shareable link has been copied to the clipboard.');
	                    })
	                    .catch(function () {
	                        alert('Notice: An unexpected error occurred during copying of shareable link to your clipboard, please do it manually: ' + link);
	                    });
	            } else {
	                var tempTextArea = document.createElement("textarea");
	                tempTextArea.value = link;
	                document.body.appendChild(tempTextArea);
	                tempTextArea.select();
	                document.execCommand('copy');
	                document.body.removeChild(tempTextArea);
	                alert('Notice: A shareable link has been copied to the clipboard.');
	            }
	        });
		</script>
		<script type="text/javascript">
			$(document).on("submit", ".delete_template", function (event) {
	            event.preventDefault();
	            var email = $(this).find("input[name='email']").val();
	            var deyt = $(this).find("input[name='deyt']").val();
                $.ajax({
                    url: "./php/delete_template.php",
                    method: "POST",
                    data: {
                    	email: email,
                    	deyt: deyt
                    },
                    success: function (data) {
                    	if (data === "1") {
                    		alert('Notice: The selected template can not be deleted because it is submitted as an order.');
                    	} else {
                    		window.location.href = "customize.php";
                    	}
                    },
        	        error: function (xhr, status, error) {
        	            console.error("AJAX Request Error:", status, error);
        	        }
                });
	        });
		</script>
	</body>
</html>
<?php 
}else{
	echo"<script>var xlink = window.location.href;</script>";
	echo"<script>window.localStorage.setItem('xlink', xlink);</script>";
    echo"<script>alert('Notice: Please login to proceed.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>