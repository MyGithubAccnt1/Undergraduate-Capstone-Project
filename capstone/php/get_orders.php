<?php
	include('connect.php');
	$date = "";
	$id = 0;
	$row_count = "";
	$action = isset($_GET['action']) ? $_GET['action'] : '';

	if ($action === "default") {
	    $sql = "SELECT * FROM `history` WHERE `status` = 'Pending' or `status` = 'On-The-Way' or `status` = 'Delivered' or `status` = 'Canceled' or `status` = 'Rejected' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "pending") {

	    $sql = "SELECT * FROM `history` WHERE `status` = 'Pending' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "on-the-way") {

	    $sql = "SELECT * FROM `history` WHERE `status` = 'On-The-Way' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "delivered") {

	    $sql = "SELECT * FROM `history` WHERE `status` = 'Delivered' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "canceled") {

	    $sql = "SELECT * FROM `history` WHERE `status` = 'Canceled' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "rejected") {

	    $sql = "SELECT * FROM `history` WHERE `status` = 'Rejected' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} else {
	    
		$sql = "SELECT * FROM `history` WHERE `status` = 'Pending' or `status` = 'On-The-Way' or `status` = 'Delivered' or `status` = 'Canceled' or `status` = 'Rejected' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	}
	
	if ($result) {
		$row_count = $result->num_rows;
	} else {

	}

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
	    	echo '<div style="width: 100%; background-color:' . $color . '; padding: 1px 0; margin-bottom: 5px;">';
	    		echo '<div style="width: 100%; margin: 5px 0; display: flex; flex-direction: row;">';
		    		echo '<div style="width: 33.33%; color: #000; padding-left: 10%; text-align: left;">'. $row['title'] .'</div>';
		    		if ($row['total'] === "0.00") {
		    			echo '<div style="width: 16.66%; color: #000; text-align: left;">Estimating...</div>';
		    		} else {
		    			echo '<div style="width: 16.66%; color: #000; text-align: left;">PHP '. $row['total'] .'</div>';
		    		}
		    		echo '<div style="width: 16.66%; color: #000; text-align: center;">'. $row['deyt'] .'</div>';
		    		echo '<div style="width: 16.66%; color: #000; padding-left: 2.5%; text-align: left;">'. $row['status'] .'</div>';
		    		echo '<div style="width: 16.66%; text-align: center;">';
		    			echo '<form class="dynamic-form" action="">';
		    				echo '<input type="hidden" name="id" value="'. $id .'">';
		    				echo '<button type="submit" class="optionButton" data-id="'. $id .'" style="height: 100%; padding: 0 10px; background-color: inherit; cursor: inherit;">';
		    					echo '<i class="fas fa-ellipsis-h" style="color: #000000;"></i>';
		    				echo '</button>';
		    			echo '</form>';
		    		echo '</div>';
		    	echo '</div>';
	    	echo '</div>';
	    	$email = $row['email'];
	    	$date = $row['deyt'];
            echo '<div id="optionToggle'. $id .'" style="width: 100%; background-color: #fff; color: #000; display: none; margin: 0 0 5px 0;">';
            	echo '<div style="padding: 20px 20px;">';
            		echo '<div style="width: 100%;">';
        	$newsql = "SELECT * FROM `order` WHERE email = '$email' and deyt = '$date'";
        	$newresult = $conn->query($newsql);
        	if ($newresult->num_rows > 0) {
        	    		echo '<div style="width: 100%; margin: 5px 0; text-align: center; display: flex; flex-direction: row;">';
				        	echo '<div style="width: 33.33%;">Item</div>';
				        	echo '<div style="width: 33.33%;">Quantity</div>';
				        	echo '<div style="width: 33.33%;">Price</div>';
        				echo '</div>';
        				echo '<div style="width: 100%; height: 2px; background-color: #000;"></div>';
        	    while ($newrow = $newresult->fetch_assoc()) {
        	    		echo '<div style="width: 100%; margin: 5px 0; text-align: center; display: flex; flex-direction: row;">';
		        	    	echo '<div style="width: 33.33%; padding-left: 10%; text-align: left;">'. $newrow['title'] .'</div>';
		        	    	echo '<div style="width: 33.33%;">'. $newrow['qty'] .'</div>';
		        	    	echo '<div style="width: 33.33%; padding-left: 10%; text-align: left;">PHP '. $newrow['price'] .'</div>';
        	    		echo '</div>';
        	    }
        	} else {
        		$templatesql = "SELECT thumbnail FROM template WHERE email = '$email' and deyt = '$date'";
        		$templateresult = $conn->query($templatesql);
        		if ($templateresult->num_rows > 0) {
        			$templaterow = $templateresult->fetch_assoc();
        				echo '<div style="width: 100%; margin: 5px 0;">';
				        	echo '<div style="width: 100%; text-align: center">Template</div>';
        				echo '</div>';
        				echo '<div style="width: 100%; height: 2px; background-color: #000;"></div>';
        				echo '<div style="width: 100%; margin: 5px 0; display: flex;">';
		        			echo '<div style="flex: 50%; padding: 20px; display: flex; justify-content: center; align-items: center;" class="template-img border" id="image">';
		        				echo '<input type="hidden" name="image" value="'. $templaterow['thumbnail'] .'">';
		        				echo '<img src="'. $templaterow['thumbnail'] .'" style="width: auto; height: 300px;">';
		        			echo '</div>';
		        	$objectsql = "SELECT * FROM object WHERE email = '$email' and deyt = '$date'";
		        	$objectresult = $conn->query($objectsql);
		        	if ($objectresult->num_rows > 0) {
		        			echo '<div style="flex: 50%; padding: 20px; height: 350px; overflow-x:hidden; overflow-y:auto; font-family: Monospace; font-size: 1.5rem;" class="border">';
		        		while ($objectrow = $objectresult->fetch_assoc()) {
		        			$properties = $objectrow['properties'];
		        			$newProperties = explode(",", $properties);
		        				echo '<small>'. $objectrow['objectType'] .':</small><br>';
		        				if ($objectrow['objectType'] === "background" || $objectrow['objectType'] === "image") {
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[6];
		        				echo '</small><br>';
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[7];
		        				echo '</small><br><br>';
		        				} else if ($objectrow['objectType'] === "i-text") {
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[6];
		        				echo '</small><br>';
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[7];
		        				echo '</small><br>';
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[8];
		        				echo '</small><br>';
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[9];
		        				echo '</small><br>';
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[10];
		        				echo '</small><br>';
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[31];
		        				echo '</small><br>';
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[34];
		        				echo '</small><br><br>';
		        				} else {
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[6];
		        				echo '</small><br>';
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[7];
		        				echo '</small><br>';
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[8];
		        				echo '</small><br>';
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[9];
		        				echo '</small><br>';
		        				echo '<small style="margin-left: 100px;">';
		        					echo $newProperties[10];
		        				echo '</small><br><br>';
		        				}		
		        		}
		        			echo '</div>';
		        		echo '</div>';
		        	}
        		} else {
        	   			echo '<div style="width: 100%; margin: 5px 0; text-align: center; display: flex; flex-direction: row;">';
        	    			echo '<div style="width: 100%; text-align: center;">No Available Data</div>';
        	    		echo '</div>';
        	    }
        	}
        				echo '<div style="width: 100%; height: 2px; background-color: #000;"></div>';
        				echo '<div style="width: 100%; margin: 5px 0; text-align: center;">';
        	    			echo '<div style="width: 100%; text-align: center;">Personal Information</div>';
        	    			echo '<div style="width: 100%; display: flex;">';
        	    				echo '<div style="flex: 50%; text-align: right; margin-right: 2.5%;">';
        	    					echo '<p style="color: #000; margin: 5px 0;">First Name:</p>';
        	    					echo '<p style="color: #000; margin: 5px 0;">Last Name:</p>';
        	    					echo '<p style="color: #000; margin: 5px 0;">Mobile Number:</p>';
        	    					echo '<p style="color: #000; margin: 5px 0;">E-mail:</p>';
        	    					echo '<p style="color: #000; margin: 5px 0;">Complete Address:</p>';
        	    				echo '</div>';
        	    				echo '<div style="flex: 50%; text-align: left; margin-left: 2.5%;">';
        	    					echo '<p style="color: #000; margin: 5px 0;">'. $row['input_fname'] .'</p>';
        	    					echo '<p style="color: #000; margin: 5px 0;">'. $row['input_lname'] .'</p>';
        	    					echo '<p style="color: #000; margin: 5px 0;">'. $row['input_mnumber'] .'</p>';
        	    					echo '<p style="color: #000; margin: 5px 0;">'. $row['input_email'] .'</p>';
        	    					echo '<p style="color: #000; margin: 5px 0;">'. $row['input_caddress'] .'</p>';
        	    				echo '</div>';
        	    			echo '</div>';
        	    		echo '</div>';

        				echo '<div style="width: 100%; height: 2px; background-color: #000;"></div>';
        			echo '</div>';
        			echo '<div style="width: 100%; display: flex; justify-content: space-around; text-align: center; padding: 10px 0;">';
        			    echo '<div style="max-width: 100%; min-width: 20%;">';
        			        echo '<div data-action="otw" class="status-form">';
        			        	echo '<input type="hidden" value="'. $date .'" name="date">';
        			        	echo '<input type="hidden" value="'. $email .'" name="email">';
        			        	echo '<input type="submit" style="background-color: lightgreen; color: #fff; padding: 5px 0; width: 100%; cursor: inherit;" value="On-The-Way">';
        			        echo '</div>';
        			    echo '</div>';
        			    echo '<div style="max-width: 100%; min-width: 20%;">';
        			        echo '<div data-action="delivered" class="status-form">';
        			        	echo '<input type="hidden" value="'. $date .'" name="date">';
        			        	echo '<input type="hidden" value="'. $email .'" name="email">';
        			        	echo '<input type="submit" style="background-color: lime; color: #fff; padding: 5px 0; width: 100%; cursor: inherit;" value="Delivered">';
        			        echo '</div>';
        			    echo '</div>';
        			    echo '<div style="max-width: 100%; min-width: 20%;">';
        			        echo '<div data-action="rejected" class="status-form">';
        			        	echo '<input type="hidden" value="'. $date .'" name="date">';
        			        	echo '<input type="hidden" value="'. $email .'" name="email">';
        			        	echo '<input type="submit" style="background-color: red; color: #fff; padding: 5px 0; width: 100%; cursor: inherit;" value="Rejected">';
        			        echo '</div>';
        			    echo '</div>';
        			    echo '<div style="max-width: 100%; min-width: 20%;">';
        			    	echo '<div data-action="message" class="status-form">';
        			    		echo '<input type="hidden" name="id" value="'. $id .'-'. $id .'">';
        			    		echo '<input type="hidden" name="row" value="'. $row_count. '"/>';
        			    		echo '<input type="hidden" value="'. $date .'" name="date" id="dateInput'. $id .'-'. $id .'">';
        			    		echo '<input type="hidden" value="'. $email .'" name="email" id="emailInput'. $id .'-'. $id .'">';
	        			        echo '<button type="button" style="color: #fff; background-color: royalblue; padding: 5px 0; width: 100%; cursor: inherit;">';
	        			        	echo 'Message';
	        			        echo '</button>';
	        			    echo '</div>';
        			    echo '</div>';
        			echo '</div>';
                    echo '<div id="messageToggle'. $id .'-'. $id .'" style="display: none; width: 100%;">';
                        echo '<div style="width: 100%; background-color: #000; color: #fff; text-align: center; padding: 5px 0;">Chat with SBM</div>';
                        echo '<div class="border" style="overflow-x:hidden; overflow-y:auto; height: 200px;" id="comments-container'. $id .'-'. $id .'"></div>';
                        echo '<div style="width: 100%;">';
							echo '<form id="comment-form'. $id .'-'. $id .'" action="" style="width: 100%; height: 100%; margin: 0 auto;">';
								echo '<input type="hidden" value="'. $date .'" name="date">';
        			    		echo '<input type="hidden" value="'. $email .'" name="email">';
								echo '<div class="comment-area">';
									echo '<textarea class="form-control" placeholder="Type your message here." rows="1" name="comment"></textarea>';
								echo '</div>';
								echo '<div style="display: flex; justify-content: center">';
									echo '<button type="submit" class="btn-main" style="margin: 10px 0; padding: 10px 0; width: 75%; border-radius: 25px;">Send</button>';
								echo '</div>';
							echo '</form>';
                        echo '</div>';
                    echo '</div>';
        		echo '</div>';
        	echo '</div>';
	    }
	} else {
		echo '<div style="width: 100%; text-align: center; margin-top: 10px;">';
	    echo '<small>There are currently no orders.</small>';
	    echo '</div>';
	}
	mysqli_close($conn);
?>