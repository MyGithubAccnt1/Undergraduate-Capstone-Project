<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
$email = $_SESSION['email'];
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
			.btn-format {
			    background-color: #794B29;
			    color: white;
			}
		</style>
	</head>
	<body class="font-monospace">
		<main class="container-fluid m-0 p-0">
			<section class="my-width px-2 mx-auto my-4">
                <div class="row text-center">
					<div class="col-6">
						<a href="index.php">
						    <button class="btn-main py-1 mt-4 w-75 rounded-pill">BACK</button>
						</a>
					</div>
                </div>
				<div class="row mt-4 text-center">
	                <h2>VIEW ORDERS</h2>
	                <div class="col-4" style="overflow-x:auto;">Item</div>
	                <div class="col-2" style="overflow-x:auto;">Price</div>
	                <div class="col-2" style="overflow-x:auto;">Date</div>
	                <div class="col-2" style="overflow-x:auto;">Status</div>
	                <div class="col-2" style="overflow-x:auto;">More</div>
	                <div class="bg-dark rounded" style="height: 3px;"></div>
	            </div>
	            <div class="row">
	            	<?php
		            	include('./php/connect.php');
		            	$date = "";
		            	$id = 0;
		            	$sql = "SELECT * FROM history WHERE email = '$email'";
		            	$result = $conn->query($sql);
		            	if ($result->num_rows > 0) {
		            	    // output data of each row
		            	    while ($row = $result->fetch_assoc()) {
		            	    	if ($row['status'] === "Pending"){
		            	    		$color = "lightgoldenrodyellow";
		            	    	}elseif ($row['status'] === "On-The-Way"){
		            	    		$color = "lightgreen";
		            	    	}elseif ($row['status'] === "Delivered"){
		            	    		$color = "lime";
		            	    	}elseif ($row['status'] === "Canceled"){
		            	    		$color = "indianred";
		            	    	}elseif ($row['status'] === "Rejected"){
		            	    		$color = "red";
		            	    	}else{
		            	    		$color = "white";
		            	    	}
		            	    	$id = $id + 1;
	            	?>
	                <div class="border border-white mt-3 card" style="background-color: <?php echo $color ?>;">
	                    <div class="row text-center my-1">
	                        <div class="col-4"><?php echo $row['title'] ?></div>
	                        <div class="col-2">₱<?php echo $row['total'] ?></div>
	                        <div class="col-2"><?php echo $row['deyt'] ?></div>
	                        <div class="col-2"><?php echo $row['status'] ?></div>
	                        <div class="col-2">
	                            <a data-toggle="collapse" href="#collapseExample<?php echo $id; ?>">
	                                <i class="fas fa-ellipsis-h" style="color: #000000;"></i>
	                            </a>
	                        </div>
	                    </div>
	                </div>
	                <?php
	                	$date = $row['deyt'];
	                ?>
	                	<div class="collapse" id="collapseExample<?php echo $id; ?>">
		                    <div class="card card-body pt-4 pb-2">
		                    	<div class="row d-flex justify-content-center">
	            					<div class="row my-1 text-center">
	            		                <div class="col-4">Item</div>
	            		                <div class="col-4">Quantity</div>
	            		                <div class="col-4">Price</div>
	            		                <div class="bg-dark rounded" style="height: 3px;"></div>
	            		            </div>
		                    	<?php
		                    		$newsql = "SELECT * FROM `order` WHERE email = '$email' and deyt = '$date'";
		                    		$newresult = $conn->query($newsql);
		                    		if ($newresult->num_rows > 0) {
		                    		    // output data of each row
		                    		    while ($newrow = $newresult->fetch_assoc()) {
		                    	?>
	    		    	            <div class="row my-1 text-center">
	    		    	                <div class="col-4"><?php echo $newrow['title'] ?></div>
	    		    	                <div class="col-4"><?php echo $newrow['qty'] ?></div>
	    		    	                <div class="col-4">₱<?php echo $newrow['price'] ?></div>
	    		    	            </div>
		                        <?php
		        	                    }
		        	                } else {
		        	                    echo "0 results";
		        	                }
		                        ?>
                    			<div class="row my-1 text-center">
                                    <div class="bg-dark rounded" style="height: 3px;"></div>
                                </div>
		                    	</div>
		                        <div class="row text-center d-flex align-items-center">
		                            <div class="col-12 col-md-6">
		                            	<form action="./php/cancel_order.php">
		                            		<input type="hidden" value="<?php echo $date; ?>" name="date">
		                            		<input type="submit" class="btn btn-danger btn-sm rounded-0" value="Cancel Order" onclick="return confirm_cancel()">
		                            	</form>
		                            </div>
		                            <div class="col-12 col-md-6">
		                                <div class="form-check form-switch d-flex flex-row justify-content-center mt-3">
		                                    <h5 class="text-center">MESSAGE</h5>
		                                    <input class="form-check-input" type="checkbox" data-toggle="collapse" href="#collapseExample<?php echo $id; ?>-<?php echo $id; ?>">
		                                </div>
		                            </div>
		                        </div>
		                        <div class="row mt-2">
		                            <div class="collapse" id="collapseExample<?php echo $id; ?>-<?php echo $id; ?>">
		                                <div class="stick-top bg-dark text-center text-white py-2">Chat with SBM</div>
				                        <div class="border card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px;" id="comments-container<?php echo $id; ?>-<?php echo $id; ?>">
					
				                        </div>
				                        <div class="stick-bot">
											<form id="comment-form<?php echo $id; ?>-<?php echo $id; ?>">
												<div class="comment-area">
													<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>"/>
													<input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>"/>
													<input type="hidden" name="role" value="<?php echo $_SESSION['role'];?>"/>
													<input type="hidden" name="date" value="<?php echo $date; ?>" id="dateInput<?php echo $id; ?>-<?php echo $id; ?>"/>
													<?php
													include('./php/connect.php');
													$email = $_SESSION['email'];
													$rowsql = "SELECT * FROM history WHERE email = '$email'";
													$rowresult = $conn->query($rowsql);
													if ($rowresult) {
													    $row_count = $rowresult->num_rows;
													?>
													    <input type="hidden" name="row" value="<?php echo $row_count; ?>"/>
													<?php
													} else {

													}
													?>
													<textarea class="form-control rounded-0" placeholder="Type your message here." rows="1" name="comment" id="comment<?php echo $id; ?>-<?php echo $id; ?>"></textarea>
												</div>
												<div class="d-flex justify-content-center">
													<button type="submit" class="btn-main rounded-pill py-1 my-1 btn btn-md w-75">Send</button>
												</div>
											</form>
				                        </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            <?php
	                		}
	                	} else {
	                		echo '<div class="d-flex justify-content-center mt-5">';
	                	    echo '<small>No history found.</small>';
	                	    echo '</div>';
	                	}
	                	$conn->close();
	                ?>
	            </div>
			</section>
		</main>
		<script>
			function confirm_cancel() {
				return confirm('Are you sure you want to cancel this order?')
			}
		</script>
		<script>
			function showComments() {
			    var rowCount = $("input[name='row']").val(); // Retrieve the number of rows from the hidden input

			    // Ensure rowCount is a valid number (e.g., convert it to an integer)
			    rowCount = parseInt(rowCount);

			    var looop = 1;

			    function makeAjaxRequest() {
			        // Make an AJAX request
			        $.ajax({
			            url: "./php/get_messages.php",
			            method: "GET",
			            data: { date: $("#dateInput" + looop + "-" + looop).val() },
			            success: function (data) {
			                // Handle the AJAX response here
			                $("#comments-container" + looop + "-" + looop).html(data);

			                // Increment the loop counter
			                looop++;

			                // Check if there are more iterations to perform
			                if (looop <= rowCount) {
			                    // Make the next AJAX request
			                    makeAjaxRequest();
			                }
			            }
			        });
			    }

			    // Start the first AJAX request
			    makeAjaxRequest();
			}
			// Loop through the forms and attach the event handler to each form
			for (var i = 1; i <= <?php echo $row_count; ?>; i++) {
			    // Construct a unique form ID using PHP-generated $id and loop variable i
			    var formId = "comment-form" + i + "-" + i;

			    // Attach the form submission handler to the form with the unique ID
			    $("#" + formId).submit(function (e) {
			        e.preventDefault(); // Prevent the form from submitting traditionally

			        // Serialize the form data
			        var formData = $(this).serialize();

			        // Send the data to the PHP script to handle comment insertion
			        $.ajax({
			            url: "./php/add_messages.php", // PHP script to insert comments into the database
			            method: "POST",
			            data: formData,
			            success: function (data) {
			                // If successful, show the updated comments
			                showComments();
			            }
			        });

			        // Clear the textarea for the current form
			        $(this).find('textarea[name="comment"]').val('');
			    });
			}

	
	        // Show comments on page load
	        showComments();
	        setInterval(showComments, 1000);
		</script>
	</body>
</html>
<?php
}else{
    echo"<script>alert('Notice: Please login to proceed.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>