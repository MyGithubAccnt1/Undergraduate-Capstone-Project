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
			/**{
				outline: 2px solid limegreen;
			}*/
			aside .sidebar a.prod-act{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.prod-act::before{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.prod-act span{
				color: var(--color-primary);
				margin-left: calc(1rem - 3px);
			}
			.border {
				border: 1px solid;
			}
			.input-container {
				width: 100%;
				display: flex;
				flex-direction: row;
				align-items: center;
				margin-bottom: 5px;
				justify-content: left;
			}
			.input {
				border: 1px solid;
				margin: 5px 0;
				width: 75%;
				padding: 5px 5px 5px 10px;
				border-radius: 5px;
			}
			.responsive-button{
				display: flex;
				justify-content: space-around;
				width: 100%;
				padding: 10px 0;
				margin-top: 5px;
			}
			.responsive-button > div{
				width: 30%;
				padding: 0 5px;
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
		</style>
	</head>
	<body>
		<div class="container">
        	<?php include('./include/admin_header.php') ?>

        	<main style="overflow-x: hidden;">
	            <h1>Products</h1>
	            <div class="new-users">
	                <div class="user-list" style="gap: 5px;">
	                	<div style="width: 100%; display: flex; flex-direction: row; text-align: center;">
	                		<div style="width: 24.99%;">Title</div>
	                		<div style="width: 16.66%;">Price</div>
	                		<div style="width: 16.66%;">Image</div>
	                		<div style="width: 24.99%;">Desc.</div>
	                		<div style="width: 16.66%;">More</div>
	                	</div>
	                    <div class="border" style="width: 100%;"></div>
	                    <div id="products-container" style="width: 100%;">
		                    <div style="width: 100%; text-align: center; margin-top: 10px;">
	    						<small>There are currently no orders.</small>
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
	                    <h2>Options</h2>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="default">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Default</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="necklace">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Necklace</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="pin">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Pin</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="table">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Table Nameplate</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="logo">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Logo Seal</h3>
	                    </button>
	                </div>

                    <div class="header">
                        <h2>Details</h2>
                    </div>
                    <div class="notification">
                        <div class="content">
                            <div class="info" style="width: 100%;">
	                        	<div class="input-container">
	                        		<div style="margin-right: 5px;">Title:</div>
	                        		<input type="text" class="input" id="title">
	                        	</div>
	                        	<div class="input-container">
	                        		<div style="margin-right: 5px;">Price:</div>
	                        		<input type="text" class="input" id="price">
	                        	</div>
	                        	<div class="input-container">
	                        		<div style="margin-right: 5px;">Description:</div>
	                        		<textarea type="text" class="input" rows="5" style="resize: none;" id="description"></textarea>
	                        	</div>
	                        	<div class="input-container">
	                        	    <div style="margin-right: 5px;">Category:</div>
	                        	    <select class="input" id="category">
	                        	        <option value="Necklace">Necklace</option>
	                        	        <option value="Pin">Pin</option>
	                        	        <option value="Table">Table</option>
	                        	        <option value="Logo">Logo</option>
	                        	    </select>
	                        	</div>
	                        	<form style="margin-bottom: 5px;" id="create" action="">
	                        		<button type="submit" class="input-button">Create</button>
	                        	</form>
	                        	<form style="margin-bottom: 5px;" id="clear" action="">
	                        		<button type="submit" class="input-button">Clear</button>
	                        	</form>
                            </div>
                        </div>
                    </div>
	            </div>
        	</div>
    	</div>
    </body>
    <script src="./js/admin.js"></script>
    <script>
    	$(document).ready(function () {
    	    // Add a click event listener to the div elements with class "notification add-reminder"
    	    $(".notification.add-reminder").on("click", function () {
    	        // Get the data-action attribute value to determine the action
    	        var action = $(this).data("action");

    	        showDefault(action)
    	    });

        	function showDefault(action) {
    		    // Make an AJAX request
    		    $.ajax({
    		        url: "./php/get_adminproducts.php",
    		        method: "GET",
    		        data: { action: action },
    		        success: function (data) {
    		            // Handle the AJAX response here
    		            $("#products-container").html(data);
    		        },
    		        error: function (xhr, status, error) {
    		            console.error("AJAX Request Error:", status, error);
    		        }
    		    });
    		}

    		showDefault();
    	});
    </script>
    <script>
    	$(document).ready(function () {
    	  $(document).on("submit", ".dynamic-form", function (event) {
    	    event.preventDefault();
    	    var idValue = $(this).find("input[name='id']").val();
    	    var optionToggle = $("#optionToggle" + idValue);

    	    // Check the current state of the element
    	    if (optionToggle.css("display") === "none") {
    	      optionToggle.css("display", "block"); // If hidden, make it visible
    	    } else {
    	      optionToggle.css("display", "none"); // If visible, hide it
    	    }
    	  });
    	});
    </script>
    <script>
	    $(document).on("click", ".status-form", function () {
	        var action = $(this).data("action");

	        if (action === "update") {
	            var id = $(this).find("input[name='id']").val();
        	    var title = $("#title" + id).val();
        	    var price = $("#price" + id).val();
        	    var thumbnail = $("#thumbnail" + id).val();
        	    var description = $("#description" + id).val();
        	    $.ajax({
		            url: "./php/update_product.php", // PHP script to insert comments into the database
		            method: "POST",
		            data: {
		            	id: id,
		            	title: title,
		            	price: price,
		            	thumbnail: thumbnail,
		            	description: description
		            },
		            success: function (data) {
		            	if (data === "1") {
		            		alert('Notice: ' + data + '.');
	                	} else if (data === "2") {
	                		alert('Notice: An item has been updated successfully.');
	                		window.location.href = "product.php";
	                	} else {
	                		alert('Notice: There is an unexpected error while updating the product, please try again.');
	                	}
		            },
			        error: function (xhr, status, error) {
			            console.error("AJAX Request Error:", status, error);
			        }
		        });
	        }else{

	        	if (confirm("Are you sure you want to delete this product?") === true) {

		            var id = $(this).find("input[name='id']").val();
	        	    var title = $("#title" + id).val();
	        	    var price = $("#price" + id).val();
	        	    var thumbnail = $("#thumbnail" + id).val();
	        	    var description = $("#description" + id).val();

		            $.ajax({
		                url: "./php/delete_product.php", // PHP script to insert comments into the database
		                method: "POST",
		                data: {
			            	id: id,
			            	title: title,
			            	price: price,
			            	thumbnail: thumbnail,
			            	description: description
			            },
		                success: function (data) {
		                	if (data === "1") {
		                		window.location.href = "product.php";
		                	} else {
		                		alert('Notice: ' + data + '.');
		                	}
		                },
		    	        error: function (xhr, status, error) {
		    	            console.error("AJAX Request Error:", status, error);
		    	        }
		            });

	        	}
	        }
	    });
    </script>
    <script>
    	$("#clear").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally
	        $("#title").val('');
	        $("#price").val('');
	        $("#description").val('');
	        $("#category").val('Necklace');
	    });
	    $("#create").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally
	        var title = $("#title").val();
	        var price = $("#price").val();
	        var description = $("#description").val();
	        var category = $("#category").val();

	        $.ajax({
	            url: "./php/add_product.php", // PHP script to insert comments into the database
	            method: "POST",
	            data: {
	            	title: title,
	            	price: price,
	            	description: description,
	            	category: category
	            },
	            success: function (data) {
	                window.location.href = "product.php";
	            },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
	        });

	        $("#title").val('');
	        $("#price").val('');
	        $("#description").val('');
	        $("#category").val('Necklace');

	    });
    </script>
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