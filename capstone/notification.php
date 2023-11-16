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
			aside .sidebar a.notif-act{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.notif-act::before{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.notif-act span{
				color: var(--color-primary);
				margin-left: calc(1rem - 3px);
			}
		</style>
	</head>
	<body>
		<div class="container">
        	<?php include('./include/admin_header.php') ?>

        	<main>
        		<section>
        			<h1>Notification</h1>
        			<div style="border: 1px solid;"></div>
        		</section>
	            <div class="new-users">
	                <div class="user-list">
	                    <div id="notification-container" style="width: 100%;">
		                    <div style="width: 100%; text-align: center; margin-top: 10px;">
	    						<small>There are currently no notification available.</small>
	    					</div>
			            </div>
	                </div>
	            </div>
        	</main>

	        <!-- Right Section -->
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
            	<!-- End of Nav -->

	            <div class="reminders">
	                <div class="header">
	                    <h2>Options</h2>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="default">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Default</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="account">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Account</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="login">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Login</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="order">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Order</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="log">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Admin Logs</h3>
	                    </button>
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
    		        url: "./php/get_notifications.php",
    		        method: "GET",
    		        data: { action: action },
    		        success: function (data) {
    		            // Handle the AJAX response here
    		            $("#notification-container").html(data);
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