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
	                            <h3>Users</h3>
	                            <h1>1</h1>
	                        </div>
	                        <div class="progresss">
	                            <svg>
	                                <circle cx="40" cy="38" r="36"></circle>
	                            </svg>
	                            <div class="percentage">
	                                <p>+1%</p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="searches">
	                    <div class="status">
	                        <div class="info">
	                            <h3>Orders</h3>
	                            <h1>1</h1>
	                        </div>
	                        <div class="progresss">
	                            <svg>
	                                <circle cx="40" cy="38" r="36"></circle>
	                            </svg>
	                            <div class="percentage">
	                                <p>+1%</p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <!-- End of Analyses -->

	            <!-- New Users Section -->
	            <div class="new-users">
	                <h2>New Users</h2>
	                <div class="user-list">
	                    <div class="user">
	                        <h2>Jack</h2>
	                        <p>54 Min Ago</p>
	                    </div>
	                    <div class="user">
	                        <h2>Amir</h2>
	                        <p>3 Hours Ago</p>
	                    </div>
	                    <div class="user">
	                        <h2>Ember</h2>
	                        <p>6 Hours Ago</p>
	                    </div>
	                    <div class="user">
	                        <h2>More</h2>
	                        <p>New User</p>
	                    </div>
	                </div>
	            </div>
	            <!-- End of New Users Section -->

	            <!-- Recent Orders Table -->
	            <div class="recent-orders">
	                <h2>Recent Orders</h2>
	                <table>
	                    <thead>
	                        <tr>
	                            <th>Course Name</th>
	                            <th>Course Number</th>
	                            <th>Payment</th>
	                            <th>Status</th>
	                            <th></th>
	                        </tr>
	                    </thead>
	                    <tbody></tbody>
	                </table>
	                <a href="#">Show All</a>
	            </div>
	            <!-- End of Recent Orders -->

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
    </script>
</html>
<?php 
}else{
    echo"<script>alert('Notice: Please login to an administrative account.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>