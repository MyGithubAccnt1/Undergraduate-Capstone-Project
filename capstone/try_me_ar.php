<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="UTF-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
		<link rel="icon" type="image/x-icon" href="images/favicon.ico">
	  	<meta name="description" content="In partial fulfilment of the requirements for the degree of Bachelor of Science in Information Technology">
	  	<meta name="keywords" content="capstone, project, thesis">
	  	<meta name="author" content="Mhel Voi A. Bernabe">
	  	<script defer src="include/face-api.min.js"></script>
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
  		    }
  		    video {
  		    	position: absolute;
  		    	z-index: 1;
  		    	object-fit: cover;
  		    }
  		    #product {
  		    	position: absolute;
  		    	z-index: 2;
  		    }
  		    #direction {
  		    	position: absolute;
  		    	z-index: 3;
  		    }
  	    </style>
	</head>
	<body>
		<section class="loader"></section>
		<video id="video" width="100%" height="100%" autoplay muted></video>
		<canvas id="direction"></canvas>
		<canvas id="product"></canvas>
		<script type="text/javascript" src="include/fabric-5.4.2.min.js"></script>
		<script type="text/javascript" src="include/jquery-3.6.1.min.js"></script>
	</body>
</html>