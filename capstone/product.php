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
			    border-color: #0D6EFD;
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
				border: 1px solid;
				border-radius: 25px;
				padding: 5px 20px;
				display: flex;
				align-items: center;
				background-color: #fff;
			}
		</style>
	</head>
	<body>
		<div class="container">
        	<?php include('./include/admin_header.php') ?>

        	<!-- Main Content -->
        	<main>
	            <h1>Product Orders</h1>
	           
	            <!-- New Users Section -->
	            <div class="new-users">
	                <div class="user-list" id="orders-container" style="gap: 5px;">
	                	<div style="width: 100%; display: flex; flex-direction: row; text-align: center;">
	                		<div style="width: 33.33%;">Item</div>
	                		<div style="width: 16.66%;">Price</div>
	                		<div style="width: 16.66%;">Date</div>
	                		<div style="width: 16.66%;">Status</div>
	                		<div style="width: 16.66%;">More</div>
	                	</div>
	                    <div class="border" style="width: 100%;"></div>
	                    <div style="width: 100%; background-color: lightgoldenrodyellow;">
	                        <div style="width: 100%; text-align: center; color: #000; margin: 5px 0; display: flex; flex-direction: row;">
	                            <div style="width: 33.33%;">title</div>
	                            <div style="width: 16.66%;">₱00.00</div>
	                            <div style="width: 16.66%;">00-00-00</div>
	                            <div style="width: 16.66%;">Pending</div>
	                            <div style="width: 16.66%;">
	                                <a data-toggle="collapse" href="#collapseExample1">
	                                    <i class="fas fa-ellipsis-h" style="color: #000000;"></i>
	                                </a>
	                            </div>
	                        </div>
	                    </div>
	                	<div class="collapse" id="collapseExample1" style="width: 100%; background-color: #fff; color: #000;">
		                    <div style="padding: 20px 20px;">
		                    	<div style="width: 100%;">
	            					<div style="width: 100%; margin: 5px 0; text-align: center; display: flex; flex-direction: row;">
	            		                <div style="width: 33.33%;">Item</div>
	            		                <div style="width: 33.33%;">Quantity</div>
	            		                <div style="width: 33.33%;">Price</div>
	            		            </div>
	            		            <div style="width: 100%; height: 2px; background-color: #000;"></div>
	    		    	            <div style="width: 100%; margin: 5px 0; text-align: center; display: flex; flex-direction: row;">
	    		    	                <div style="width: 33.33%;">test</div>
	    		    	                <div style="width: 33.33%;">1</div>
	    		    	                <div style="width: 33.33%;">₱11.11</div>
	    		    	            </div>
                    				<div style="width: 100%; height: 2px; background-color: #000;"></div>
		                    	</div>
		                        <div style="width: 100%; display: flex; justify-content: center; text-align: center; padding: 10px 0;">
		                            <div style="max-width: 100%; min-width: 50%;">
		                            	<form>
		                            		<input type="hidden" value="date" name="date">
		                            		<input type="submit" style="color: #fff; background-color: indianred; padding: 5px 10px;" value="Cancel Order" onclick="return confirm_cancel()">
		                            	</form>
		                            </div>
		                            <div style="max-width: 100%; min-width: 50%;">
		                            	<a data-toggle="collapse" href="#collapseExample1-1">
		                                	<input type="submit" style="color: #fff; background-color: royalblue; padding: 5px 10px;" value="Message">
		                                </a>
		                            </div>
		                        </div>
		                        <div style="width: 100%;">
		                            <div class="collapse" id="collapseExample1-1">
		                                <div style="width: 100%; background-color: #000; color: #fff; text-align: center; padding: 5px 0;">Chat with SBM</div>

				                        <div class="border" style="overflow-x:hidden; overflow-y:auto; height: 200px;" id="comments-container1-1"></div>

				                        <div style="width: 100%;">
											<form id="comment-form1-1" style="width: 100%; height: 100%; margin: 0 auto;">
												<input type="hidden" name="id" value="id"/>
												<input type="hidden" name="email" value="email"/>
												<input type="hidden" name="role" value="role"/>
												<input type="hidden" name="date" value="date" id="dateInput1-1"/>
												<div class="comment-area">
													<textarea class="form-control" placeholder="Type your message here." rows="1" name="comment" id="comment1-1"></textarea>
												</div>
												<div style="display: flex; justify-content: center">
													<button type="submit" class="btn-main" style="margin: 10px 0; padding: 10px 0; width: 75%; border-radius: 25px;">Send</button>
												</div>
											</form>
				                        </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
	                </div>
	            </div>
	            <!-- End of New Users Section -->

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
        	</div>
    	</div>
    </body>
    <script src="./js/admin.js"></script>
    <script>
    	// function showOrders() {
		//     // Make an AJAX request
		//     $.ajax({
		//         url: "./php/get_userorders.php",
		//         method: "GET",
		//         success: function (data) {
		//             // Handle the AJAX response here
		//             $("#orders-container").html(data);
		//         },
		//         error: function (xhr, status, error) {
		//             console.error("AJAX Request Error:", status, error);
		//         }
		//     });
		// }
    </script>
</html>
<?php 
}else{
    echo"<script>alert('Notice: Please login to an administrative account.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>