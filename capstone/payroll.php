<?php 
session_start();
if ($_SESSION['role'] === "Admin") {
?>
<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	  	<?php include('./include/admin_style.php') ?>
		<style>
			aside .sidebar a.pay-act{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.pay-act::before{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.pay-act span{
				color: var(--color-primary);
				margin-left: calc(1rem - 3px);
			}
			.border {
				border: 1px solid;
			}
			.record {
				width: 100%;
				border: 1px solid;
				padding: 5px 0;
				margin-bottom: 5px;
				display: flex;
				flex-direction: row;
				text-align: center;
				background-color: inherit;
				color: inherit;
			}
			.record:hover {
				background-color: #fff;
				color: #000;
			}
			.record-1 {
				width: 33.33%;
				text-align: left;
				padding-left: 20px;
			}
			.record-2 {
				width: 22.22%;
				text-align: center;
			}
			.record-3 {
				width: 22.22%;
				text-align: center;
			}
			.record-4 {
				width: 22.22%;
				text-align: left;
				padding-left: 20px;
			}
			.input-container {
				width: 100%;
				display: flex;
				flex-direction: row;
				align-items: center;
				margin-bottom: 5px;
				justify-content: right;
			}
			.input {
				border: 1px solid;
				margin: 5px 0;
				width: 75%;
				padding: 5px 5px 5px 10px;
				border-radius: 5px;
			}
			.input-button {
				padding: 8px 0;
				width: 100%;
				border: 1px solid;
				border-radius: 25px;
				font-weight: bold;
				border: 1px solid;
			    background-color: #BB8A5B;
			}

			.input-button:hover {
				background-color: #794B29;
			    color: #fff;
			}
			.responsive-button{
				display: flex;
				flex-wrap: wrap;
			}
			.responsive-button > form{
				margin-bottom: 5px;
			}
			@media (max-width: 768px) {
			    .responsive-button > form{
			    	flex: 50%;
			    }
			    .responsive-button > div{
			    	margin-right: 30px;
			    }
			}
			@media (max-width: 425px) {
			    .responsive-button > form{
			    	flex: 100%;
			    }
			    .responsive-button > div{
			    	margin-right: 0;
			    }
			}
		</style>
	</head>
	<body>
		<div class="container">
        	<?php include('./include/admin_header.php') ?>
        	<main>
	            <h1>Payroll Management</h1>
	            <div class="new-users">
	                <div class="user-list" style="gap: 5px;">
	                	<div style="width: 100%; display: flex; flex-direction: row; text-align: center;">
	                		<div style="width: 33.33%;">Name</div>
	                		<div style="width: 22.22%;">Position</div>
	                		<div style="width: 22.22%;">Date of Employment</div>
	                		<div style="width: 22.22%;">Salary</div>
	                	</div>
                        <div class="border" style="width: 100%;"></div>
                        <div id="payroll-container" style="width: 100%;">
		                    <div style="width: 100%; text-align: center; margin-top: 10px;">
	    						<small>There are currently no records.</small>
	    					</div>
			            </div>
	                </div>
	            </div>
        	</main>
	        <div class="right-section">
	            <div class="nav">
	                <button id="menu-btn">
	                    <span class="material-icons-sharp">
	                        menu
	                    </span>
	                </button>
	                <div class="dark-mode">
	                    <span class="material-icons-sharp active">
	                        light_mode
	                    </span>
	                    <span class="material-icons-sharp">
	                        dark_mode
	                    </span>
	                </div>
            	</div>
	            <div class="reminders">
	                <div class="header">
	                    <h2>Details</h2>
	                </div>
	                <div class="notification">
	                    <div class="content">
	                        <div class="info" style="width: 100%;">
	                        	<div class="responsive-button">
		                        	<input type="hidden" name="id" id="id">
		                        	<div class="input-container">
		                        		<div style="margin-right: 5px;">Name:</div>
		                        		<input type="text" class="input" id="name" name="name">
		                        	</div>
		                        	<div class="input-container">
		                        		<div style="margin-right: 5px;">Position:</div>
		                        		<input type="text" class="input" id="position" name="position">
		                        	</div>
		                        	<div class="input-container">
		                        		<div style="margin-right: 5px;">Date of Employment:</div>
		                        		<input type="text" class="input" id="deyt" name="deyt">
		                        	</div>
		                        	<div class="input-container">
		                        		<div style="margin-right: 5px;">Salary:</div>
		                        		<input type="text" class="input" id="salary" name="salary">
		                        	</div>
		                        </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="header">
	                    <h2>Options</h2>
	                </div>
	                <div class="notification">
	                    <div class="content">
	                        <div class="info" style="width: 100%;">
	                        	<div class="responsive-button">
		                        	<form id="create" action="" class="input-container">
	                        			<button type="submit" class="input-button">Create</button>
	                        		</form>
	                        		<form id="update" action="" class="input-container">
	                        			<button type="submit" class="input-button">Update</button>
	                        		</form>
	                        		<form id="delete" action="" class="input-container">
	                        			<button type="submit" class="input-button">Delete</button>
	                        		</form>
	                        		<form id="clear" action="" class="input-container">
	                        			<button type="submit" class="input-button">Clear</button>
	                        		</form>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
        	</div>
    	</div>
    </body>
    <script src="./js/admin.js"></script>
    <script>
    	function showInventory() {
		    $.ajax({
		        url: "./php/get_payroll.php",
		        method: "GET",
		        success: function (data) {
		            // Handle the AJAX response here
		            $("#payroll-container").html(data);
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
		}
		showInventory()
		setInterval(showInventory, 1000);
    </script>
    <script>
    	$(document).ready(function () {
    	  	$(document).on("submit", ".dynamic-form", function (event) {
    	    	event.preventDefault();
    	    	var id = $(this).find("input[name='id']").val();
    	    	var name = $(this).find("input[name='name']").val();
    	    	var position = $(this).find("input[name='position']").val();
    	    	var deyt = $(this).find("input[name='deyt']").val();
    	    	var salary = $(this).find("input[name='salary']").val();
    	    	$("#id").val(id);
    	    	$("#name").val(name);
    	    	$("#position").val(position);
    	    	$("#deyt").val(deyt);
    	    	$("#salary").val(salary);
    	  	});
    	});
    </script>
    <script>
    	$("#clear").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally

	        $("#id").val('');
	        $("#name").val('');
	        $("#position").val('');
	        $("#deyt").val('');
	        $("#salary").val('');
	    });
	    $("#create").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally

	        var name = $("#name").val();
	        var position = $("#position").val();
	        var deyt = $("#deyt").val();
	        var salary = $("#salary").val();

	        $.ajax({
	            url: "./php/add_payroll.php", // PHP script to insert comments into the database
	            method: "POST",
	            data: {
	            	name: name,
	            	position: position,
	            	deyt: deyt,
	            	salary: salary
	            },
	            success: function (data) {
	                showInventory()
	            },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
	        });

	        $("#id").val('');
	        $("#name").val('');
	        $("#position").val('');
	        $("#deyt").val('');
	        $("#salary").val('');

	    });
	    $("#update").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally

	        var id = $("#id").val();
	        var name = $("#name").val();
	        var position = $("#position").val();
	        var deyt = $("#deyt").val();
	        var salary = $("#salary").val();

	        $.ajax({
	            url: "./php/update_payroll.php", // PHP script to insert comments into the database
	            method: "POST",
	            data: {
	            	id: id,
	            	name: name,
	            	position: position,
	            	deyt: deyt,
	            	salary: salary
	            },
	            success: function (data) {
	                showInventory()
	            },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
	        });

	        $("#id").val('');
	        $("#name").val('');
	        $("#position").val('');
	        $("#deyt").val('');
	        $("#salary").val('');

	    });
	    $("#delete").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally

	        var id = $("#id").val();
	        var name = $("#name").val();
	        var position = $("#position").val();
	        var deyt = $("#deyt").val();
	        var salary = $("#salary").val();

	        $.ajax({
	            url: "./php/delete_payroll.php", // PHP script to insert comments into the database
	            method: "POST",
	            data: {
	            	id: id,
	            	name: name,
	            	position: position,
	            	deyt: deyt,
	            	salary: salary
	            },
	            success: function (data) {
	                showInventory()
	            },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
	        });

	        $("#id").val('');
	        $("#name").val('');
	        $("#position").val('');
	        $("#deyt").val('');
	        $("#salary").val('');

	    });
    </script>
</html>
<?php 
}else{
    echo"<script>alert('Notice: Please login to an administrative account.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>