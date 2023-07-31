<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	  	<?php include('include.php') ?>
		<style>
		  	.bg{
		  		position: absolute;
		  		z-index: -2;
		  		top: 0;
		  		left: 0;
		  		height: 100vh;
		  		width: 100%;
		  		background-image: url('images/bg.gif');
		  		background-size: cover;
		  		background-repeat: no-repeat;
		  		filter: brightness(30%);
		  	}
		</style>
	</head>
	<body class="font-monospace bg-light">
		<?php include('header.php') ?>
		<main class="container-fluid">
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
			?>
			<p><?php echo $category_items; ?></p>
		</main>
		<?php include('footer.php') ?>
		<script>
			var navbar = document.querySelector('header')
			window.onscroll = function() {
			  if (window.pageYOffset > 0) {
			    navbar.classList.add('bg-dark')
			  } else {
			    navbar.classList.remove('bg-dark')
			  }
			}
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
			$(document).ready(function(){
				$(".wish-icon i").click(function(){
					$(this).toggleClass("fa-heart fa-heart-o");
				});
			});	
		</script>
		<script type="text/javascript" src="products.js"></script>
		<script>
			$(document).ready(function () {
			  showAllItems(); //Display all items with no filter applied
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
				    '</h4><p class="item-price"><b>₱' +
				    category_items[i]["price"] +
				    '</b></p><a href="' +
				    category_items[i]["link"] +
				    '" class="btn btn-primary">View</a></div></div></div>';
				    $("#one_sm_slideshow").append(item_content);
				}
				$("#one_md_slideshow").empty();
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
				    '" class="btn btn-primary">View</a></div></div></div>';
				    $("#one_md_slideshow").append(item_content);
				}
				$("#two_sm_slideshow").empty();
				for (let i = 0; i < category_items.length; i++) {
				    let item_content =
				    '<div class="col-sm-6 p-0" data-available-sizes="' + 
				    category_items[i]["sizes"] + 
				    '"><div class="thumb-wrapper border border-dark" style="width: 200px;"><span class="wish-icon"><i class="fa fa-heart-o"></i></span><div class="img-box"><img src="' + 
				    category_items[i]["thumbnail"] +
				    '" class="img-fluid" alt="Missing Image"></div><div class="thumb-content"><h4>' +
				    category_items[i]["title"] +
				    '</h4><p class="item-price"><b>₱' +
				    category_items[i]["price"] +
				    '</b></p><a href="' +
				    category_items[i]["link"] +
				    '" class="btn btn-primary">View</a></div></div></div>';
				    $("#two_sm_slideshow").append(item_content);
				}
				$("#two_md_slideshow").empty();
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
				    '" class="btn btn-primary">View</a></div></div></div>';
				    $("#two_md_slideshow").append(item_content);
				}
			}
		</script>
	</body>
</html>
