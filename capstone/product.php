<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	  	<?php include('include.php') ?>
		<style>
			.product-card {
			  	margin: 15px 0;
			}
			.product-button {
				width: 50%;
			}
		</style>
	</head>
	<body class="font-monospace bg-light">
		<?php include('header.php') ?>
		<main class="container-fluid my-4 my-width p-0">
			<div class="container">
				<div class="row">
				    <div class="col-sm-12 col-md-12 col-lg-4">
					    <div class="card px-2">
					        <h2 class="text-center">Filter by</h2>
					        <h4 class="text-center">
					        	<hr>Price<hr>
					        </h4>
					        <div class="card-body">
						        <form id="price-range-form">
						            <label for="min-price" class="form-label">Min price: </label>
						            <span id="min-price-txt">₱0</span>
						            <input type="range" class="form-range" min="0" max="999" id="min-price" step="1" value="0">
						            <label for="max-price" class="form-label">Max price: </label>
						            <span id="max-price-txt">₱1000</span>
						            <input type="range" class="form-range" min="1" max="1000" id="max-price" step="1" value="1000">
						        </form>
					        </div>
					    </div>
				    </div>
				    <div class="col-sm-12 col-md-12 col-lg-8">
					    <div class="card">
					        <div class="card-body">
					        	<div class="d-flex justify-content-center">
					        		<a href="customize.php">
					        			<button class="btn btn-outline-success rounded-0 btn-sm">CUSTOMIZE</button>
					        		</a>
					        	</div>
					          	<div class="carousel slide p-0" data-ride="carousel" data-interval="0">  
					          		<!-- Wrapper for carousel items -->
					          		<div class="carousel-inner" style="width: 100%">
					          			<div class="item carousel-item active" style="overflow-x: auto;">
					          				<div class="d-flex flex-direction-row gap-4" id="display-items-div" style="height: auto;">
					          					
					          				</div>
					          			</div>
					          		</div>
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
		<?php 
		include("connect.php");
		$sql = "SELECT * FROM product";
		$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

		$category_items = array();
		while($row =mysqli_fetch_assoc($result)){
			$category_items['id'] = $row['id'];
			$category_items['category_id'] = $row['category_id'];
			$category_items['price'] = $row['price'];
			$category_items['title'] = $row['title'];
			$category_items['thumbnail'] = $row['thumbnail'];
			$category_items['link'] = $row['link'];
			$category_items['sizes'] = $row['sizes'];
		}
		echo json_encode($category_items);
		var test = $category_items;
		var_dump($test);
		?>
		<script src="products.js"></script>
		<script>
			let min_price = 0;
			let max_price = 1000;

			$(document).ready(function () {
			  showAllItems(); //Display all items with no filter applied
			});

			$("#min-price").on("change mousemove", function () {
			  min_price = parseInt($("#min-price").val());
			  $("#min-price-txt").text("₱" + min_price);
			  showItemsFiltered();
			});

			$("#max-price").on("change mousemove", function () {
			  max_price = parseInt($("#max-price").val());
			  $("#max-price-txt").text("₱" + max_price);
			  showItemsFiltered();
			});

			function showAllItems() {
			  //Default grid to show all items on page load in
			  $("#display-items-div").empty();
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
				    '"><button class="rounded-0 btn btn-outline-success">View</button></a></div></div></div>';
			    $("#display-items-div").append(item_content);
			  }
			}

			function showItemsFiltered() {
				let counter = 0;
			  	//Default grid to show all items on page load in
			  	$("#display-items-div").empty();
			  	for (let i = 0; i < category_items.length; i++) {
			    //Go through the items but only show items that have size from show_sizes_array
				    if ( category_items[i]["price"] <= max_price && category_items[i]["price"] >= min_price ) {
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
				        '"><button class="rounded-0 btn btn-outline-success">View</button></a></div></div></div>';
				        $("#display-items-div").append(item_content); //Display in grid
				    } else {
				    	counter = counter + 1;
				    }
				}
				if ( counter == 11 ) {
				    let item_content =
				    '<div class="col-sm-12 col-md-6 col-lg-6 text-center product-card mx-auto"><b>No Item Found.</b></div>';
				    $("#display-items-div").append(item_content); //Display in grid
				}
			}
		</script>
	</body>
</html>
