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
			aside .sidebar a.mail-act{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.mail-act::before{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.mail-act span{
				color: var(--color-primary);
				margin-left: calc(1rem - 3px);
			}
			.btn-main {
			    border: 1px solid;
			    background-color: #BB8A5B;
			    padding: 0 10px 0 10px;
			    width: 75%;
			}

			.btn-main:hover {
			    background-color: #794B29;
			    color: #fff;
			}
			.comment-area textarea{
			    resize: none; 
			    border: 1px solid #ad9f9f;
			}

			.form-control:focus {
			    color: #495057;
			    background-color: #fff;
			    border-color: #ffffff;
			    outline: 0;
			}
			.comment-area textarea{
			    resize: none; 
			    border: 1px solid #ad9f9f;
			    width: 100%;
			    height: 25px;
			    border-radius: 0;
			    font-size: 15px;
			}
			.comment-area{
				display: flex;
				align-items: center;
			}
		</style>
	</head>
	<body>
		<div class="container">
        	<?php include('./include/admin_header.php') ?>

        	<!-- Main Content -->
        	<main>
        		<section>
        			<h1>Mailbox</h1>
        			<div style="border: 1px solid;"></div>
        		</section>

        		<!-- New Users Section -->
	            <div class="new-users">
	                <div class="user-list" style="padding: 25px; display: flex; align-items: center;">
	                    <div class="user" style="width: 100%; margin: 0;">
	                        <div style="overflow-x:hidden; overflow-y:auto; height: 350px; width: 100%;" id="comments-container">
	                        	<div style="width: 100%;">
	                        		<div style="display: flex; justify-content: space-evenly; width: 75%; border: 1px solid; padding: 10px; margin: 20px 0; margin-left: auto;">
	                        			<small>User: 000</small>
                        				<small>Sample</small>
	                        			<small>Date: 00-00-000</small>
	                        		</div>
	                        		<div style="display: flex; justify-content: space-evenly; width: 75%; border: 1px solid; padding: 10px; margin: 20px 0; margin-right: auto;">
	                        			<small>User: 000</small>
                        				<small>Sample</small>
	                        			<small>Date: 00-00-000</small>
	                        		</div>
	                        		<div style="display: flex; justify-content: space-evenly; width: 75%; border: 1px solid; padding: 10px; margin: 20px 0; margin-left: auto;">
	                        			<small>User: 000</small>
                        				<small>Sample</small>
	                        			<small>Date: 00-00-000</small>
	                        		</div>
	                        		<div style="display: flex; justify-content: space-evenly; width: 75%; border: 1px solid; padding: 10px; margin: 20px 0; margin-right: auto;">
	                        			<small>User: 000</small>
                        				<small>Sample</small>
	                        			<small>Date: 00-00-000</small>
	                        		</div>
	                        		<div style="display: flex; justify-content: space-evenly; width: 75%; border: 1px solid; padding: 10px; margin: 20px 0; margin-left: auto;">
	                        			<small>User: 000</small>
                        				<small>Sample</small>
	                        			<small>Date: 00-00-000</small>
	                        		</div>
	                        		<div style="display: flex; justify-content: space-evenly; width: 75%; border: 1px solid; padding: 10px; margin: 20px 0; margin-right: auto;">
	                        			<small>User: 000</small>
                        				<small>Sample</small>
	                        			<small>Date: 00-00-000</small>
	                        		</div>
	                        		<div style="display: flex; justify-content: space-evenly; width: 75%; border: 1px solid; padding: 10px; margin: 20px 0; margin-left: auto;">
	                        			<small>User: 000</small>
                        				<small>Sample</small>
	                        			<small>Date: 00-00-000</small>
	                        		</div>
	                        		<div style="display: flex; justify-content: space-evenly; width: 75%; border: 1px solid; padding: 10px; margin: 20px 0; margin-right: auto;">
	                        			<small>User: 000</small>
                        				<small>Sample</small>
	                        			<small>Date: 00-00-000</small>
	                        		</div>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
	                <div class="user-list" style="padding: 25px; display: flex; align-items: center;">
	                    <div class="user" style="width: 100%; height: 70px; margin: 0;">
	                        <form id="comment-form" style="width: 100%; height: 100%; margin: 0 auto;">
	                        	<div class="comment-area">
	                        		<textarea class="form-control" placeholder="Type your message here." rows="1" name="comment" id="comment"></textarea>
	                        	</div>
	                        	<div style="display: flex; justify-content: center">
	                        		<button type="submit" class="btn-main" style="margin: 10px 0; padding: 10px 0; width: 75%; border-radius: 25px;">Send</button>
	                        	</div>
	                        </form>
	                    </div>
	                </div>
	                
	            </div>
	            <!-- End of New Users Section -->
	        </main>

	        <!-- Right Section -->
	        <section class="right-section">
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

	        	<h1 style="text-align: center; width: 100%">Users</h1>
	        	<div class="reminders">
	        		<?php
	        		include('./php/connect.php');
	        		$sql = "SELECT DISTINCT email, deyt FROM message";
	        		$result = $conn->query($sql);
	        		if ($result->num_rows > 0) {
	        		    // output data of each row
	        		    while ($row = $result->fetch_assoc()) {
	        		        ?>
	        		        <div class="notification add-reminder">
	        		        	<form action="#" method="POST">
	        		        		<span style="margin-right: 75px;">
        		        		        <small><?php echo $row['email']?></small>
        		        		    </span>
    		        		        <small class="text_muted">
    		        		            <?php echo $row['deyt']?>
    		        		        </small>
	        		        	</form>
	        		        </div>
	        		        <?php
	        		    }
	        		} else {
	        		    echo "0 results";
	        		}
	        		$conn->close();
	        		?>
	        	</div>
	        </section>
	    </div>
    </body>
    <script src="./js/admin-orders.js"></script>
    <script src="./js/admin.js"></script>
</html>
<?php 
}else{
    echo"<script>alert('Notice: Please login to an administrative account.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>