<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ICO">
	  	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/capstone/"; include($IPATH."include.html"); ?>
	</head>
	<body class="font-monospace">
		<?php include($IPATH."header.html"); ?>
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
						<h1 class="text-center">Product Name</h1>
						<hr>
						<h3><span>&#8369;</span> 00.00</h3><br>
						<h5>DESCRIPTION</h5>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
						<h5>CONTENTS</h5>
						<p>18' Golden Neck Chain</p>
						<p>1 SBM Necklace</p>
						<div class="product-buttons d-flex flex-direction-row justify-content-center gap-2 text-center">
							<a class="btn btn-success btn-md rounded-0" href="#offcanvasDark" data-bs-toggle="offcanvas">Add to Cart</a>
							<a class="btn btn-danger btn-md rounded-0" href="#">Proceed to Checkout</a>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid my-width m-0 p-0 mx-auto border border-dark">
				
				<div class="form-check form-switch d-flex flex-row justify-content-center mt-3">
					<h5 class="text-center">COMMENTS "ON"</h5>
				  	<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
				</div>
				<hr class="w-75 mx-auto">
				<div class="card p-3 mx-4 my-3">
                    <div class="d-flex justify-content-between align-items-center">
                      	<div class="d-flex flex-row align-items-center">
                        	<span><small class="font-weight-bold text-primary">james_olesenn</small> <small class="font-weight-bold">Thanks</small></span>
                      	</div>
                      	<small>2 days ago</small>
                    </div>
                </div>
                <div class="card p-3 mx-4 my-3">
                    <div class="d-flex justify-content-between align-items-center">
                      	<div class="d-flex flex-row align-items-center">
                        	<span><small class="font-weight-bold text-primary">olan_sams</small> <small class="font-weight-bold">Loving your work and profile!</small></span>
                      	</div>
                      	<small>3 days ago</small>
                    </div>
                </div>
                <div class="card p-3 mx-4 my-3">
                    <div class="d-flex justify-content-between align-items-center">
                      	<div class="d-flex flex-row align-items-center">
                        	<span><small class="font-weight-bold text-primary">rashida_jones</small> <small class="font-weight-bold">Really cool Which filter are you using?</small></span>
                      	</div>
                      	<small>3 days ago</small>
                    </div>
                </div>
                <div class="card p-3 mx-4 my-3">
                    <div class="d-flex justify-content-between align-items-center">
                      	<div class="d-flex flex-row align-items-center">
                        	<span><small class="font-weight-bold text-primary">simona_rnasi</small> <small class="font-weight-bold">Hmm, This poster looks cool</small></span>
                      	</div>
                      	<small>3 days ago</small>
                    </div>
                </div>
				<div class="rating"> 
                  	<input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                  	<input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                  	<input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                  	<input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                  	<input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                  	<h5 style="margin-left: 30px; margin-top: 5px;">Rate: </h5>
              	</div>
              	<h5 style="margin-left: 30px; margin-top: 5px;">Add Comment </h5>
				<div class="comment-area mx-4 my-3">
                  	<textarea class="form-control" placeholder="What's on your mind?" rows="4"></textarea>
              	</div>
				<div class="d-flex justify-content-center mb-3 ">
					<button class="btn btn-success rounded-pill btn-md">Send ></button>
				</div>
			</div>
		</main>
		<?php include($IPATH."footer.html"); ?>
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
	</body>
</html>