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
			aside .sidebar a.dash-act{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.dash-act::before{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.dash-act span{
				color: var(--color-primary);
				margin-left: calc(1rem - 3px);
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
			    	margin-right: 80px;
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

        	<!-- Main Content -->
        	<main>
	            <h1>Dashboard</h1>
	            <!-- Analyses -->
	            <div class="analyse">
	                <div class="sales">
	                    <div class="status">
	                        <div class="info">
	                            <h3>Accounts</h3>
	                            <h1 id="account"></h1>
	                        </div>
	                        <div class="progresss">
	                            <svg>
	                                <circle cx="40" cy="38" r="36"></circle>
	                            </svg>
	                            <div class="percentage">
	                                <p id="account-percent"></p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="visits">
	                    <div class="status">
	                        <div class="info">
	                            <h3>Online</h3>
	                            <h1 id="online"></h1>
	                        </div>
	                        <div class="progresss">
	                            <svg>
	                                <circle cx="40" cy="38" r="36"></circle>
	                            </svg>
	                            <div class="percentage">
	                                <p id="online-percent"></p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="searches">
	                    <div class="status">
	                        <div class="info">
	                            <h3>Orders</h3>
	                            <h1 id="order"></h1>
	                        </div>
	                        <div class="progresss">
	                            <svg>
	                                <circle cx="40" cy="38" r="36"></circle>
	                            </svg>
	                            <div class="percentage">
	                                <p id="order-percent"></p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- End of Analyses -->
	            <!-- Analyses -->
	            <div class="analyse">
	                <div class="sales">
	                    <div class="status">
	                        <div class="info">
	                            <h3>Estimate</h3>
	                            <h1 id="estimate">₱</h1>
	                        </div>
	                        <div class="progresss">
	                            <svg>
	                                <circle cx="40" cy="38" r="36"></circle>
	                            </svg>
	                            <div class="percentage">
	                                <p id="estimate-percent">₱</p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="visits">
	                    <div class="status">
	                        <div class="info">
	                            <h3>Income</h3>
	                            <h1 id="income"></h1>
	                        </div>
	                        <div class="progresss">
	                            <svg>
	                                <circle cx="40" cy="38" r="36"></circle>
	                            </svg>
	                            <div class="percentage">
	                                <p id="income-percent"></p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- End of Analyses -->
        	</main>
        	<!-- End of Main Content -->

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
	            <div class="reminders">
	                <div class="header">
	                    <h2>Database Options</h2>
	                </div>
	                <div class="notification">
	                    <div class="content">
	                        <div class="info" style="width: 100%;">
	                        	<div class="responsive-button">
		                        	<form id="comment" action="" style="width: 100%;">
	                        			<button type="submit" class="input-button">Reset Comments</button>
	                        		</form>
	                        		<form id="cart" action="" style="width: 100%;">
	                        			<button type="submit" class="input-button">Reset Carts</button>
	                        		</form>
	                        		<form id="reset_order" action="" style="width: 100%;">
	                        			<button type="submit" class="input-button">Reset Orders</button>
	                        		</form>
	                        		<form id="message" action="" style="width: 100%;">
	                        			<button type="submit" class="input-button">Reset Messages</button>
	                        		</form>
	                        		<form id="template" action="" style="width: 100%;">
	                        			<button type="submit" class="input-button">Reset Saved Templates</button>
	                        		</form>
	                        		<form id="notification" action="" style="width: 100%;">
	                        			<button type="submit" class="input-button">Reset Notifications</button>
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
    	function showAccount() {
		    $.ajax({
		        url: "./php/get_total_rows.php",
		        method: "GET",
		        success: function (data) {
		            // Handle the AJAX response here
		            $("#account").html(data);
		            $("#account-percent").html("+" + data + "%");
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
		}
		showAccount()
		setInterval(showAccount, 1000);

		function showOnline() {
		    $.ajax({
		        url: "./php/get_total_online.php",
		        method: "GET",
		        success: function (data) {
		            // Handle the AJAX response here
		            $("#online").html(data);
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
		}
		showOnline()
		setInterval(showOnline, 1000);

		function showOnlinePercent() {
		    $.ajax({
		        url: "./php/get_total_online_percent.php",
		        method: "GET",
		        success: function (data) {
		            // Handle the AJAX response here=
		            $("#online-percent").html("+" + data + "%");
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
		}
		showOnlinePercent()
		setInterval(showOnlinePercent, 1000);

		function showOrder() {
		    $.ajax({
		        url: "./php/get_total_history.php",
		        method: "GET",
		        success: function (data) {
		            // Handle the AJAX response here
		            $("#order").html(data);
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
		}
		showOrder()
		setInterval(showOrder, 1000);

		function showOrderPercent() {
		    $.ajax({
		        url: "./php/get_total_history_percent.php",
		        method: "GET",
		        success: function (data) {
		            // Handle the AJAX response here
		            $("#order-percent").html("+" + data + "%");
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
		}
		showOrderPercent()
		setInterval(showOrderPercent, 1000);

		function showEstimate() {
		    $.ajax({
		        url: "./php/get_total_estimate.php",
		        method: "GET",
		        success: function (data) {
		            // Handle the AJAX response here
		            $("#estimate").html("PHP" + data);
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
		}
		showEstimate()
		setInterval(showEstimate, 1000);

		function showEstimatePercent() {
		    $.ajax({
		        url: "./php/get_total_estimate_percent.php",
		        method: "GET",
		        success: function (data) {
		            // Handle the AJAX response here
		            $("#estimate-percent").html("+" + data + "%");
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
		}
		showEstimatePercent()
		setInterval(showEstimatePercent, 1000);

		function showIncome() {
		    $.ajax({
		        url: "./php/get_total_income.php",
		        method: "GET",
		        success: function (data) {
		            // Handle the AJAX response here
		            $("#income").html("PHP" + data);
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
		}
		showIncome()
		setInterval(showIncome, 1000);

		function showIncomePercent() {
		    $.ajax({
		        url: "./php/get_total_income_percent.php",
		        method: "GET",
		        success: function (data) {
		            // Handle the AJAX response here
		            $("#income-percent").html("+" + data + "%");
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
		}
		showIncomePercent()
		setInterval(showIncomePercent, 1000);
    </script>
    <script type="text/javascript">
    	$("#comment").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally

	        $.ajax({
	            url: "./php/empty_comments.php",
	            method: "POST",
	            success: function (data) {
	            	if (data === "1") {
	            		alert('Notice: Comments has been emptied successfully.');
	            	} else {
	            		alert('Notice: ' + data + '.');
	            	}
	            },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
	        });
	    });
	    $("#cart").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally

	        $.ajax({
	            url: "./php/empty_carts.php",
	            method: "POST",
	            success: function (data) {
	            	if (data === "1") {
	            		alert('Notice: Carts has been emptied successfully.');
	            	} else {
	            		alert('Notice: ' + data + '.');
	            	}
	            },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
	        });
	    });
	    $("#template").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally

	        $.ajax({
	            url: "./php/empty_templates.php",
	            method: "POST",
	            success: function (data) {
	            	if (data === "1") {
	            		alert('Notice: Templates has been emptied successfully.');
	            	} else {
	            		alert('Notice: ' + data + '.');
	            	}
	            },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
	        });
	    });
	    $("#reset_order").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally

	        $.ajax({
	            url: "./php/empty_orders.php",
	            method: "POST",
	            success: function (data) {
	            	if (data === "1") {
	            		alert('Notice: Orders has been emptied successfully.');
	            	} else {
	            		alert('Notice: ' + data + '.');
	            	}
	            },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
	        });
	    });
	    $("#message").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally

	        $.ajax({
	            url: "./php/empty_messages.php",
	            method: "POST",
	            success: function (data) {
	            	if (data === "1") {
	            		alert('Notice: Messages has been emptied successfully.');
	            	} else {
	            		alert('Notice: ' + data + '.');
	            	}
	            },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
	        });
	    });
	    $("#notification").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally

	        $.ajax({
	            url: "./php/empty_notifications.php",
	            method: "POST",
	            success: function (data) {
	            	if (data === "1") {
	            		alert('Notice: Messages has been emptied successfully.');
	            	} else {
	            		alert('Notice: ' + data + '.');
	            	}
	            },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
	        });
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