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
	  	<style>
  	        #video {
  	            position: absolute;
  	            top: 0;
  	            left: 0;
  	            width: 100%;
  	            height: 100%;
  	            object-fit: cover;
  	            z-index: 1;
  	        }

  	        #canvas {
  	            position: absolute;
  	            top: 0;
  	            left: 0;
  	            width: 100%;
  	            height: 100%;
  	            z-index: 2;
  	        }
  	    </style>
	</head>
	<body>
		<section class="loader"></section>
		<video id="video" width="100%" height="100%" autoplay></video>
		<canvas id="canvas"></canvas>
		<script type="text/javascript" src="include/fabric-5.4.2.min.js"></script>
		<script type="text/javascript">
			$(window).on('load', function() {
			  	$(".loader").fadeOut('slow');
			    const video = document.getElementById('video');
			    navigator.mediaDevices.getUserMedia({ video: true })
			        .then((stream) => {
			            video.srcObject = stream;
			            video.play();
			        })
			        .catch((error) => {
			            alert('Error accessing camera. Please check your camera permissions and try again.');
                        window.close();
			        });
			    ShowCanvas();
			    $(window).on('resize', function() {
		            ShowCanvas();
		        });
			});

			function ShowCanvas() {
			    const canvas = new fabric.Canvas('canvas', { isDrawingMode: false });
			    canvas.setHeight(parseFloat($('#video').css('height')));
			    canvas.setWidth(parseFloat($('#video').css('width')));

			    var dataURL = localStorage.getItem('Object');

			    if (dataURL) {
			        fabric.Image.fromURL(dataURL, function (img) {
			            img.set({
			            	originX: 'center',
			            	originY: 'center',
			            	left: canvas.width / 2,
			            	top: canvas.height / 2 + 50,
			            	evented: false
			            });
			            canvas.add(img);
			            canvas.renderAll();
			        });
			    }
			}
		</script>
	</body>
</html>