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
			aside .sidebar a.temp-act{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.temp-act::before{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.temp-act span{
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
	            <h1>Analytics</h1>
	            <!-- Analyses -->
	            <div class="analyse">
	                <div class="sales">
	                    <div class="status">
	                        <div class="info">
	                            <h3>Total Sales</h3>
	                            <h1>$65,024</h1>
	                        </div>
	                        <div class="progresss">
	                            <svg>
	                                <circle cx="38" cy="38" r="36"></circle>
	                            </svg>
	                            <div class="percentage">
	                                <p>+81%</p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="visits">
	                    <div class="status">
	                        <div class="info">
	                            <h3>Site Visit</h3>
	                            <h1>24,981</h1>
	                        </div>
	                        <div class="progresss">
	                            <svg>
	                                <circle cx="38" cy="38" r="36"></circle>
	                            </svg>
	                            <div class="percentage">
	                                <p>-48%</p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="searches">
	                    <div class="status">
	                        <div class="info">
	                            <h3>Searches</h3>
	                            <h1>14,147</h1>
	                        </div>
	                        <div class="progresss">
	                            <svg>
	                                <circle cx="38" cy="38" r="36"></circle>
	                            </svg>
	                            <div class="percentage">
	                                <p>+21%</p>
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
            	<!-- End of Nav -->

	            <div class="reminders">
	                <div class="header">
	                    <h2>Reminders</h2>
	                    <span class="material-icons-sharp">
	                        notifications_none
	                    </span>
	                </div>

	                <div class="notification">
	                    <div class="icon">
	                        <span class="material-icons-sharp">
	                            volume_up
	                        </span>
	                    </div>
	                    <div class="content">
	                        <div class="info">
	                            <h3>Workshop</h3>
	                            <small class="text_muted">
	                                08:00 AM - 12:00 PM
	                            </small>
	                        </div>
	                        <span class="material-icons-sharp">
	                            more_vert
	                        </span>
	                    </div>
	                </div>

	                <div class="notification deactive">
	                    <div class="icon">
	                        <span class="material-icons-sharp">
	                            edit
	                        </span>
	                    </div>
	                    <div class="content">
	                        <div class="info">
	                            <h3>Workshop</h3>
	                            <small class="text_muted">
	                                08:00 AM - 12:00 PM
	                            </small>
	                        </div>
	                        <span class="material-icons-sharp">
	                            more_vert
	                        </span>
	                    </div>
	                </div>

	                <div class="notification add-reminder">
	                    <div>
	                        <span class="material-icons-sharp">
	                            add
	                        </span>
	                        <h3>Add Reminder</h3>
	                    </div>
	                </div>
	            </div>
        	</div>
    	</div>
    </body>
    <script src="./js/admin.js"></script>
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