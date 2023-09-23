<?php
	include('connect.php');
	$date = "";
	$id = 0;
	$row_count = "";
	$action = isset($_GET['action']) ? $_GET['action'] : '';

	if ($action === "default") {
	    
	    $sql = "SELECT * FROM `product` ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "necklace") {

	    $sql = "SELECT * FROM `product` WHERE `category` = 'Necklace' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "pin") {

	    $sql = "SELECT * FROM `product` WHERE `category` = 'Pin' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "table") {

	    $sql = "SELECT * FROM `product` WHERE `category` = 'Table' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "logo") {

	    $sql = "SELECT * FROM `product` WHERE `category` = 'Logo' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} else {
	    
		$sql = "SELECT * FROM `product` ORDER BY `id` DESC";
		$result = $conn->query($sql);

	}
	
	if ($result) {
		$row_count = $result->num_rows;
	} else {

	}

	if ($result->num_rows > 0) {
		
	    // output data of each row
	    while ($row = $result->fetch_assoc()) {
	    	$id = $id + 1;
	    	echo '<div style="width: 100%; height: 28px; overflow-y: hidden; background-color: lightgoldenrodyellow; padding: 1px 0; margin-bottom: 5px;">';
	    		echo '<div style="width: 100%; margin: 5px 0; display: flex; flex-direction: row;">';
		    		echo '<div style="width: 24.99%; color: #000; text-align: center;">'. $row['title'] .'</div>';
		    		echo '<div style="width: 16.66%; color: #000; text-align: center;">₱'. $row['price'] .'</div>';
		    		echo '<div style="width: 16.66%; color: #000; text-align: center;">'. $row['thumbnail'] .'</div>';
		    		echo '<div style="width: 24.99%; color: #000; text-align: left; margin-left: 20px;">'. $row['description'] .'</div>';
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
            echo '<div id="optionToggle'. $id .'" style="width: 100%; background-color: #fff; color: #000; display: none; margin: 0 0 5px 0;">';
            	echo '<div style="padding: 20px 20px;">';
            		echo '<div style="width: 100%;">';
        				echo '<div style="width: 100%; margin: 5px 0; text-align: center;">';
				        	echo '<div class="input-container">';
				        		echo '<div style="margin: 0 10px 0 20px;">Title:</div>';
				        		echo '<input type="text" class="input" value="'. $row['title'] .'" id="title'. $row['id'] .'">';
				        	echo '</div>';
				        	echo '<div class="input-container">';
				        		echo '<div style="margin: 0 10px 0 20px;">Price:</div>';
				        		echo '<input type="text" class="input" value="'. $row['price'] .'" id="price'. $row['id'] .'">';
				        	echo '</div>';
				        	echo '<div class="input-container">';
				        		echo '<div style="margin: 0 10px 0 20px;">Thumbnail:</div>';
				        		echo '<input type="text" class="input" value="'. $row['thumbnail'] .'" id="thumbnail'. $row['id'] .'">';
				        	echo '</div>';
				        	echo '<div class="input-container">';
				        		echo '<div style="margin: 0 10px 0 20px;">Description:</div>';
				        		echo '<textarea class="input" id="description'. $row['id'] .'" rows="4" style="resize: none;">'. $row['description'] .'</textarea>';
				        	echo '</div>';
        				echo '</div>';
        				echo '<div style="width: 100%; height: 2px; background-color: #000;"></div>';
    	    			echo '<div class="responsive-button">';
    	    				echo '<div data-action="update" class="status-form input-container">';
    	    					echo '<input type="hidden" value="'. $row['id'] .'" name="id">';
        			        	echo '<button type="submit" class="input-button">Update</button>';
        			        echo '</div>';
        			        echo '<div data-action="delete" class="status-form input-container">';
    	    					echo '<input type="hidden" value="'. $row['id'] .'" name="id">';
        			        	echo '<button type="submit" class="input-button">Delete</button>';
        			        echo '</div>';
    	    			echo '</div>';
        				echo '<div style="width: 100%; height: 2px; background-color: #000;"></div>';
        			echo '</div>';
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