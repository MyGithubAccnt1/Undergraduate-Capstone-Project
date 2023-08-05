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
		<style>
      
		</style>
	</head>
	<body class="font-monospace bg-light">
		<?php include('header.php') ?>
		<main class="container-fluid my-4 my-width">
			<div class="row">
				<div class="col-md-12 d-block d-md-none">
					<h2>Templates</h2>
					<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
						<!-- Wrapper for carousel items -->
						<div class="carousel-inner" style="width: 100%">
							<div class="item carousel-item active" style="overflow-x: auto;">
								<div class="d-flex flex-direction-row gap-4" id="customize-sm" style="height: auto;">
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 d-none d-sm-block">
					<h2>Templates</h2>
					<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
						<!-- Wrapper for carousel items -->
						<div class="carousel-inner" style="width: 100%">
							<div class="item carousel-item active" style="overflow-x: auto;">
								<div class="d-flex flex-direction-row gap-4" id="customize-md" style="height: auto;">
									
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
		<script>
			$(document).ready(function () {
			  showAllItems(); //Display all items with no filter applied
			  $(".wish-icon i").click(function(){
			  	$(this).toggleClass("fa-heart fa-heart-o");
			  });
			});
			let category_items = [
			  {
			    id: 1,
			    category_id: 8,
			    price: 39.42,
			    title: "CROSS",
			    make: "cross",
			    thumbnail:
			      "images/cross.png",
			    sizes: ["US-MEN-10", "US-MEN-11"]
			  },
			  {
			    id: 2,
			    category_id: 8,
			    price: 31.93,
			    title: "HEART",
			    make: "heart",
			    thumbnail:
			      "images/heart.png",
			    sizes: ["US-MEN-13"]
			  },
			  {
			    id: 3,
			    category_id: 8,
			    price: 49.44,
			    title: "CIRCLE",
			    make: "circle",
			    thumbnail:
			      "images/circle.png",
			    sizes: ["US-MEN-14"]
			  },
			  {
			    id: 4,
			    category_id: 58,
			    price: 65.38,
			    title: "UNIQUE",
			    make: "unique",
			    thumbnail:
			      "images/unique.png",
			    sizes: ["US-MEN-13"]
			  }
			];
			function showAllItems() {
				//Default grid to show all items on page load in
				$("#customize-sm").empty();
				for (let i = 0; i < category_items.length; i++) {
				    let item_content =

				    '<form action="get_customize.php" method="POST"><div class="col-sm-6 p-0" data-available-sizes="' + 
				    category_items[i]["sizes"] + 
				    '"><input type="hidden" name="customize" value="' + 
				    category_items[i]["title"] + 
				    '"><div class="thumb-wrapper border border-dark" style="width: 200px;"><span class="wish-icon"><i class="fa fa-heart-o"></i></span><div class="img-box"><img src="' + 
				    category_items[i]["thumbnail"] +
				    '" class="img-fluid" alt="Missing Image"></div><div class="thumb-content"><h4>' +
				    category_items[i]["title"] +
				    '</h4><p class="item-price"><b>₱' +
				    category_items[i]["price"] +
				    '</b></p><button type="submit" class="btn btn-outline-success rounded-0 btn-sm">Create</button></div></div></div></form>';
				    $("#customize-sm").append(item_content);
				}
				$("#customize-md").empty();
				for (let i = 0; i < category_items.length; i++) {
				    let item_content =
				    '<form action="get_customize.php" method="POST"><div class="col-sm-6 p-0" data-available-sizes="' + 
				    category_items[i]["sizes"] + 
				    '"><input type="hidden" name="customize" value="' + 
				    category_items[i]["title"] + 
				    '"><div class="thumb-wrapper border border-dark" style="width: 200px;"><span class="wish-icon"><i class="fa fa-heart-o"></i></span><div class="img-box"><img src="' + 
				    category_items[i]["thumbnail"] +
				    '" class="img-fluid" alt="Missing Image"></div><div class="thumb-content"><h4>' +
				    category_items[i]["title"] +
				    '</h4><p class="item-price"><b>₱' +
				    category_items[i]["price"] +
				    '</b></p><button type="submit" class="btn btn-outline-success rounded-0 btn-sm">Create</button></div></div></div></form>';
				    $("#customize-md").append(item_content);
				}
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
