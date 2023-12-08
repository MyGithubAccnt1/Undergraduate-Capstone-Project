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
			/**{
				outline: 1px solid limegreen;
			}*/
			.my-button {
				position: relative;
				display: flex;
				align-items: center;
				justify-content: center;
				cursor: pointer;
				width: 100%;
				margin: 0;
				padding: 12px 0;
				border: none;
				background-color: inherit;
			}
			.my-option {
				cursor: pointer;
				margin: 0 10px 0 0;
				padding: 0 5px;
				border: none;
				background-color: inherit;
			}
			.my-info {
				padding: 0 5px;
			}
			.my-button:hover, .my-option:hover, .tool-active {
				background-color: #794B29;
				color: #fff;
			}
			.button-options {
				position: absolute;
				top: 0;
				left: 0;
				z-index: 2;
				border: 1px solid #000;
				background-color: #fff;
				display: none;
			}
			.options {
				margin: 0;
				padding: 3px 75px 3px 25px;
				border: none;
				background-color: inherit;
				text-align: left;
			}
			.template-options {
				margin: 0;
				padding: 3px;
				border: none;
				background-color: inherit;
				text-align: center;
				max-width: 100px;
				width: 100px;
			}
			.options:hover, .template-options:hover {
				background-color: rgba(250, 250, 210, 1.0);
				cursor: pointer;
			}
			.canvas-size {
				flex: 1;
				border: 1px solid #000;
				background-color: rgba(121, 75, 41, 0.5);
				overflow-y: auto;
				overflow-x: auto;
			    padding: 0;
			}
			@media screen and (min-width: 1140px) {
			    .canvas-size {
		    		display: flex;
		    		justify-content: center;
		    	    padding: 0 0 200px 0;
			    }
			}
			@media screen and (min-width: 1024px) and (max-width: 1139px) {
			    .canvas-size {
			        padding: 0 0 95px 0;
			    }
			}
			@media screen and (min-width: 768px) and (max-width: 1023px) {
			    .canvas-size {
			        padding: 5% 5% 16.5% 5%;
			    }
			}
			@media screen and (min-width: 424px) and (max-width: 767px) {
			    .canvas-size {
			        padding: 10% 10% 30% 10%;
			    }
			}
			@media screen and (min-width: 375px) and (max-width: 423px) {
			    .canvas-size {
			        padding: 10% 10% 34% 10%;
			    }
			}
			@media screen and (max-width: 376px) {
			    .canvas-size {
			        padding: 15% 15% 42.5% 15%;
			    }
			}
		</style>
	</head>
	<body class="font-monospace">
		<main class="container-fluid m-0 p-0">
			<section class="button-options" id="file-options">
				<div style="display: flex; flex-direction: column; padding: 0; margin: 0;">
					<button class="options" id="update">Save & Exit</button>
					<button class="options" id="back">Exit</button>
				</div>
			</section>
			<section class="button-options" id="image-options">
				<div style="display: flex; flex-direction: column; padding: 0; margin: 0;">
					<input class="options" type="file" id="image" accept="image/png">
					<button class="options" id="background-button">Templates</button>
				</div>
			</section>
			<section class="button-options" id="background-options">
				<div style="display: flex; flex-direction: column; padding: 0; margin: 0;">
					<button class="options" id="necklace-button">Necklace</button>
					<button class="options">Pin</button>
					<button class="options">Table Nameplate</button>
					<button class="options" id="logo-button">Logo Seal</button>
				</div>
			</section>
			<section class="button-options" id="necklace-options">
				<div style="display: flex; flex-direction: row; padding: 0; margin: 0;">
					<button class="template-options" id="remove-necklace">Remove Chain</button>
					<button class="template-options" id="gold-necklace">
						<img src="images/gold-necklace.png" height="45px" width="40px" alt="Missing_Image">
						<p>Gold</p>
					</button>
					<button class="template-options" id="silver-necklace">
						<img src="images/silver-necklace.png" height="45px" width="40px" alt="Missing_Image">
						<p>Silver</p>
					</button>
					<button class="template-options" id="bronze-necklace">
						<img src="images/bronze-necklace.png" height="45px" width="40px" alt="Missing_Image">
						<p>Bronze</p>
					</button>
				</div>
				<div style="display: flex; flex-direction: row; padding: 0; margin: 0;">
					<button class="template-options" id="gold-cross">
						<img src="images/gold-cross.png" height="45px" width="40px" alt="Missing_Image">
						<p>Gold</p>
					</button>
					<button class="template-options" id="silver-cross">
						<img src="images/silver-cross.png" height="45px" width="40px" alt="Missing_Image">
						<p>Silver</p>
					</button>
					<button class="template-options" id="bronze-cross">
						<img src="images/bronze-cross.png" height="45px" width="40px" alt="Missing_Image">
						<p>Bronze</p>
					</button>
				</div>
			</section>
			<section class="button-options" id="logo-options">
				<div style="display: flex; flex-direction: row; padding: 0; margin: 0;">
					<button class="template-options" id="remove-logo">Remove</button>
					<button class="template-options" id="gold-logo">
						<img src="images/gold-logo.png" height="45px" width="40px" alt="Missing_Image">
						<p>Gold</p>
					</button>
					<button class="template-options" id="silver-logo">
						<img src="images/silver-logo.png" height="45px" width="40px" alt="Missing_Image">
						<p>Silver</p>
					</button>
					<button class="template-options" id="bronze-logo">
						<img src="images/bronze-logo.png" height="45px" width="40px" alt="Missing_Image">
						<p>Bronze</p>
					</button>
				</div>
			</section>
			<section style="height: 100vh; width: 100%; margin: 0; overflow-x: hidden; overflow-y: hidden;">
				<div style="height: 25px; padding: 0; margin: 0; background-color: #794B29;"></div>
				<div style="display: flex; flex-direction: row; align-items: center; height: 35px; padding-left: 10px; margin: 0; background-color: #D0B89F;">
					<button class="my-option" id="file-button">File</button>
					<button class="my-option" id="image-button">Image</button>
					<button class="my-option" id="order">Order</button>
					<button class="my-option" id="view">Switch View</button>
				</div>
				<div style="display: flex; flex-direction: row; align-items: center; height: 35px; padding-left: 10px; margin: 0; background-color: #D0B89F; overflow-x: auto; overflow-y: auto;">
					<div class="my-info">Current Tool:</div>
					<div class="my-info" id="current-tool" style="margin-right: 10px;">
						<i class="fas fa-arrows-alt"></i>
					</div>
					<div class="my-info">Current X:</div>
					<div class="my-info">
						<input type="text" id="current-x" value="0" style="width: 40px; padding: 0 5px; margin-right: 10px;" disabled="disabled">
					</div>
					<div class="my-info">Current Y:</div>
					<div class="my-info">
						<input type="text" id="current-y" value="0" style="width: 40px; padding: 0 5px; margin-right: 10px;" disabled="disabled">
					</div>
					<div class="my-info">Current View:</div>
					<div class="my-info">
						<input type="text" id="current-view" value="Front" style="width: 60px; padding: 0 5px; margin-right: 10px;" disabled="disabled">
					</div>
				</div>
				<div style="display: flex; flex-direction: row; margin: 0; padding: 0; width: 100%; height: 100vh;">
					<div style="display: flex; flex-direction: column; background-color: #D0B89F; width: 40px;">
						<button class="my-button tool-active" id="move-tool" title="Move Tool">
							<i class="fas fa-arrows-alt"></i>
						</button>
						<button class="my-button" id="brush-tool" title="Brush Tool">
							<i class="fas fa-paint-brush"></i>
						</button>
						<button class="my-button" id="eraser-tool" title="Eraser Tool">
							<i class="fas fa-eraser"></i>
						</button>
						<button class="my-button" id="type-tool" title="Type Tool">
							<i class="fas fa-font"></i>
						</button>
						<button class="my-button" id="square-tool" title="Square Tool">
							<i class="fas fa-square"></i>
						</button>
						<button class="my-button" id="circle-tool" title="Circle Tool">
							<i class="fas fa-circle"></i>
						</button>
						<button class="my-button" id="triangle-tool" title="Triangle Tool">
							<i class="fas fa-play"></i>
						</button>
					</div>
					<div class="canvas-size">
						<canvas id="canvas"></canvas>
					</div>
					<div style="display: flex; flex-direction: column; background-color: #D0B89F; width: 20%; text-align: left; padding: 0 10px; overflow-x: auto; overflow-y: auto;">
						<div class="text-center">Properties</div>
						<hr class="mt-2">
						<div id="move-property" style="display: block;">
							<p><small class="text-primary">Instruction:</small> You can move, resize, rotate or manipulate a selected object using this tool.</p>
						</div>
						<div id="brush-property" style="display: none;">
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Color:</span>
								<select id="brush-color">
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
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Width:</span>
								<input type="number" id="brush-width" value="1" style="width: 40px;">
							</div>
							<br>
							<div style="display: flex; justify-content: center; align-items: center;">
								<button id="brush" class="btn-main rounded-pill w-75">Activate</button>
							</div>
							<hr>
							<div>
								<p><small class="text-primary">Instruction:</small> You can draw anywhere on the canvas when you activate this tool.</p>
								<p><small class="text-primary">How To Use:</small> When <small class="text-danger">Activated</small>, use mouse click and movements to draw.</p>
							</div>
						</div>
						<div id="eraser-property" style="display: none;">
							<div style="display: flex; justify-content: center; align-items: center;">
								<button id="eraser" class="btn-main rounded-pill w-75">Activate</button>
							</div>
							<hr>
							<div>
								<p><small class="text-primary">Instruction:</small> You can delete or remove a selected object using this tool.</p>
								<p><small class="text-primary">How To Use:</small> Select object/s then <small class="text-danger">[Click]</small> activate.</p>
							</div>
						</div>
						<div id="type-property" style="display: none;">
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Text:</span>
								<textarea id="type-input" rows="1" class="w-100" style="resize: none;"></textarea>
							</div>
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Fill:</span>
								<select id="type-fill">
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
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Font:</span>
								<select id="type-font">
                        	        <option value="Arial">Arial</option>
                        	        <option value="Courier">Courier</option>
									<option value="Helvetica">Helvetica</option>
									<option value="Impact">Impact</option>
									<option value="Segoe UI">Segoe UI</option>
									<option value="Times New Roman">Times New Roman</option>
									<option value="Verdana">Verdana</option>
                        	    </select>
							</div>
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Alignment:</span>
								<select id="type-align">
                        	        <option value="left">Left</option>
                        	        <option value="center">Center</option>
									<option value="right">Right</option>
                        	    </select>
							</div>
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Style:</span>
								<select id="type-style">
                        	        <option value="normal">Normal</option>
                        	        <option value="bold">Bold</option>
									<option value="italic">Italic</option>
                        	    </select>
							</div>
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Size:</span>
								<input type="number" id="type-size" value="30" style="width: 40px;">
							</div>
							<br>
							<div style="display: flex; justify-content: center; align-items: center;">
								<button id="type" class="btn-main rounded-pill w-75">Activate</button>
							</div>
							<hr>
							<div>
								<p><small class="text-primary">Instruction:</small> You can type something using this tool.</p>
								<p><small class="text-primary">How To Use:</small> When <small class="text-danger">Activated</small>, <small class="text-danger">[Click]</small> anywhere on the canvas for text to appear.</p>
							</div>
						</div>
						<div id="square-property" style="display: none;">
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Style:</span>
								<select id="square-style">
                        	        <option value="transparent">Transparent</option>
                        	        <option value="solid">Solid</option>
                        	    </select>
							</div>
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Fill:</span>
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
							<br>
							<div style="display: flex; justify-content: center; align-items: center;">
								<button id="square" class="btn-main rounded-pill w-75">Activate</button>
							</div>
							<hr>
							<div>
								<p><small class="text-primary">Instruction:</small> You can create a square object using this tool.</p>
								<p><small class="text-primary">How to use:</small> When <small class="text-danger">Activated</small>, <small class="text-danger">[Click & Drag]</small> anywhere on the canvas to create a square shape.</p>
							</div>
						</div>
						<div id="circle-property" style="display: none;">
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Style:</span>
								<select id="circle-style">
                        	        <option value="transparent">Transparent</option>
                        	        <option value="solid">Solid</option>
                        	    </select>
							</div>
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Fill:</span>
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
							<br>
							<div style="display: flex; justify-content: center; align-items: center;">
								<button id="circle" class="btn-main rounded-pill w-75">Activate</button>
							</div>
							<hr>
							<div>
								<p><small class="text-primary">Instruction:</small> You can create a circle object using this tool.</p>
								<p><small class="text-primary">How to use:</small> When <small class="text-danger">Activated</small>, <small class="text-danger">[Click & Drag]</small> anywhere on the canvas to create a circle shape.</p>
							</div>
						</div>
						<div id="triangle-property" style="display: none;">
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Style:</span>
								<select id="triangle-style">
                        	        <option value="transparent">Transparent</option>
                        	        <option value="solid">Solid</option>
                        	    </select>
							</div>
							<div style="display: flex; justify-content: left; align-items: center;">
								<span style="margin: 0 5px 0 0; padding: 5px;">Fill:</span>
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
							<br>
							<div style="display: flex; justify-content: center; align-items: center;">
								<button id="triangle" class="btn-main rounded-pill w-75">Activate</button>
							</div>
							<hr>
							<div>
								<p><small class="text-primary">Instruction:</small> You can create a triangle object using this tool.</p>
								<p><small class="text-primary">How to use:</small> When <small class="text-danger">Activated</small>, <small class="text-danger">[Click & Drag]</small> anywhere on the canvas to create a triangle shape.</p>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<script>

			document.getElementById('file-button').addEventListener('click', () => {
		   	    if ($("#file-options").css("display") === "none") {
		   	    	$("#file-options").css("display", "block");
		   	    	$("#image-options").css("display", "none");
		   	    } else {
		   	    	$("#file-options").css("display", "none");
		   	    }
		   	    const thisButton = document.getElementById('file-button').getBoundingClientRect();
		   	    const thisTop = thisButton.top + 25;
		   	    document.getElementById('file-options').style.top = thisTop + 'px';
		   	    document.getElementById('file-options').style.left = thisButton.left + 'px';
		   	});

			document.getElementById('image-button').addEventListener('click', () => {
		   	    if ($("#image-options").css("display") === "none") {
		   	    	$("#image-options").css("display", "block");
		   	    	$("#file-options").css("display", "none");
		   	    } else {
		   	    	$("#image-options").css("display", "none");
		   	    }
		   	    const thisButton = document.getElementById('image-button').getBoundingClientRect();
		   	    const thisTop = thisButton.top + 25;
		   	    document.getElementById('image-options').style.top = thisTop + 'px';
		   	    document.getElementById('image-options').style.left = thisButton.left + 'px';
		   	});

		   	document.getElementById('background-button').addEventListener('mouseover', () => {
		   	    $("#background-options").css("display", "block");
		   	    const thisButton = document.getElementById('background-button').getBoundingClientRect();
		   	    const thisTop = thisButton.top - 1;
		   	    document.getElementById('background-options').style.top = thisTop + 'px';
		   	    document.getElementById('background-options').style.left = thisButton.right + 'px';
		   	});

		   	document.getElementById('necklace-button').addEventListener('mouseover', () => {
		   	    $("#necklace-options").css("display", "block");
		   	    $("#logo-options").css("display", "none");
		   	    const thisButton = document.getElementById('necklace-button').getBoundingClientRect();
		   	    const thisTop = thisButton.top - 1;
		   	    document.getElementById('necklace-options').style.top = thisTop + 'px';
		   	    document.getElementById('necklace-options').style.left = thisButton.right + 'px';
		   	});

		   	document.getElementById('logo-button').addEventListener('mouseover', () => {
		   	    $("#logo-options").css("display", "block");
		   	    $("#necklace-options").css("display", "none");
		   	    const thisButton = document.getElementById('logo-button').getBoundingClientRect();
		   	    const thisTop = thisButton.top - 1;
		   	    document.getElementById('logo-options').style.top = thisTop + 'px';
		   	    document.getElementById('logo-options').style.left = thisButton.right + 'px';
		   	});

		   	document.getElementById('order').addEventListener('mouseover', () => {
		   	    $("#file-options").css("display", "none");
		   	    $("#image-options").css("display", "none");
		   	    $("#background-options").css("display", "none");
		   	    $("#necklace-options").css("display", "none");
		   	    $("#logo-options").css("display", "none");
		   	});

		   	document.getElementById('view').addEventListener('mouseover', () => {
		   	    $("#file-options").css("display", "none");
		   	    $("#image-options").css("display", "none");
		   	    $("#background-options").css("display", "none");
		   	    $("#necklace-options").css("display", "none");
		   	    $("#logo-options").css("display", "none");
		   	});

		   	document.getElementById('image-button').addEventListener('mouseover', () => {
		   	    $("#file-options").css("display", "none");
		   	});

		   	document.getElementById('file-button').addEventListener('mouseover', () => {
		   	    $("#image-options").css("display", "none");
		   	    $("#background-options").css("display", "none");
		   	    $("#necklace-options").css("display", "none");
		   	    $("#logo-options").css("display", "none");
		   	});

		   	document.getElementById('image').addEventListener('mouseover', () => {
		   	    $("#background-options").css("display", "none");
		   	    $("#necklace-options").css("display", "none");
		   	    $("#logo-options").css("display", "none");
		   	});

		   	const move = document.getElementById('move-tool');
		   	const brush = document.getElementById('brush-tool');
		   	const type = document.getElementById('type-tool');
		   	const eraser = document.getElementById('eraser-tool');
		   	const square = document.getElementById('square-tool');
		   	const circle = document.getElementById('circle-tool');
		   	const triangle = document.getElementById('triangle-tool');

		   	function ResetCurrentTool() {
		   		move.classList.remove('tool-active');
		   		brush.classList.remove('tool-active');
		   		type.classList.remove('tool-active');
		   		eraser.classList.remove('tool-active');
		   		square.classList.remove('tool-active');
		   		circle.classList.remove('tool-active');
		   		triangle.classList.remove('tool-active');
		   		$("#move-property").css("display", "none");
		   		$("#brush-property").css("display", "none");
		   		$("#eraser-property").css("display", "none");
		   		$("#type-property").css("display", "none");
		   		$("#square-property").css("display", "none");
		   		$("#circle-property").css("display", "none");
		   		$("#triangle-property").css("display", "none");
		   	}

			move.addEventListener('click', () => {
		   	    ResetCurrentTool()
		   	    move.classList.add('tool-active');

		   	    var icon = document.createElement('i');
		   	    icon.setAttribute('class', 'fas fa-arrows-alt');
		   	    var currentTool = document.getElementById('current-tool');
		   	    currentTool.innerHTML = '';
		   	    currentTool.appendChild(icon);
		   	    $("#move-property").css("display", "block");

		   	});

			brush.addEventListener('click', () => {
		   	    ResetCurrentTool()
		   	    brush.classList.add('tool-active');

		   	    var icon = document.createElement('i');
		   	    icon.setAttribute('class', 'fas fa-paint-brush');
		   	    var currentTool = document.getElementById('current-tool');
		   	    currentTool.innerHTML = '';
		   	    currentTool.appendChild(icon);
		   	    $("#brush-property").css("display", "block");
		   	});

		   	type.addEventListener('click', () => {
		   	    ResetCurrentTool()
		   	    type.classList.add('tool-active');

		   	    var icon = document.createElement('i');
		   	    icon.setAttribute('class', 'fas fa-font');
		   	    var currentTool = document.getElementById('current-tool');
		   	    currentTool.innerHTML = '';
		   	    currentTool.appendChild(icon);
		   	    $("#type-property").css("display", "block")
		   	});

		   	eraser.addEventListener('click', () => {
		   	    ResetCurrentTool()
		   	    eraser.classList.add('tool-active');

		   	    var icon = document.createElement('i');
		   	    icon.setAttribute('class', 'fas fa-eraser');
		   	    var currentTool = document.getElementById('current-tool');
		   	    currentTool.innerHTML = '';
		   	    currentTool.appendChild(icon);
		   	    $("#eraser-property").css("display", "block")
		   	});

		   	square.addEventListener('click', () => {
		   	    ResetCurrentTool()
		   	    square.classList.add('tool-active');

		   	    var icon = document.createElement('i');
		   	    icon.setAttribute('class', 'fas fa-square');
		   	    var currentTool = document.getElementById('current-tool');
		   	    currentTool.innerHTML = '';
		   	    currentTool.appendChild(icon);
		   	    $("#square-property").css("display", "block")
		   	});

		   	circle.addEventListener('click', () => {
		   	    ResetCurrentTool()
		   	    circle.classList.add('tool-active');

		   	    var icon = document.createElement('i');
		   	    icon.setAttribute('class', 'fas fa-circle');
		   	    var currentTool = document.getElementById('current-tool');
		   	    currentTool.innerHTML = '';
		   	    currentTool.appendChild(icon);
		   	    $("#circle-property").css("display", "block")
		   	});
		   	triangle.addEventListener('click', () => {
		   	    ResetCurrentTool()
		   	    triangle.classList.add('tool-active');

		   	    var icon = document.createElement('i');
		   	    icon.setAttribute('class', 'fas fa-play');
		   	    var currentTool = document.getElementById('current-tool');
		   	    currentTool.innerHTML = '';
		   	    currentTool.appendChild(icon);
		   	    $("#triangle-property").css("display", "block")
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
		   		canvas.setHeight(900);
		   		canvas.setWidth(800);
		   		canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));
		   		$('#move-tool').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#brush').text('Activate');
	   		    	$('#eraser').text('Activate');
	   		    	$('#type').text('Activate');
	   		    	$('#type-input').val('');
	   		    	$('#square').text('Activate');
	   		    	$('#circle').text('Activate');
	   		    	$('#triangle').text('Activate');
		   		});
		   		$('#brush-tool').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#eraser').text('Activate');
	   		    	$('#type').text('Activate');
	   		    	$('#type-input').val('');
	   		    	$('#square').text('Activate');
	   		    	$('#circle').text('Activate');
	   		    	$('#triangle').text('Activate');
		   		});
		   		$('#eraser-tool').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#brush').text('Activate');
	   		    	$('#type').text('Activate');
	   		    	$('#type-input').val('');
	   		    	$('#square').text('Activate');
	   		    	$('#circle').text('Activate');
	   		    	$('#triangle').text('Activate');
		   		});
		   		$('#type-tool').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#brush').text('Activate');
	   		    	$('#eraser').text('Activate');
	   		    	$('#square').text('Activate');
	   		    	$('#circle').text('Activate');
	   		    	$('#triangle').text('Activate');
		   		});
		   		$('#square-tool').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#brush').text('Activate');
	   		    	$('#eraser').text('Activate');
	   		    	$('#type').text('Activate');
	   		    	$('#type-input').val('');
	   		    	$('#circle').text('Activate');
	   		    	$('#triangle').text('Activate');
		   		});
		   		$('#circle-tool').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#brush').text('Activate');
	   		    	$('#eraser').text('Activate');
	   		    	$('#type').text('Activate');
	   		    	$('#type-input').val('');
	   		    	$('#square').text('Activate');
	   		    	$('#triangle').text('Activate');
		   		});
		   		$('#triangle-tool').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#brush').text('Activate');
	   		    	$('#eraser').text('Activate');
	   		    	$('#type').text('Activate');
	   		    	$('#type-input').val('');
	   		    	$('#square').text('Activate');
	   		    	$('#circle').text('Activate');
		   		});
		   		$('#brush').on('click', function () {
   			   	  	if ($(this).text() === 'Activate') {
   				   	    $(this).text('Activated');
   				   	    canvas.isDrawingMode = true;
   				   	    if (canvas.isDrawingMode == true) {
   				   	    	if ($("#brush-width").val() > 0) {
   				   	    		canvas.freeDrawingBrush.width = parseInt($("#brush-width").val(), 10);

   				   	    	} else {
   				   	    		$("#brush-width").val('1');
   				   	    		canvas.freeDrawingBrush.width = parseInt($("#brush-width").val(), 10);

   				   	    	}
   				   	    	canvas.freeDrawingBrush.color = $("#brush-color").val();
   				   	    }
   			   	  	} else {
   				   		$(this).text('Activate');
   				   		canvas.isDrawingMode = false;
   			   	  	}
		   		});
		   		$('#brush-width').on('click', function () {
		   		    canvas.isDrawingMode = false;
	    	   	  	$('#brush').text('Activate');
		   		});
		   		$('#brush-color').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#brush').text('Activate');
		   		});
		   		canvas.on('selection:created', function () {
		   		    $('#eraser').on('click', function () {
		   		        canvas.isDrawingMode = false;
		   		        var activeObjects = canvas.getActiveObjects();
		   		        activeObjects.forEach(function (object) {
		   		            canvas.remove(object);
		   		        });
		   		    });
		   		});
		   		$('#type').on('click', function () {
		   			canvas.isDrawingMode = false;
		   			if ($(this).text() === 'Activate') {
   				   	    $(this).text('Activated');
   				   	    if ($("#type-input").val()) {

   				   	    } else {
   				   	    	$(this).text('Activate');
   				   	        alert('Notice: Text field is empty.');
   				   	    }
   			   	  	} else {
   				   		$(this).text('Activate');
   				   		$('#type-input').val('');
   			   	  	}
		   		});
		   		$('#square').on('click', function () {
		   			canvas.isDrawingMode = false;
		   			if ($(this).text() === 'Activate') {
   				   	    $(this).text('Activated');
   			   	  	} else {
   				   		$(this).text('Activate');
   			   	  	}
		   		});
		   		$('#square-fill').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#square').text('Activate');
		   		});
		   		$('#square-style').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#square').text('Activate');
		   		});
		   		$('#circle').on('click', function () {
		   			canvas.isDrawingMode = false;
		   			if ($(this).text() === 'Activate') {
   				   	    $(this).text('Activated');
   			   	  	} else {
   				   		$(this).text('Activate');
   			   	  	}
		   		});
		   		$('#circle-fill').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#circle').text('Activate');
		   		});
		   		$('#circle-style').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#circle').text('Activate');
		   		});
		   		$('#triangle').on('click', function () {
		   			canvas.isDrawingMode = false;
		   			if ($(this).text() === 'Activate') {
   				   	    $(this).text('Activated');
   			   	  	} else {
   				   		$(this).text('Activate');
   			   	  	}
		   		});
		   		$('#triangle-fill').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#triangle').text('Activate');
		   		});
		   		$('#triangle-style').on('click', function () {
		   		    canvas.isDrawingMode = false;
	   		    	$('#triangle').text('Activate');
		   		});
		   		let startX, startY;
		   		canvas.on('mouse:down', function (event) {
		   			if ($('#type').text() === 'Activated') {
   			   	  		if ($("#type-size").val() < 1) {
   			   	  			$("#type-size").val('1')
   			   	  		}
   				   		const pointer = canvas.getPointer(event.e);
   				   		const text = new fabric.IText($("#type-input").val(), {
   				   		    left: pointer.x,
   				   		    top: pointer.y,
   				   		    objecttype: 'text',
   				   		    fill: $("#type-fill").val(),
    						fontFamily: $("#type-font").val(),
    						textAlign: $("#type-align").val(),
    						fontWeight: $("#type-style").val(),
    						fontSize: $("#type-size").val(),
   				   		});
   				   		canvas.add(text);
   				   		$('#type-input').val('');
   				   		$('#type').text('Activate');
   				   		canvas.isDrawingMode = false;
   			   	  	} else if ($('#square').text() === 'Activated') {
   			   	  		const pointer = canvas.getPointer(event.e);
	   	  		        startX = pointer.x;
	   	  		        startY = pointer.y;
	   	  		        canvas.isDrawingMode = true;
   			   	  	} else if ($('#circle').text() === 'Activated') {
   			   	  		const pointer = canvas.getPointer(event.e);
	   	  		        startX = pointer.x;
	   	  		        startY = pointer.y;
	   	  		        canvas.isDrawingMode = true;
   			   	  	} else if ($('#triangle').text() === 'Activated') {
   			   	  		const pointer = canvas.getPointer(event.e);
	   	  		        startX = pointer.x;
	   	  		        startY = pointer.y;
	   	  		        canvas.isDrawingMode = true;
   			   	  	}
		   		});
		   		canvas.on('mouse:move', function (event) {
		   		    const pointer = canvas.getPointer(event.e);
		   		    $('#current-x').val(pointer.x);
		   		    $('#current-y').val(pointer.y);
		   		});
		   		canvas.on('mouse:up', function (event) {
		   			if ($('#square').text() === 'Activated') {
		   				const pointer = canvas.getPointer(event.e);
		   				const width = pointer.x - startX;
		   				const height = pointer.y - startY;
		   				const style = $("#square-style").val();
		   				if (style === 'transparent') {
		   					const Rectangle_Shape = new fabric.Rect({
		   					    left: startX,
		   					    top: startY,
		   					    width: width,
		   					    height: height,
		   					    fill: 'transparent',
		   					    stroke: $("#square-fill").val(),
		   					});
		   					canvas.add(Rectangle_Shape);
		   				} else {
		   					const Rectangle_Shape = new fabric.Rect({
		   					    left: startX,
		   					    top: startY,
		   					    width: width,
		   					    height: height,
		   					    fill: $("#square-fill").val(),
		   					});
		   					canvas.add(Rectangle_Shape);
		   				}
		   				canvas.isDrawingMode = false;
		   				$('#square').text('Activate');
		   			} else if ($('#circle').text() === 'Activated') {
		   				const pointer = canvas.getPointer(event.e);
		   				let width = pointer.x - startX;
		   				let height = pointer.y - startY;
		   				if (pointer.x < startX || pointer.y < startY) {
		   					width = Math.abs(width);
		   					height = Math.abs(height);
		   					startX = pointer.x;
		   					startY = pointer.y;
		   				}
		   				const radius = ((width * width) / (8 * height) + (height / 2));
		   				const style = $("#circle-style").val();
		   				if (style === 'transparent') {
		   					const Circle_Shape = new fabric.Circle({
		   					    left: startX,
		   					    top: startY,
		   					    radius: radius,
		   					    fill: 'transparent',
		   					    stroke: $("#circle-fill").val(),
		   					});
		   					canvas.add(Circle_Shape);
		   				} else {
		   					const Circle_Shape = new fabric.Circle({
		   					    left: startX,
		   					    top: startY,
		   					    radius: radius,
		   					    fill: $("#circle-fill").val(),
		   					});
		   					canvas.add(Circle_Shape);
		   				}
		   				canvas.isDrawingMode = false;
		   				$('#circle').text('Activate');
		   			} else if ($('#triangle').text() === 'Activated') {
		   				const pointer = canvas.getPointer(event.e);
		   				const width = pointer.x - startX;
		   				const height = pointer.y - startY;
		   				const style = $("#triangle-style").val();
		   				if (style === 'transparent') {
		   					const Triangle_Shape = new fabric.Triangle({
		   					    left: startX,
		   					    top: startY,
		   					    width: width,
		   					    height: height,
		   					    fill: 'transparent',
		   					    stroke: $("#triangle-fill").val(),
		   					});
		   					canvas.add(Triangle_Shape);
		   				} else {
		   					const Triangle_Shape = new fabric.Triangle({
		   					    left: startX,
		   					    top: startY,
		   					    width: width,
		   					    height: height,
		   					    fill: $("#triangle-fill").val(),
		   					});
		   					canvas.add(Triangle_Shape);
		   				}
		   				canvas.isDrawingMode = false;
		   				$('#triangle').text('Activate');
		   			}
		   		});
		   		$('#image').on('change', function (e) {
		   		  	canvas.isDrawingMode = false;
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
	    		            const imageDataWithoutPrefix = imageUrl.split(',')[1];
	    		            $.ajax({
	    		                url: "./php/upload_temp.php",
	    		                method: "POST",
	    		                data: {
	    		                    imageFile: imageDataWithoutPrefix
	    		                },
	    		                success: function (data) {
	    		                	$("#image-options").css("display", "none");
	    		                	const images = window.localStorage.getItem('images');
	    		                	if (images) {
	    		                		window.localStorage.setItem('images', images + ',' + data);
	    		                	} else {
	    		                		window.localStorage.setItem('images', data);
	    		                	}
	    		                },
	    		                error: function (xhr, status, error) {
	    		                    console.error("AJAX Request Error:", status, error);
	    		                },
	    		            });
			   		    };
		   		    reader.readAsDataURL(file);
		   		  	}
		   		});
		   		function hideOptions() {
		   			$("#image-options").css("display", "none");
		   		    $("#background-options").css("display", "none");
		   		    $("#necklace-options").css("display", "none");
		   		    $("#logo-options").css("display", "none");
		   		}
		   		$('#remove-necklace').on('click', function () {
		   		    canvas.setBackgroundImage(null, canvas.renderAll.bind(canvas));
		   		    hideOptions();
		   		});
		   		$('#gold-necklace').on('click', function () {
		   		    canvas.setBackgroundImage('images/gold-necklace.png', canvas.renderAll.bind(canvas));
		   		    hideOptions();
		   		});
		   		$('#silver-necklace').on('click', function () {
		   		    canvas.setBackgroundImage('images/silver-necklace.png', canvas.renderAll.bind(canvas));
		   		    hideOptions();
		   		});
		   		$('#bronze-necklace').on('click', function () {
		   		    canvas.setBackgroundImage('images/bronze-necklace.png', canvas.renderAll.bind(canvas));
		   		    hideOptions();
		   		});
		   		$('#gold-cross').on('click', function () {
		            const baseUrl = window.location.origin;
		            const absoluteUrl = baseUrl + '/images/gold-cross.png';
		            console.log(absoluteUrl);
		            fabric.Image.fromURL(absoluteUrl, (img) => {
                        img.set({
                        	scaleY: 0.5,
                            scaleX: 0.5,
                            left: 200,
                            top: 220,
                        });
                        canvas.add(img);
                    },{crossOrigin: 'anonymous'});
                    canvas.renderAll(canvas);
		   		    hideOptions();
		   		});
		   		$('#silver-cross').on('click', function () {
		   		    const baseUrl = window.location.origin;
		            const absoluteUrl = baseUrl + '/images/silver-cross.png';
		            console.log(absoluteUrl);
		            fabric.Image.fromURL(absoluteUrl, (img) => {
                        img.set({
                        	scaleY: 0.5,
                            scaleX: 0.5,
                            left: 200,
                            top: 220,
                        });
                        canvas.add(img);
                    },{crossOrigin: 'anonymous'});
                    canvas.renderAll(canvas);
		   		    hideOptions();
		   		});
		   		$('#bronze-cross').on('click', function () {
		   		    const baseUrl = window.location.origin;
		            const absoluteUrl = baseUrl + '/images/bronze-cross.png';
		            console.log(absoluteUrl);
		            fabric.Image.fromURL(absoluteUrl, (img) => {
                        img.set({
                        	scaleY: 0.5,
                            scaleX: 0.5,
                            left: 200,
                            top: 220,
                        });
                        canvas.add(img);
                    },{crossOrigin: 'anonymous'});
                    canvas.renderAll(canvas);
		   		    hideOptions();
		   		});
		   		$('#remove-logo').on('click', function () {
		   		    canvas.setBackgroundImage(null, canvas.renderAll.bind(canvas));
		   		    hideOptions();
		   		});
		   		$('#gold-logo').on('click', function () {
		   		    canvas.setBackgroundImage('images/gold-logo.png', canvas.renderAll.bind(canvas));
		   		    hideOptions();
		   		});
		   		$('#silver-logo').on('click', function () {
		   		    canvas.setBackgroundImage('images/silver-logo.png', canvas.renderAll.bind(canvas));
		   		    hideOptions();
		   		});
		   		$('#bronze-logo').on('click', function () {
		   		    canvas.setBackgroundImage('images/bronze-logo.png', canvas.renderAll.bind(canvas));
		   		    hideOptions();
		   		});
		   		function serializeCanvasObjects(canvas) {
		   		    const objects = canvas.getObjects();
		   		    const serializedObjects = [];
		   		    const backgroundImage = canvas.backgroundImage;
		   		    const imageUrlsString = window.localStorage.getItem('images');
		   		    const imageUrls = imageUrlsString ? imageUrlsString.split(',') : [];

		   		    for (let i = 0; i < objects.length; i++) {
		   		        const obj = objects[i];
		   		        const serializedObj = {
		   		            objectType: obj.type,
		   		            properties: obj.toObject(),
		   		        };

		   		        if (obj.type === 'image') {
		   		            if (i < imageUrls.length) {
		   		                serializedObj.properties.src = imageUrls[i];
		   		            } else {
		   		                serializedObj.properties.src = '';
		   		            }
		   		        }

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
    	   		            canvas.isDrawingMode = false;
    	   		            localStorage.removeItem('images');
    	   		            localStorage.removeItem('email');
    	   		            localStorage.removeItem('deyt');
    	   		            localStorage.removeItem('product');
   		                    window.location.href = "customize.php";
   		                },
   		                error: function (xhr, status, error) {
   		                    console.error("AJAX Request Error:", status, error);
   		                },
   		            });
   		        }
   		        function getSelectedTemplate() {
   		        	var currentURL = window.location.href;
   		        	var email = "";
   		        	var deyt = "";
   		        	var product = "";
   		        	if (currentURL === "http://20.205.112.210/make_customize_v2.php" || currentURL === "http://localhost/capstone/make_customize_v2.php") {
   		        	    email = window.localStorage.getItem('email');
   		        	    deyt = window.localStorage.getItem('deyt');
   		        	    product = window.localStorage.getItem('product');
   		        	} else {
   		        	    email = new URLSearchParams(currentURL).get('email');
   		        	    deyt = new URLSearchParams(currentURL).get('deyt');
   		        	}
   		        	var view = $('#current-view').val();
   		            $.ajax({
   		                url: './php/get_template.php',
   		                type: 'GET',
   		                contentType: 'application/json',
   		                data: {
   		                    email: email,
   		                    deyt: deyt,
   		                    view: view
   		                },
   		                success: function (data) {
   		                	if (data === "1") {

   		                	} else {
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
	   		                        } else if (object.objectType === 'image') {
							            const properties = JSON.parse(object.properties);
							            let imageUrl = properties.src;
							            imageUrl = imageUrl.replace(/^([^.]*)\.(.*)\./, "$1$2.");
							            const baseUrl = window.location.origin;
							            const absoluteUrl = baseUrl + '/' + imageUrl;
							            fabric.Image.fromURL(absoluteUrl, (img) => {
					                        img.set(properties);
					                        canvas.add(img);
					                    },{crossOrigin: 'anonymous'});
					                    canvas.renderAll(canvas);
							        } else if (object.objectType === 'background') {
							        	const properties = JSON.parse(object.properties);
							            canvas.setBackgroundImage(properties.src, canvas.renderAll.bind(canvas));
							        }
	   		                    });
	   		                }
	   		            },
   		                error: function (xhr, status, error) {
   		                    console.error("Error retrieving data:", status, error);
   		                    console.log(xhr.responseText);
   		                }
   		            });
   		            if (product === "necklace") {
   		            	canvas.setBackgroundImage("images/gold-necklace.png", canvas.renderAll.bind(canvas));
   		            } else if (product === "pin") {

   		            } else if (product === "nameplate") {

   		            } else if (product === "logo") {
   		            	canvas.setBackgroundImage("images/gold-logo.png", canvas.renderAll.bind(canvas));
   		            } else {
   		            	canvas.setBackgroundImage(null, canvas.renderAll.bind(canvas));
   		            }
   		        }
   		        getSelectedTemplate();
   		        function updateTemplate() {
   		            const serializedObjects = serializeCanvasObjects(canvas);
   		            if (serializedObjects.length === 0) {
	                    return;
	                }
   		            var email = window.localStorage.getItem('email');
   		            var deyt = window.localStorage.getItem('deyt');
   		            var view = $('#current-view').val();
   		            $.ajax({
   		                url: './php/update_template.php',
   		                type: 'POST',
   		                contentType: 'application/json',
   		                data: JSON.stringify({
   		                	canvasObjects: serializedObjects,
   		                	email: email,
   		                	deyt: deyt,
   		                	view: view
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
   		        function orderTemplate() {
   		        	const serializedObjects = serializeCanvasObjects(canvas);
   		            if (serializedObjects.length === 0) {
	                    return;
	                }
   		            var email = window.localStorage.getItem('email');
   		            var deyt = window.localStorage.getItem('deyt');
   		            var view = $('#current-view').val();
   		            $.ajax({
   		                url: './php/update_template.php',
   		                type: 'POST',
   		                contentType: 'application/json',
   		                data: JSON.stringify({
   		                	canvasObjects: serializedObjects,
   		                	email: email,
   		                	deyt: deyt,
   		                	view: view
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
	    	 	   		            canvas.isDrawingMode = false;
	    	 	   		            localStorage.removeItem('images');
	    	 	   		            localStorage.removeItem('email');
	    	 	   		            localStorage.removeItem('deyt');
	    	 	   		            localStorage.removeItem('product');
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
   		        }
   		        $('#order').on('click', function () {
   		            orderTemplate();
   		        });
   		        $('#back').on('click', function () {
   		            canvas.isDrawingMode = false;
   		            localStorage.removeItem('images');
   		            localStorage.removeItem('email');
   		            localStorage.removeItem('deyt');
   		            localStorage.removeItem('product');
   		            window.location.href = "customize.php";
   		        });
   		        $('#view').on('click', function () {
   		            canvas.isDrawingMode = false;
   		            if ($('#current-view').val() === "Front") {
   		            	$('#current-view').val('Back');
   		            	document.getElementById('current-view').style.width = 50 + 'px';
   		            	canvas.clear();
   		            	canvas.setHeight(900);
   		            	canvas.setWidth(800);
   		            	canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));
   		            	getSelectedTemplate();
   		            } else {
   		            	$('#current-view').val('Front');
   		            	document.getElementById('current-view').style.width = 60 + 'px';
   		            	canvas.clear();
   		            	canvas.setHeight(900);
   		            	canvas.setWidth(800);
   		            	canvas.setBackgroundColor('white', canvas.renderAll.bind(canvas));
   		            	getSelectedTemplate();
   		            }
   		        });
		   	}
		</script>
	</body>
</html>
<?php 
}else{
	echo"<script>var xlink = window.location.href;</script>";
	echo"<script>window.localStorage.setItem('xlink', xlink);</script>";
    echo"<script>alert('Notice: Please login to proceed.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>