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
			    thumbnail:
			      "images/cross.png",
			    link: "customize-cross.php",
			    sizes: ["US-MEN-10", "US-MEN-11"]
			  },
			  {
			    id: 2,
			    category_id: 8,
			    price: 31.93,
			    title: "HEART",
			    thumbnail:
			      "images/heart.png",
			    link: "customize-heart.php",
			    sizes: ["US-MEN-13"]
			  },
			  {
			    id: 3,
			    category_id: 8,
			    price: 49.44,
			    title: "CIRCLE",
			    thumbnail:
			      "images/circle.png",
			    link: "customize-circle.php",
			    sizes: ["US-MEN-14"]
			  },
			  {
			    id: 4,
			    category_id: 58,
			    price: 65.38,
			    title: "UNIQUE",
			    thumbnail:
			      "images/unique.png",
			    link: "customize-unique.php",
			    sizes: ["US-MEN-13"]
			  }
			];
			function showAllItems() {
				//Default grid to show all items on page load in
				$("#customize-sm").empty();
				for (let i = 0; i < category_items.length; i++) {
				    let item_content =
				    '<div class="col-sm-6 p-0" data-available-sizes="' + 
				    category_items[i]["sizes"] + 
				    '"><div class="thumb-wrapper border border-dark" style="width: 200px;"><span class="wish-icon"><i class="fa fa-heart-o"></i></span><div class="img-box"><img src="' + 
				    category_items[i]["thumbnail"] +
				    '" class="img-fluid" alt="Missing Image"></div><div class="thumb-content"><h4>' +
				    category_items[i]["title"] +
				    '</h4><a href="' +
				    category_items[i]["link"] +
				    '" class="btn btn-outline-success">Create</a></div></div></div>';
				    $("#customize-sm").append(item_content);
				}
				$("#customize-md").empty();
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
				    $("#customize-md").append(item_content);
				}
			}
		</script>
  <body>
<Html>
