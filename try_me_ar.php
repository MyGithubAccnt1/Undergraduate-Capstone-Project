<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="UTF-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  	<title>Saint Benedict Medallion</title>
		<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	  	<meta name="description" content="In partial fulfilment of the requirements for the degree of Bachelor of Science in Information Technology">
	  	<meta name="keywords" content="capstone, project, thesis">
	  	<meta name="author" content="Mhel Voi A. Bernabe">
	  	<script defer src="js/try_me_ar.js"></script>
	  	<style>
	  		* {
	  		    margin: 0;
	  		    padding: 0;
	  		    box-sizing: border-box;
	  		}   
	  		body {
  		      	width: 100%;
  		      	height: 100vh;
  		      	overflow: hidden;
  		    }
  		    video {
  		    	position: absolute;
  		    	z-index: 1;
  		    	object-fit: cover;
  		    	transform: scaleX(-1);
  		    }
  		    .product {
  		    	margin-top: 5vh;
  		    	position: absolute;
  		    	z-index: 3;
  		    }
  		    .direction {
  		    	margin-top: 5vh;
  		    	position: absolute;
  		    	z-index: 4;
  		    }
  		    .background {
  		    	height: 100vh;
  		    	width: 100%;
  		    	display: none;
  		    	position: absolute;
  		    	z-index: 2;
  		    	top: 0;
  		    	left: 0;
  		    	background-size: 100% 100%;
  		    	background-repeat: no-repeat;
  		    }
  		    .options {
  		    	display: none;
  		    	position: absolute;
  		    	top: 0;
  		    	left: 0;
  		    	z-index: 5;
  		    	display: flex;
  		    	justify-content: center;
  		    	gap: 10px;
  		    	width: 100%;
  		    }
  		    .option1 {
  		    	display: none;
  		    	height: 100px; 
  		    	width: 100px; 
  		    	padding: 15px; 
  		    	border: 1px solid #fff; 
  		    	display: flex; 
  		    	align-items: center; 
  		    	justify-content: center;
  		    }
  		    .option1:hover {
  		    	background-color: rgba(255, 255, 255, 0.1);
  		    }
  	    </style>
	</head>
	<body>
		<section class="loader"></section>
		<video id="video" width="100%" height="100%" autoplay muted></video>
		<canvas id="direction" class="direction"></canvas>
		<canvas id="product" class="product"></canvas>
		<section id="options" class="options">
			<div type="button" id="option1" class="option1">
				<img src="" id="background1" style="height: 100%; width: 100%; display: none;">
			</div>
		</section>
		<section id="background" class="background"></section>
		<script type="text/javascript" src="include/fabric-5.4.2.min.js"></script>
		<script type="text/javascript" src="include/jquery-3.6.1.min.js"></script>
	</body>
</html>