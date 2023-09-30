<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	  	<?php include('./include/style.php') ?>
		<style>
			.btn-customize {
			    background-color: #794B29;
			    color: white;
			}
			.my-button {
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
		</style>
	</head>
	<body class="font-monospace">
		<?php include('./include/header.php') ?>
		<main class="container-fluid m-0 p-0">
			<section class="py-5 text-center">
				<p>[This page is under maintenance]</p>
			</section>
			<section class="px-5">
				<div style="width: 100%; gap: 5px; display: flex;">
					<div style="width: 40%; border: 2px solid; text-align: center; padding: 10px 10px;">
						<h5>Tools</h5>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px;" class="my-button material-active" id="move">
								<i class="fas fa-expand-arrows-alt" style="margin-right: 5px;"></i><span>[Free Move]</span>
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
								<span>Select / Resize / Rotate / Move</span>
							</div>
						</div>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="flex: 33.33%; padding: 5px 5px;" class="my-button" id="draw">
								<i class="fas fa-pen" style="margin-right: 5px;"></i><span>[Free Draw]</span>
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
								<span style="margin-right: 5px;">Size:</span>
								<input type="number" id="size" value="1" style="width: 40px;">
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
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
						</div>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px; margin-bottom: 10px;" class="my-button" id="text">
								<i class="fas fa-font" style="margin-right: 5px;"></i><span>[Text]</span>
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
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
							<div style="width: 33.33%; padding: 5px 5px;" class="my-button" id="remove">
								<i class="fas fa-eraser" style="margin-right: 5px;"></i><span>[Erase]</span>
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
								<span>Select an object</span>
							</div>
						</div>
						<h5>Shapes</h5>
						<div style="padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px; margin-bottom: 10px;" class="my-button shape-button" data-action="square" id="square">
								<i class="fas fa-vector-square" style="margin-right: 5px;"></i><span>[Square]</span>
							</div>
							<div style="display: flex; justify-content: left;">
								<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Style:</span>
									<select id="square-style">
	                        	        <option value="transparent">Transparent</option>
	                        	        <option value="solid">Solid</option>
	                        	    </select>
								</div>
								<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
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
								<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Size:</span>
									<input type="number" id="square-size" value="6" style="width: 40px;">
								</div>
							</div>
						</div>
						<div style="padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px; margin-bottom: 10px;" class="my-button shape-button" data-action="circle" id="circle">
								<i class="far fa-circle" style="margin-right: 5px;"></i><span>[Circle]</span>
							</div>
							<div style="display: flex; justify-content: left;">
								<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Style:</span>
									<select id="circle-style">
	                        	        <option value="transparent">Transparent</option>
	                        	        <option value="solid">Solid</option>
	                        	    </select>
								</div>
								<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
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
								<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Size:</span>
									<input type="number" id="circle-size" value="6" style="width: 40px;">
								</div>
							</div>
						</div>
						<div style="padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px; margin-bottom: 10px;" class="my-button shape-button" data-action="triangle" id="triangle">
								<i class="fas fa-exclamation-triangle" style="margin-right: 5px;"></i><span>[Triangle]</span>
							</div>
							<div style="display: flex; justify-content: left;">
								<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Style:</span>
									<select id="triangle-style">
	                        	        <option value="transparent">Transparent</option>
	                        	        <option value="solid">Solid</option>
	                        	    </select>
								</div>
								<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
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
								<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
									<span style="margin-right: 5px;">Size:</span>
									<input type="number" id="triangle-size" value="6" style="width: 40px;">
								</div>
							</div>
						</div>
						<h5>Options</h5>
						<div style="display: flex; justify-content: left; padding: 10px 10px; border: 1px solid; margin-bottom: 5px;">
							<div style="width: 33.33%; padding: 5px 5px;" class="my-button" id="save">
								<span>[Save]</span>
							</div>
							<div style="flex: 33.33%; display: flex; justify-content: center; align-items: center;">
								<span>Save progress</span>
							</div>
						</div>
					</div>
					<div style="width: 60%; border: 2px solid;" id="resize">
						<canvas id="canvas"></canvas>
					</div>
				</div>
			</section>
		</main>
		<?php include('./include/footer.php') ?>
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
	   		    	removeButton()
		   		});

		   		$('#color').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton()
		   		});

		   		$('#text').on('click', function () {
		   		    canvas.isDrawingMode = false;
		   		    removeButton()
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
	   		    	removeButton()
		   		});

		   		canvas.on('selection:created', function () {
		   		    $('#remove').on('click', function () {
		   		        canvas.isDrawingMode = false;
		   		        removeButton()
		   		        canvas.remove(canvas.getActiveObject());
		   		    });
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
	   		    	removeButton()
		   		});

		   		$('#square-fill').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton()
		   		});

		   		$('#square-style').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton()
		   		});

		   		$('#circle-size').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton()
		   		});

		   		$('#circle-fill').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton()
		   		});

		   		$('#circle-style').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton()
		   		});

		   		$('#move').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	removeButton()
		   		});
		   	}
		</script>
	</body>
</html>
