<?php 
error_reporting(0);
ini_set('display_errors', 0);
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
			.cart-item {
	  		    width: 33.33%;
	  		}
		</style>
	</head>
	<body class="font-monospace">
		<?php include('./include/header.php') ?>
		<main class="container-fluid m-0 p-0">
			<section>
				<div class="container-fluid my-width m-0 p-0 mx-auto my-4">
					<div id="content-wrapper" class="m-0 p-0">
						<div class="m-o p-o">
							<div class="d-flex justify-content-center m-0 p-0">
								<img id=featured src="images/set1.png">
							</div>
							<div class="d-flex justify-content-center m-0 p-0">
								<div id="slide-wrapper" class="m-0 p-0">
									<img id="slideLeft" class="arrow" src="icons/arrow-left.png">
									<div id="slider">
										<img class="thumbnail active-img" src="images/set2.png">
										<img class="thumbnail" src="images/set3.png">
										<img class="thumbnail" src="images/set4.png">
										<img class="thumbnail" src="images/set5.png">
										<img class="thumbnail" src="images/set6.png">
										<img class="thumbnail" src="images/set7.png">
										<img class="thumbnail" src="images/set8.png">
									</div>
									<img id="slideRight" class="arrow" src="icons/arrow-right.png">
								</div>
							</div>
						</div>
						<div class="product-details">
							<form action="./php/add_cart.php" method="POST">
								<input type="hidden" name="title" value="<?php echo $_SESSION['title'];?>">
								<input type="hidden" name="price" value="<?php echo $_SESSION['price'];?>">
								<input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>">
								<input type="hidden" name="qty" value="<?php echo $_SESSION['qty'];?>">
							    <h1 class="text-center"><?php echo $_SESSION['title'];?></h1>
							    <hr>
							    <div>
							        <h3 class="shop-item-price"><span>&#8369;</span> <?php echo $_SESSION['price']; ?></h3><br>
							        <h5>DESCRIPTION</h5>
							        <p><?php echo $_SESSION['description']; ?></p>
							        <h5>CONTENTS</h5>
							        <p>18' Golden Neck Chain</p>
							        <p>1 SBM Necklace</p>
							        <div class="d-flex justify-content-center">
							        	<button class="btn-main btn btn-md rounded-0 py-1" type="submit">Add to Cart</button>
							        </div>
							    </div>
							</form>
						</div>
					</div>
				</div>
				<div class="container-fluid my-width m-0 p-0 mx-auto border border-dark">
					<div class="form-switch p-0 d-flex justify-content-center">
						<h5 class="my-auto">COMMENT</h5>
					  	<input class="form-check-input my-auto" type="checkbox" data-toggle="collapse" href="#collapseExample" onclick="submitcomment();">
					</div>
					<div class="row mt-2">
						<div class="rating"> 
		                  	<input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
		                  	<input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
		                  	<input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
		                  	<input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
		                  	<input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
		                  	<h5 style="margin-left: 30px; margin-top: 5px;">Rate: </h5>
	              		</div>
	                    <div class="collapse" id="collapseExample">
	                        <div class="stick-top bg-dark text-center text-white py-2">Comment Section</div>
	                        <div class="border card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px;" id="comments-container">
					
	                        </div>
	                        <div class="stick-bot">
								<form id="comment-form">
									<div class="comment-area">
										<input type="hidden" name="name" value="<?php echo $_SESSION['id'];?>"/>
										<input type="hidden" name="title" value="<?php echo $_SESSION['title'];?>"/>
										<textarea class="form-control rounded-0" placeholder="Type your message here." rows="1" name="comment" id="comment"></textarea>
									</div>
									<div class="d-flex justify-content-center">
										<button type="submit" class="btn-main rounded-pill py-1 my-1 btn btn-md w-75">Send</button>
									</div>
								</form>
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
		<script>
			let thumbnails = document.getElementsByClassName('thumbnail')
			let activeImages = document.getElementsByClassName('active-img')
			for (var i=0; i < thumbnails.length; i++){
				thumbnails[i].addEventListener('mouseover', function(){
					console.log(activeImages)
					if (activeImages.length > 0){
						activeImages[0].classList.remove('active-img')
					}
					this.classList.add('active-img')
					document.getElementById('featured').src = this.src
				})
			}
			let buttonRight = document.getElementById('slideRight');
			let buttonLeft = document.getElementById('slideLeft');
			buttonLeft.addEventListener('click', function(){
				document.getElementById('slider').scrollLeft -= 180
			})
			buttonRight.addEventListener('click', function(){
				document.getElementById('slider').scrollLeft += 180
			})
		</script>
		<script>
			function showComments() {
	            $.ajax({
	                url: "./php/get_comments.php", // PHP script to fetch comments from the database
	                method: "GET",
	                success: function (data) {
	                    $("#comments-container").html(data); // Display the comments in the container
	                }
	            });
	        }
			// Function to handle form submission and add a new comment
	        $("#comment-form").submit(function (e) {
	            e.preventDefault(); // Prevent the form from submitting traditionally
	
	            // Serialize the form data
	            var formData = $(this).serialize();
	
	            // Send the data to the PHP script to handle comment insertion
	            $.ajax({
	                url: "./php/add_comments.php", // PHP script to insert comments into the database
	                method: "POST",
	                data: formData,
	                success: function (data) {
	                    // If successful, show the updated comments
	                    showComments();
	                }
	            });

	            $('#comment').val('');

	        });
	
	        // Show comments on page load
	        showComments();
	        setInterval(showComments, 1000);
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