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
	  	<?php include('include/style.php') ?>
	  	<script defer src="include/face-api.min.js"></script>
	  	<script defer src="js/try_me_ar.js"></script>
	  	<style>
	  		body {
  		      	margin: 0;
  		      	padding: 0;
  		      	width: 100%;
  		      	height: 100vh;
  		      	display: flex;
  		      	justify-content: center;
  		      	align-items: center;
  		    }

  		    video {
  		    	object-fit: cover;
  		    }

  	        canvas {
              	position: absolute;
            }
  	    </style>
	</head>
	<body>
		<section class="loader"></section>
		<video id="video" width="100%" height="100%" autoplay muted></video>
	</body>
</html>