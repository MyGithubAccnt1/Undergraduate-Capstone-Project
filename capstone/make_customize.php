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
	  	<?php include('./include/style.php') ?>
		<style>
			.my-button {
				display: flex;
				align-items: center;
				justify-content: left;
				border: 1px solid #000;
				cursor: pointer;
				background-color: #BB8A5B;
				color: #000;
				padding: 20px 40px;
			}
			.my-button:hover, .material-active{
				border: 1px solid #000;
				background-color: #794B29;
				color: #fff;
			}
			/**{
				outline: 2px solid limegreen;
			}*/
		</style>
	</head>
	<body class="font-monospace">
		<main class="container-fluid m-0 p-0">
			<section class="p-5">
				<div style="width: 100%; gap: 5px; display: flex;">
					<div style="width: 40%; border: 2px solid; text-align: center; padding: 10px 10px;">
						<h5>Tools</h5>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px 5px 10px;" class="my-button material-active" id="move">
								<i class="fas fa-expand-arrows-alt" style="margin-right: 5px;"></i><span>[Free Move]</span>
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
								<span>Select / Resize / Rotate / Move</span>
							</div>
						</div>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="flex: 33.33%; padding: 5px 5px 5px 10px;" class="my-button" id="draw">
								<i class="fas fa-pen" style="margin-right: 5px;"></i><span>[Free Draw]</span>
							</div>
							<div style="flex: 46.66%; display: flex; justify-content: center; align-items: center;">
								<span style="margin-right: 5px;">Color:</span>
								<select id="color">
									<option value="gold">Gold</option>
									<option value="silver">Silver</option>
                        	        <option value="black">Black</option>
                        	        <option value="gray">Gray</option>
                        	        <option value="brown">Brown</option>
                        	        <option value="red">Red</option>
                        	        <option value="orange">Orange</option>
                        	        <option value="yellow">Yellow</option>
                        	        <option value="green">Green</option>
                        	        <option value="blue">Blue</option>
                        	        <option value="purple">Purple</option>
                        	    </select>
							</div>
							<div style="flex: 20%; display: flex; justify-content: center; align-items: center;">
								<span style="margin-right: 5px;">Size:</span>
								<input type="number" id="size" value="1" style="width: 40px;">
							</div>
						</div>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px 5px 10px; margin-bottom: 10px;" class="my-button" id="text">
								<i class="fas fa-font" style="margin-right: 5px;"></i><span>[Text]</span>
							</div>
							<div style="flex: 40%; display: flex; justify-content: center; align-items: center;">
								<span style="margin-right: 5px;">Fill:</span>
								<select id="fill">
                        	        <option value="gold">Gold</option>
									<option value="silver">Silver</option>
                        	        <option value="black">Black</option>
                        	        <option value="gray">Gray</option>
                        	        <option value="brown">Brown</option>
                        	        <option value="red">Red</option>
                        	        <option value="orange">Orange</option>
                        	        <option value="yellow">Yellow</option>
                        	        <option value="green">Green</option>
                        	        <option value="blue">Blue</option>
                        	        <option value="purple">Purple</option>
                        	    </select>
							</div>
						</div>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px 5px 10px;" class="my-button" id="remove">
								<i class="fas fa-eraser" style="margin-right: 5px;"></i><span>[Erase]</span>
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
								<span>Select an object</span>
							</div>
						</div>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 60%; padding: 5px 5px 5px 5px;">
								<input type="file" id="imageFile" accept="image/*">
							</div>
							<div style="flex: 20%; display: flex; justify-content: center; align-items: center;">
								<span>Upload an image</span>
							</div>
						</div>
						<h5>Shapes</h5>
						<div style="padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px 5px 10px; margin-bottom: 10px;" class="my-button shape-button" data-action="square" id="square">
								<i class="fas fa-vector-square" style="margin-right: 5px;"></i><span>[Square]</span>
							</div>
							<div style="display: flex; justify-content: left;">
								<div style="flex: 40%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Style:</span>
									<select id="square-style">
	                        	        <option value="transparent">Transparent</option>
	                        	        <option value="solid">Solid</option>
	                        	    </select>
								</div>
								<div style="flex: 40%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Fill:</span>
									<select id="square-fill">
	                        	        <option value="gold">Gold</option>
										<option value="silver">Silver</option>
                        	        	<option value="black">Black</option>
	                        	        <option value="gray">Gray</option>
	                        	        <option value="brown">Brown</option>
	                        	        <option value="red">Red</option>
	                        	        <option value="orange">Orange</option>
	                        	        <option value="yellow">Yellow</option>
	                        	        <option value="green">Green</option>
	                        	        <option value="blue">Blue</option>
	                        	        <option value="purple">Purple</option>
	                        	    </select>
								</div>
								<div style="flex: 20%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Size:</span>
									<input type="number" id="square-size" value="6" style="width: 40px;">
								</div>
							</div>
						</div>
						<div style="padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px 5px 10px; margin-bottom: 10px;" class="my-button shape-button" data-action="circle" id="circle">
								<i class="far fa-circle" style="margin-right: 5px;"></i><span>[Circle]</span>
							</div>
							<div style="display: flex; justify-content: left;">
								<div style="flex: 40%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Style:</span>
									<select id="circle-style">
	                        	        <option value="transparent">Transparent</option>
	                        	        <option value="solid">Solid</option>
	                        	    </select>
								</div>
								<div style="flex: 40%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Fill:</span>
									<select id="circle-fill">
	                        	        <option value="gold">Gold</option>
										<option value="silver">Silver</option>
                        	        	<option value="black">Black</option>
	                        	        <option value="gray">Gray</option>
	                        	        <option value="brown">Brown</option>
	                        	        <option value="red">Red</option>
	                        	        <option value="orange">Orange</option>
	                        	        <option value="yellow">Yellow</option>
	                        	        <option value="green">Green</option>
	                        	        <option value="blue">Blue</option>
	                        	        <option value="purple">Purple</option>
	                        	    </select>
								</div>
								<div style="flex: 20%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Size:</span>
									<input type="number" id="circle-size" value="6" style="width: 40px;">
								</div>
							</div>
						</div>
						<div style="padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px 5px 10px; margin-bottom: 10px;" class="my-button shape-button" data-action="triangle" id="triangle">
								<i class="fas fa-exclamation-triangle" style="margin-right: 5px;"></i><span>[Triangle]</span>
							</div>
							<div style="display: flex; justify-content: left;">
								<div style="flex: 40%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Style:</span>
									<select id="triangle-style">
	                        	        <option value="transparent">Transparent</option>
	                        	        <option value="solid">Solid</option>
	                        	    </select>
								</div>
								<div style="flex: 40%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Fill:</span>
									<select id="triangle-fill">
	                        	        <option value="gold">Gold</option>
										<option value="silver">Silver</option>
                        	        	<option value="black">Black</option>
	                        	        <option value="gray">Gray</option>
	                        	        <option value="brown">Brown</option>
	                        	        <option value="red">Red</option>
	                        	        <option value="orange">Orange</option>
	                        	        <option value="yellow">Yellow</option>
	                        	        <option value="green">Green</option>
	                        	        <option value="blue">Blue</option>
	                        	        <option value="purple">Purple</option>
	                        	    </select>
								</div>
								<div style="flex: 20%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Size:</span>
									<input type="number" id="triangle-size" value="6" style="width: 40px;">
								</div>
							</div>
						</div>
						<h5>Options</h5>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px 5px 10px;" class="my-button" id="save">
								<span>[Save]</span>
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
								<span>Uploaded images can't be save</span>
							</div>
						</div>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px 5px 10px;" class="my-button" id="update">
								<span>[Update]</span>
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
								<span>Update current template</span>
							</div>
						</div>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px 5px 10px;" class="my-button" id="order">
								<span>[Make Order]</span>
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
								<span>Order using this template</span>
							</div>
						</div>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px 5px 10px;" class="my-button" id="back">
								<span>[Back]</span>
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
								<span>Go back to previous page</span>
							</div>
						</div>
					</div>
					<div style="width: 60%; border: 2px solid;" id="resize">
						<canvas id="canvas"></canvas>
					</div>
				</div>
			</section>
		</main>
		<script>
		   	const move = document.getElementById('move');
		   	const draw = document.getElementById('draw');
		   	const text = document.getElementById('text');
		   	const remove = document.getElementById('remove');
		   	const square = document.getElementById('square');
		   	const circle = document.getElementById('circle');
		   	const triangle = document.getElementById('triangle');

		   	function removeFreeDraw() {
		   		move.classList.remove('material-active');
		      	draw.classList.remove('material-active');
			}

			move.addEventListener('click', () => {
		   	    removeFreeDraw();
		   	    move.classList.add('material-active');
		   	});

			draw.addEventListener('click', () => {
		   	    removeFreeDraw();
		   	    draw.classList.add('material-active');
		   	});

		   	text.addEventListener('click', () => {
		   	    removeFreeDraw();
		   	    move.classList.add('material-active');
		   	});

		   	remove.addEventListener('click', () => {
		   	    removeFreeDraw();
		   	    move.classList.add('material-active');
		   	});

		   	square.addEventListener('click', () => {
		   	    removeFreeDraw();
		   	    move.classList.add('material-active');
		   	});

		   	circle.addEventListener('click', () => {
		   	    removeFreeDraw();
		   	    move.classList.add('material-active');
		   	});
		   	triangle.addEventListener('click', () => {
		   	    removeFreeDraw();
		   	    move.classList.add('material-active');
		   	});
		</script>
		<script src="./include/jquery-3.6.1.min.js"></script>
		<script src="./include/fabric-5.4.2.min.js"></script>
		<script>
		   	$(document).ready(function () {
		     	show();
		   	});
		   	function show() {
		   		const canvas = new fabric.Canvas('canvas', {isDrawingMode: false});
		   		const resize = document.getElementById('resize');
		   		const move = document.getElementById('move');
		   		const draw = document.getElementById('draw');

   		       	function removeButton() {
   		          	draw.classList.remove('material-active');
   		          	move.classList.add('material-active');
   		    	}

		   		canvas.setHeight(resize.clientHeight);
		   		canvas.setWidth(resize.clientWidth);
		   		// canvas.setBackgroundColor('black', canvas.renderAll.bind(canvas));
		   		
		   		canvas.freeDrawingBrush.color = $("#color").val();
		   		canvas.freeDrawingBrush.width = $("#size").val();

		   		$('#draw').on('click', function () {
		   		    canvas.isDrawingMode = !canvas.isDrawingMode;
		   		    if (canvas.isDrawingMode == true) {
		   		    	if ($("#size").val() > 0) {
		   		    		canvas.freeDrawingBrush.width = $("#size").val();
		   		    	} else {
		   		    		$("#size").val('1');
		   		    		canvas.freeDrawingBrush.width = $("#size").val();
		   		    	}
		   		    	canvas.freeDrawingBrush.color = $("#color").val();
		   		    }
		   		});

		   		$('#size').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton();
		   		});

		   		$('#color').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton();
		   		});

		   		$('#text').on('click', function () {
		   		    canvas.isDrawingMode = false;
		   		    removeButton();
		   		    const text = new fabric.IText('Text', {
		   		        left: 0,
		   		        top: 0,
		   		        objecttype: 'text',
		   		        fill: $("#fill").val(),
		   		    });
		   		    canvas.add(text);
		   		});

		   		$('#fill').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton();
		   		});

		   		canvas.on('selection:created', function () {
		   		    $('#remove').on('click', function () {
		   		        canvas.isDrawingMode = false;
		   		        removeButton();
		   		        canvas.remove(canvas.getActiveObject());
		   		    });
		   		});

		   		$('#imageFile').on('change', function (e) {
		   		  	canvas.isDrawingMode = false;
		   		  	removeButton();
		   		  	const file = e.target.files[0];
		   		  	if (file) {
		   		    	const reader = new FileReader();
		   		    	reader.onload = function (event) {
		   		      		const imageUrl = event.target.result;
				   		    fabric.Image.fromURL(imageUrl, function (img) {
				   		        img.set({
				   		          	left: 0,
				   		          	top: 0,
				   		          	scaleX: 0.5,
				   		          	scaleY: 0.5,
				   		        });
				   		        canvas.add(img);
				   		        canvas.renderAll(canvas);
				   		    });
			   		    };
		   		    reader.readAsDataURL(file);
		   		  	}
		   		});

		   		$('.shape-button').on('click', function () {
	   		        canvas.isDrawingMode = false;
	   		        removeButton();

	   		        const shape = $(this).data('action');
	   		        const size = parseInt($("#" + shape + "-size").val(), 10) || 0;
	   		        const style = $("#" + shape + "-style").val();
	   		        const fill = $("#" + shape + "-fill").val();

	   		        if (size > 0 || style === 'transparent') {
	   		            let newShape;

	   		            if (shape === 'square') {
	   		                newShape = new fabric.Rect({
	   		                    left: 0,
	   		                    top: 0,
	   		                    width: 60,
	   		                    height: 60,
	   		                    fill: style === 'transparent' ? 'transparent' : fill,
	   		                    stroke: style === 'transparent' ? fill : null,
	   		                    strokeWidth: size,
	   		                });
	   		            } else if (shape === 'circle') {
	   		                newShape = new fabric.Circle({
	   		                    left: 0,
	   		                    top: 0,
	   		                    radius: 60,
	   		                    fill: style === 'transparent' ? 'transparent' : fill,
	   		                    stroke: style === 'transparent' ? fill : null,
	   		                    strokeWidth: size,
	   		                });
	   		            } else if (shape === 'triangle') {
   		                    newShape = new fabric.Triangle({
   		                        left: 0,
   		                        top: 0,
   		                        width: 60,
   		                        height: 60,
   		                        fill: style === 'transparent' ? 'transparent' : fill,
   		                        stroke: style === 'transparent' ? fill : null,
   		                        strokeWidth: size,
   		                    });
   		                }

	   		            if (newShape) {
	   		                canvas.add(newShape);
	   		            }
	   		        }
	   		    });

		   		$('#square-size').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton();
		   		});

		   		$('#square-fill').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton();
		   		});

		   		$('#square-style').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton();
		   		});

		   		$('#circle-size').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton();
		   		});

		   		$('#circle-fill').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton();
		   		});

		   		$('#circle-style').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton();
		   		});

		   		$('#move').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton();
		   		});

		   		function serializeCanvasObjects(canvas) {
   		            const objects = canvas.getObjects();
   		            const serializedObjects = [];
   		            const backgroundImage = canvas.backgroundImage;

   		            for (const obj of objects) {
   		                const serializedObj = {
   		                    objectType: obj.type,
   		                    properties: obj.toObject(),
   		                };
   		                serializedObjects.push(serializedObj);
   		            }
   		            if (backgroundImage) {
	                    const bgData = {
	                        objectType: 'background',
	                        properties: backgroundImage.toObject(),
	                    };
	                    serializedObjects.push(bgData);
	                }
   		            return serializedObjects;
   		        }

   		        function saveCanvasObjects() {
   		            const serializedObjects = serializeCanvasObjects(canvas);

   		            if (serializedObjects.length === 0) {
	                    return;
	                }

	                var email = window.localStorage.getItem('email');
   		            var deyt = window.localStorage.getItem('deyt');

   		            $.ajax({
   		                url: './php/add_template.php',
   		                type: 'POST',
   		                contentType: 'application/json',
   		                data: JSON.stringify({
   		                	canvasObjects: serializedObjects,
   		                	email: email,
   		                	deyt: deyt
   		                }),
   		                success: function (data) {
   		                	uploadCanvasObjects();
   		                },
   		                error: function (xhr, status, error) {
   		                    console.error("AJAX Request Error:", status, error);
   		                },
   		            });

   		        }

   		        function convertCanvasToPNG(canvas) {
   		            const dataURL = canvas.toDataURL('image/png');
   		            return dataURL;
   		        }

   		        function uploadCanvasObjects() {
   		            const imageFile = convertCanvasToPNG(canvas);
   		            const imageDataWithoutPrefix = imageFile.split(',')[1];

   		            $.ajax({
   		                url: "./php/upload_template.php",
   		                method: "POST",
   		                data: {
   		                    imageFile: imageDataWithoutPrefix
   		                },
   		                success: function (data) {
   		                	canvas.clear();
    	   		            canvas.isDrawingMode = false;
    		   		    	removeButton();
   		                    window.location.href = "customize.php";
   		                },
   		                error: function (xhr, status, error) {
   		                    console.error("AJAX Request Error:", status, error);
   		                },
   		            });
   		        }


   		        $('#save').on('click', function () {
   		            saveCanvasObjects();
   		        });

   		        function getSelectedTemplate() {
   		        	var currentURL = window.location.href;
   		        	var desiredURL = "http://20.205.112.210/customize.php";
   		        	// var desiredURL = "http://localhost/capstone/make_customize.php";
   		        	var email = "";
   		        	var deyt = "";
   		        	if (currentURL === desiredURL) {
   		        	    email = window.localStorage.getItem('email');
   		        	    deyt = window.localStorage.getItem('deyt');
   		        	} else {
   		        	    email = new URLSearchParams(currentURL).get('email');
   		        	    deyt = new URLSearchParams(currentURL).get('deyt');
   		        	}
   		            $.ajax({
   		                url: './php/get_template.php',
   		                type: 'GET',
   		                contentType: 'application/json',
   		                data: {
   		                    email: email,
   		                    deyt: deyt
   		                },
   		                success: function (data) {
   		                    canvas.clear();
   		                    data.forEach(function (object) {
   		                        if (object.objectType === 'path') {
   		                            const properties = JSON.parse(object.properties);
                                    const fabricPath = new fabric.Path(properties.path, properties, properties.width);
                                    canvas.add(fabricPath);
   		                        } else if (object.objectType === 'i-text') {
								    const properties = JSON.parse(object.properties);
								    const text = new fabric.IText(properties.text, properties);
								    canvas.add(text);
								} else if (object.objectType === 'rect') {
   		                        	const properties = JSON.parse(object.properties);
   		                            const rect = new fabric.Rect(properties);
   		                            canvas.add(rect);
   		                        } else if (object.objectType === 'circle') {
   		                        	const properties = JSON.parse(object.properties);
   		                            const circle = new fabric.Circle(properties);
   		                            canvas.add(circle);
   		                        } else if (object.objectType === 'triangle') {
   		                        	const properties = JSON.parse(object.properties);
   		                        	const triangle = new fabric.Triangle(properties);
   		                            canvas.add(triangle);
   		                        } else if (object.objectType === 'background') {
   		                        	canvas.setBackgroundImage('images/templates/651e9d3d23b45.png', canvas.renderAll.bind(canvas));
   		                        }
   		                    });
   		                },
   		                error: function (xhr, status, error) {
   		                    console.error("Error retrieving data:", status, error);
   		                    console.log(xhr.responseText);
   		                }
   		            });
   		        }

   		        getSelectedTemplate();

   		        function updateTemplate() {
   		            const serializedObjects = serializeCanvasObjects(canvas);

   		            if (serializedObjects.length === 0) {
	                    return;
	                }

   		            var email = window.localStorage.getItem('email');
   		            var deyt = window.localStorage.getItem('deyt');

   		            $.ajax({
   		                url: './php/update_template.php',
   		                type: 'POST',
   		                contentType: 'application/json',
   		                data: JSON.stringify({
   		                	canvasObjects: serializedObjects,
   		                	email: email,
   		                	deyt: deyt
   		                }),
   		                success: function (data) {
   		                	uploadCanvasObjects();
   		                },
   		                error: function (xhr, status, error) {
   		                    console.error("AJAX Request Error:", status, error);
   		                },
   		            });

   		        }

   		        $('#update').on('click', function () {
   		            updateTemplate();
   		        });

   		        $('#order').on('click', function () {
   		            const serializedObjects = serializeCanvasObjects(canvas);

   		            if (serializedObjects.length === 0) {
	                    return;
	                }

   		            var email = window.localStorage.getItem('email');
   		            var deyt = window.localStorage.getItem('deyt');

   		            $.ajax({
   		                url: './php/update_template.php',
   		                type: 'POST',
   		                contentType: 'application/json',
   		                data: JSON.stringify({
   		                	canvasObjects: serializedObjects,
   		                	email: email,
   		                	deyt: deyt
   		                }),
   		                success: function (data) {
    			            const imageFile = convertCanvasToPNG(canvas);
    			            const imageDataWithoutPrefix = imageFile.split(',')[1];

    			            $.ajax({
    			                url: "./php/upload_template.php",
    			                method: "POST",
    			                data: {
    			                    imageFile: imageDataWithoutPrefix
    			                },
    			                success: function (data) {
    			                	canvas.clear();
    	 	   		            	canvas.isDrawingMode = false;
    	 		   		    		removeButton();
                		            window.location.href = "checkout_template.php";
    			                },
    			                error: function (xhr, status, error) {
    			                    console.error("AJAX Request Error:", status, error);
    			                },
    			            });
   		                },
   		                error: function (xhr, status, error) {
   		                    console.error("AJAX Request Error:", status, error);
   		                },
   		            });

   		        });

   		        $('#back').on('click', function () {
   		        	window.location.href = "customize.php";
   		            canvas.isDrawingMode = false;
	   		    	removeButton();
	   		    	canvas.clear();
   		        });

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