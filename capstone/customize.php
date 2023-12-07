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
			/**{
				outline: 1px solid limegreen;
			}*/
			.customize-active{
				background-color: #794B29;
				color: #fff;
			}
			.template-img {
				cursor: zoom-in;
			}
			.template-img:hover {
				background-color: rgba(0, 0, 0, 0.1);
			}
		</style>
	</head>
	<body class="font-monospace">
		<?php include('./include/header.php') ?>
		<main class="container-fluid m-0 py-5">
			<section class="my-width mx-auto text-center rounded-pill border border-dark">
				<div class="m-0 p-0">
					<h4>CUSTOMIZATION STYLE</h4>
					<div style="display: flex; align-items: center; justify-content:space-evenly;">
						<button class="btn-main py-1 my-3 rounded-pill" style="width: 35%;" id="style_one">Basic</button>
						<button class="btn-main py-1 my-3 rounded-pill" style="width: 35%;" id="style_two">Advance</button>
					</div>
				</div>
			</section>
			<br>
			<section class="my-width mx-auto text-center rounded-pill border border-dark" style="opacity: 0; visibility: hidden; transition: opacity 0.5s ease-in-out;" id="product">
				<div class="m-0 p-0">
					<h4>PRODUCT LIST</h4>
					<div style="display: flex; align-items: center; justify-content:space-evenly; flex-direction: row;">
						<button class="btn-main py-1 my-3 rounded-pill" style="width: 35%;" id="product_one">Necklace</button>
						<button class="btn-main py-1 my-3 rounded-pill" style="width: 35%;" id="product_two">Pin</button>
					</div>
					<div style="display: flex; align-items: center; justify-content:space-evenly; flex-direction: row;">
						<button class="btn-main py-1 my-3 rounded-pill" style="width: 35%;" id="product_three">Nameplate</button>
						<button class="btn-main py-1 my-3 rounded-pill" style="width: 35%;" id="product_four">Logo</button>
					</div>
				</div>
			</section>
			<br>
			<section class="my-width mx-auto text-center rounded-pill border border-dark" style="opacity: 0; visibility: hidden; transition: opacity 0.5s ease-in-out;" id="proceed">
				<form action="" class="customize_style">
					<button type="submit" class="btn-main py-1 my-3 w-75 rounded-pill">Proceed</button>
				</form>
			</section>
			<section>
				<div class="container-xl my-width d-block d-md-none">
					<div class="row">
						<div class="col-md-12">
							<div class="text-center text-danger mt-5">
								[Notice: A saved template can't be deleted if an order is made with it]
							</div>
							<h2 class="text-start mb-0 p-0 mt-5">Saved Templates</h2>
							<hr class="mt-2">
							<div class="carousel slide m-0 p-1" data-ride="carousel" data-interval="0">
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
														<div class="img-box template-img" id="image">
															<input type="hidden" name="image" value="<?php echo $row['thumbnail']?>">
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
							<div class="text-center text-danger mt-5">
								[Notice: A saved template can't be deleted if an order is made with it]
							</div>
							<h2 class="text-start mb-0 p-0 mt-5">Saved Templates</h2>
							<hr class="mt-2">
							<div class="carousel slide m-0 p-1" data-ride="carousel" data-interval="0">
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
														<div class="img-box template-img" id="image">
															<input type="hidden" name="image" value="<?php echo $row['thumbnail']?>">
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
			<div style="text-align: center;">
			    <section id="imageToggle" style="position: absolute; margin-top: 50px; height: calc(100vh - 50px); width: 100%; z-index: 2; display: none; cursor: zoom-out;">
			        <img src="" style="height: 100%; width: auto; background-color: #fff; text-align: center; margin: 0 auto; border: 1px solid #000;" id="file" alt="Missing_Image">
			    </section>
			</div>
		</main>
		<?php include('./include/footer.php') ?>
	</body>
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
	   	const style_one = document.getElementById('style_one');
	   	const style_two = document.getElementById('style_two');

	   	function RemoveStyle() {
	   		style_one.classList.remove('customize-active');
	      	style_two.classList.remove('customize-active');
		}

		style_one.addEventListener('click', () => {
	   	    RemoveStyle();
	   	    style_one.classList.add('customize-active');
	   	    var product = $("#product");
    	    if (product.css("opacity") === "0") {
    	    	product.css("opacity", "1");
    	    	product.css("visibility", "visible");
    	    }
	   	});

	   	style_two.addEventListener('click', () => {
	   	    RemoveStyle();
	   	    style_two.classList.add('customize-active');
	   	    var product = $("#product");
    	    if (product.css("opacity") === "0") {
    	    	product.css("opacity", "1");
    	    	product.css("visibility", "visible");
    	    }
	   	});

	   	const product_one = document.getElementById('product_one');
	   	const product_two = document.getElementById('product_two');
	   	const product_three = document.getElementById('product_three');
	   	const product_four = document.getElementById('product_four');

	   	function RemoveProduct() {
	   		product_one.classList.remove('customize-active');
	      	product_two.classList.remove('customize-active');
	      	product_three.classList.remove('customize-active');
	      	product_four.classList.remove('customize-active');
		}

		product_one.addEventListener('click', () => {
	   	    RemoveProduct();
	   	    product_one.classList.add('customize-active');
	   	    var proceed = $("#proceed");
    	    if (proceed.css("opacity") === "0") {
    	    	proceed.css("opacity", "1");
    	    	proceed.css("visibility", "visible");
    	    }
	   	});

	   	product_two.addEventListener('click', () => {
	   	    RemoveProduct();
	   	    product_two.classList.add('customize-active');
	   	    var proceed = $("#proceed");
    	    if (proceed.css("opacity") === "0") {
    	    	proceed.css("opacity", "1");
    	    	proceed.css("visibility", "visible");
    	    }
	   	});

	   	product_three.addEventListener('click', () => {
	   	    RemoveProduct();
	   	    product_three.classList.add('customize-active');
	   	    var proceed = $("#proceed");
    	    if (proceed.css("opacity") === "0") {
    	    	proceed.css("opacity", "1");
    	    	proceed.css("visibility", "visible");
    	    }
	   	});

	   	product_four.addEventListener('click', () => {
	   	    RemoveProduct();
	   	    product_four.classList.add('customize-active');
	   	    var proceed = $("#proceed");
    	    if (proceed.css("opacity") === "0") {
    	    	proceed.css("opacity", "1");
    	    	proceed.css("visibility", "visible");
    	    }
	   	});
	</script>
	<script type="text/javascript">
		$(document).on("submit", ".customize_style", function (event) {
            event.preventDefault();
            const product_one = document.getElementById('product_one');
            const product_two = document.getElementById('product_two');
            const product_three = document.getElementById('product_three');
            const product_four = document.getElementById('product_four');
            if (product_one.classList.contains('customize-active')) {
              	window.localStorage.setItem('product', 'necklace');
            } else if (product_two.classList.contains('customize-active')) {
              	window.localStorage.setItem('product', 'pin');
            } else if (product_three.classList.contains('customize-active')) {
              	window.localStorage.setItem('product', 'nameplate');
            } else if (product_four.classList.contains('customize-active')) {
              	window.localStorage.setItem('product', 'logo');
            } else {
            	window.localStorage.setItem('product', 'necklace');
            }
            const style_one = document.getElementById('style_one');
            const style_two = document.getElementById('style_two');
            if (style_one.classList.contains('customize-active')) {
              	
            } else {
              	window.location.href = "make_customize_v2.php";
            }
        });
	</script>
	<script type="text/javascript">
		$(document).on("submit", ".template", function (event) {
            event.preventDefault();
            var email = $(this).find("input[name='email']").val();
            var deyt = $(this).find("input[name='deyt']").val();
            window.localStorage.setItem('email', email);
            window.localStorage.setItem('deyt', deyt);
            window.location.href = "make_customize_v2.php";
        });
	</script>
	<script type="text/javascript">
		$(document).on("submit", ".share_template", function (event) {
            event.preventDefault();
            var email = $(this).find("input[name='email']").val();
            var deyt = $(this).find("input[name='deyt']").val();
            var link = '';
            var currentURL = window.location.href;
            if (currentURL.indexOf('http://20.205.112.210/customize.php') !== -1) {
                // If the substring is found in currentURL
                link = "http://20.205.112.210/make_customize_v2.php?&email=" + email + "&deyt=" + deyt;
            } else {
                // If the substring is not found in currentURL
                link = "http://localhost/capstone/make_customize_v2.php?&email=" + email + "&deyt=" + deyt;
            }
            if (navigator.clipboard) {
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
	<script>
	    $(document).on("click", "#image", function () {
	    	var top = window.pageYOffset || document.documentElement.scrollTop;
	        var image = $(this).find("input[name='image']").val();
	        var imageToggle = $("#imageToggle");

	        if (imageToggle.css("display") === "none") {
        	    imageToggle.css("display", "block");
        	    imageToggle.css('top', top);
        	    document.body.style.overflow = "hidden";
        	    $('#file').attr("src", image);
        	} else {
        		imageToggle.css("display", "none");
        		document.body.style.overflow = "";
        	}
	    });
	    $(document).on("click", "#imageToggle", function () {
	    	
	        var imageToggle = $("#imageToggle");

	        if (imageToggle.css("display") === "none") {
        	    
        	} else {
        		imageToggle.css("display", "none");
        		document.body.style.overflow = "";
        	}
	    });
	</script>
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