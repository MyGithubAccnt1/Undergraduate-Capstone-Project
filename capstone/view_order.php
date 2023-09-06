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
			<section class="my-width mx-auto my-4">
                <div class="row text-center">
					<div class="col-6">
						<a href="account.php">
						    <button class="btn-main py-1 mt-4 w-75 rounded-pill">BACK</button>
						</a>
					</div>
                </div>
				<div class="row mt-4 text-center">
	                <h2>VIEW ORDERS</h2>
	                <div class="col-4">Item</div>
	                <div class="col-2">Price</div>
	                <div class="col-2">Date</div>
	                <div class="col-2">Status</div>
	                <div class="col-2">Options</div>
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
				                        <div class="border card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px;" id="comments-container">
								
				                        </div>
				                        <div class="stick-bot">
											<form>
												<div class="comment-area">
													<textarea class="form-control rounded-0" placeholder="Type your message here." rows="1"></textarea>
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
	                	    echo "0 results";
	                	}
	                	$conn->close();
	                ?>
	            </div>
			</section>
		</main>
		<?php include('./include/footer.php') ?>
		<script>
			function confirm_cancel() {
				return confirm('Are you sure you want to cancel this order?')
			}
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