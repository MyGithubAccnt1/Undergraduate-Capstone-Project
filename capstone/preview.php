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
						<h1 class="text-center"><?php echo $_SESSION['title']; ?></h1>
						<hr>
						<h3><span>&#8369;</span> <?php echo $_SESSION['price']; ?></h3><br>
						<h5>DESCRIPTION</h5>
						<p><?php echo $_SESSION['description']; ?></p>
						<h5>CONTENTS</h5>
						<p>18' Golden Neck Chain</p>
						<p>1 SBM Necklace</p>
						<div class="product-buttons d-flex flex-direction-row justify-content-center gap-2 text-center">
							<a class="btn btn-success btn-md rounded-0" href="#offcanvasDark" data-bs-toggle="offcanvas">Add to Cart</a>
							<a class="btn btn-danger btn-md rounded-0" href="checkout.php">Proceed to Checkout</a>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid my-width m-0 p-0 mx-auto border border-dark">
				
				<div class="form-check form-switch d-flex flex-row justify-content-center mt-3">
					<h5 class="text-center">COMMENTS "ON"</h5>
				  	<input class="form-check-input" type="checkbox" data-toggle="collapse" href="#collapseExample">
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
		                                <div class="border card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px;" id="product_id-comment">
		                                    <div class="card p-3 mx-4">
		                                        <div class="d-flex justify-content-between align-items-center">
		                                            <div class="d-flex flex-row align-items-center">
		                                                <span><small class="font-weight-bold text-primary">james_olesenn</small> <small class="font-weight-bold">Thanks</small></span>
		                                            </div>
		                                            <small>2 days ago</small>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="stick-bot">
						    <div class="comment-area">
							<textarea class="form-control rounded-0" placeholder="Type your message here." rows="1" id="message"></textarea>
						    </div>
						    <div class="d-flex justify-content-center mt-3">
							<button type="buttont" class="btn btn-primary rounded-pill btn-md w-75" onclick="comment()">Send</button>
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
			let category_items = [
				{
					id: 1,
					user_id: <?php echo $_SESSION['id']; ?>,
					message: "HAHAHAHAHA",
					sizes: ["US-MEN-10"]
				}
			];
			$(document).ready(function () {
			  showAllItems(); //Display all items with no filter applied
			});
			function showAllItems() {
				//Default grid to show all items on page load in
				$("#product_id-comment").empty();
				for (let i = 0; i < category_items.length; i++) {
					let item_content =
						'<div class="card p-3 mx-4" data-available-sizes="' + 
						category_items[i]["sizes"] + 
						'"><div class="d-flex justify-content-between align-items-center"><div class="d-flex flex-row align-items-center"><span><small class="font-weight-bold text-primary">User: ' +
						category_items[i]["user_id"] +
						'</small> <small class="font-weight-bold">' +
						category_items[i]["message"] +
						'</small></span></div></div></div>';
					$("#product_id-comment").append(item_content);
				}
			}
			function comment() {
				var message = document.getElementById("message").value;
				let category_items = [
					{
						id: 1,
						user_id: <?php echo $_SESSION['id']; ?>,
						message: $message,
					    	sizes: ["US-MEN-10"]
					}
				];
				function showAllItems() {
					//Default grid to show all items on page load in
					$("#product_id-comment").empty();
					for (let i = 0; i < category_items.length; i++) {
						let item_content =
							'<div class="card p-3 mx-4" data-available-sizes="' + 
							category_items[i]["sizes"] + 
							'"><div class="d-flex justify-content-between align-items-center"><div class="d-flex flex-row align-items-center"><span><small class="font-weight-bold text-primary">User: ' +
							category_items[i]["user_id"] +
							'</small> <small class="font-weight-bold">' +
							category_items[i]["message"] +
							'</small></span></div></div></div>';
						$("#product_id-comment").append(item_content);
					}
				}
				showAllItems(); 
			}
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
