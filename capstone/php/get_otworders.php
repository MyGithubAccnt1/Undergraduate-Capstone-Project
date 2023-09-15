<?php
	include('connect.php');
	$date = "";
	$id = 0;
	$sql = "SELECT * FROM `history` WHERE `status` = 'On-The-Way' ORDER BY `id` DESC";
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
	    	echo '<div style="width: 100%; background-color:' . $color . '; padding: 1px 0; margin-bottom: 5px;">';
	    		echo '<div style="width: 100%; margin: 5px 0; display: flex; flex-direction: row;">';
		    		echo '<div style="width: 33.33%; color: #000; text-align: center;">'. $row['title'] .'</div>';
		    		echo '<div style="width: 16.66%; color: #000; text-align: center;">₱'. $row['total'] .'</div>';
		    		echo '<div style="width: 16.66%; color: #000; text-align: center;">'. $row['deyt'] .'</div>';
		    		echo '<div style="width: 16.66%; color: #000; text-align: center;">'. $row['status'] .'</div>';
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
            echo '<div id="optionToggle'. $id .'" style="width: 100%; background-color: #fff; color: #000; display: none;">';
            	echo '<div style="padding: 20px 20px;">';
            		echo '<div style="width: 100%;">';
        				echo '<div style="width: 100%; margin: 5px 0; text-align: center; display: flex; flex-direction: row;">';
				        	echo '<div style="width: 33.33%;">Item</div>';
				        	echo '<div style="width: 33.33%;">Quantity</div>';
				        	echo '<div style="width: 33.33%;">Price</div>';
        				echo '</div>';
        				echo '<div style="width: 100%; height: 2px; background-color: #000;"></div>';
        	$newsql = "SELECT * FROM `order` WHERE email = '$email' and deyt = '$date'";
        	$newresult = $conn->query($newsql);
        	if ($newresult->num_rows > 0) {
        	    // output data of each row
        	    while ($newrow = $newresult->fetch_assoc()) {
        	    		echo '<div style="width: 100%; margin: 5px 0; text-align: center; display: flex; flex-direction: row;">';
		        	    	echo '<div style="width: 33.33%;">'. $newrow['title'] .'</div>';
		        	    	echo '<div style="width: 33.33%;">'. $newrow['qty'] .'</div>';
		        	    	echo '<div style="width: 33.33%;">₱'. $newrow['price'] .'</div>';
        	    		echo '</div>';
        	    }
        	} else {
        	   			echo '<div style="width: 100%; margin: 5px 0; text-align: center; display: flex; flex-direction: row;">';
        	    			echo '<div style="width: 100%; text-align: center;">Error: Can not retrieve items at the moment.</div>';
        	    		echo '</div>';
        	}
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
        			        echo '<button type="button" id="messageButton" style="color: #fff; background-color: royalblue; padding: 5px 0; width: 100%; cursor: inherit;">';
        			        	echo 'Message';
        			        echo '</button>';
        			    echo '</div>';
        			echo '</div>';
        			//continue
        		echo '</div>';
        	echo '</div>';
	    }
	} else {
		echo '<div style="width: 100%; text-align: center; margin-top: 10px;">';
	    echo '<small>There are currently no orders.</small>';
	    echo '</div>';
	}
	$conn->close();
?>