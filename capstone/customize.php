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
				<div class="col-md-12">
					<h2>Templates</h2>
					<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
						<!-- Wrapper for carousel items -->
						<div class="carousel-inner" style="width: 100%">
							<div class="item carousel-item active" style="overflow-x: auto;">
								<div class="d-flex flex-direction-row gap-4" id="customize" style="height: auto;">
									
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
		<script type="text/javascript" src="products.js"></script>
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
				    '</h4><a href="' +
				    category_items[i]["link"] +
				    '" class="btn btn-outline-success">Create</a></div></div></div>';
				    $("#one_sm_slideshow").append(item_content);
				}
			}
		</script>
  <body>
<Html>
