<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ICO">
	  	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/capstone/"; include($IPATH."include.html"); ?>
		<style>
			.product-card {
			  	margin: 15px 0;
			}
			button {
				width: 50%;
			}
		</style>
	</head>
	<body class="font-monospace bg-light">
		<?php include($IPATH."header.html"); ?>
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
					          	<div class="row" id="display-items-div">
					          		
					          	</div>
					        </div>
					    </div>
				    </div>
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

			let category_items = [
			  {
			    id: 1,
			    category_id: 8,
			    price: 39.42,
			    title: "SET 1",
			    thumbnail:
			      "images/set1.png",
			    link: "preview.php",
			    sizes: ["US-MEN-10", "US-MEN-11"]
			  },
			  {
			    id: 2,
			    category_id: 8,
			    price: 31.93,
			    title: "SET 2",
			    thumbnail:
			      "images/set2.png",
			    link: "preview.php",
			    sizes: ["US-MEN-13"]
			  },
			  {
			    id: 3,
			    category_id: 8,
			    price: 49.44,
			    title: "SET 3",
			    thumbnail:
			      "images/set3.png",
			    link: "preview.php",
			    sizes: ["US-MEN-14"]
			  },
			  {
			    id: 4,
			    category_id: 58,
			    price: 65.38,
			    title: "SET 4",
			    thumbnail:
			      "images/set4.png",
			    link: "preview.php",
			    sizes: ["US-MEN-13"]
			  },
			  {
			    id: 5,
			    category_id: 8,
			    price: 27.21,
			    title: "SET 5",
			    thumbnail:
			      "images/set5.png",
			    link: "preview.php",
			    sizes: ["US-MEN-9", "US-MEN-8", "US-MEN-10", "US-MEN-11", "US-MEN-12"]
			  },
			  {
			    id: 6,
			    category_id: 8,
			    price: 73.05,
			    title: "SET 6",
			    thumbnail:
			      "images/set6.png",
			    link: "preview.php",
			    sizes: [
			      "US-MEN-9",
			      "US-MEN-8",
			      "US-MEN-10",
			      "US-MEN-11",
			      "US-MEN-12",
			      "US-MEN-13"
			    ]
			  },
			  {
			    id: 7,
			    category_id: 8,
			    price: 51.96,
			    title: "SET 7",
			    thumbnail:
			      "images/set7.png",
			    link: "preview.php",
			    sizes: ["US-MEN-9", "US-MEN-8", "US-MEN-10", "US-MEN-11"]
			  },
			  {
			    id: 8,
			    category_id: 8,
			    price: 29.35,
			    title: "SET 8",
			    thumbnail:
			      "images/set8.png",
			    link: "preview.php",
			    sizes: ["US-MEN-11", "US-MEN-12", "US-MEN-13"]
			  },
			  {
			    id: 9,
			    category_id: 8,
			    price: 80.0,
			    title: "SET 9",
			    thumbnail:
			      "images/set9.png",
			    link: "preview.php",
			    sizes: ["US-MEN-9", "US-MEN-8", "US-MEN-10", "US-MEN-11"]
			  },
			  {
			    id: 10,
			    category_id: 8,
			    price: 70.07,
			    title: "SET 10",
			    thumbnail:
			      "images/set10.png",
			    link: "preview.php",
			    sizes: ["US-MEN-9", "US-MEN-8", "US-MEN-10"]
			  },
			  {
			    id: 11,
			    category_id: 8,
			    price: 79.37,
			    title: "SET 11",
			    thumbnail:
			      "images/set11.png",
			    link: "preview.php",
			    sizes: ["US-MEN-9", "US-MEN-8", "US-MEN-10", "US-MEN-11", "US-MEN-12"]
			  }
			];

			function showAllItems() {
			  //Default grid to show all items on page load in
			  $("#display-items-div").empty();
			  for (let i = 0; i < category_items.length; i++) {
			    let item_content =
			      '<div class="col-sm-12 col-md-6 col-lg-6 text-center product-card" data-available-sizes="' +
			      category_items[i]["sizes"] +
			      '"><b>' +
			      category_items[i]["title"] +
			      '</b><br><img src="' +
			      category_items[i]["thumbnail"] +
			      '" height="150" width="150" alt="Missing Image"><p>$' +
			      category_items[i]["price"] +
			      '</p><a href="' +
			      category_items[i]["link"] +
			      '"><button class="btn btn-danger rounded-pill">View</button></a></div>';
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
				        '<div class="col-sm-12 col-md-6 col-lg-6 text-center product-card" data-available-sizes="' +
				        category_items[i]["sizes"] +
				        '"><b>' +
				      	category_items[i]["title"] +
				      	'</b><br><img src="' +
				      	category_items[i]["thumbnail"] +
				      	'" height="150" width="150" alt="Missing Image"><p>$' +
				      	category_items[i]["price"] +
				      	'</p><a href="' +
				      	category_items[i]["link"] +
				      	'"><button class="btn btn-danger rounded-pill">View</button></a></div>';
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