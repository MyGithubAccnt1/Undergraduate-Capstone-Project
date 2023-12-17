<?php
	include('connect.php');
	$date = "";
	$id = 0;
	$row_count = "";
	$action = isset($_GET['action']) ? $_GET['action'] : '';

	if ($action === "default") {

	    $sql = "SELECT * FROM `history` WHERE `status` = 'For Review' or `status` = 'Reviewed' or `status` = 'Impossible' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "reviewed") {

	    $sql = "SELECT * FROM `history` WHERE `status` = 'Reviewed' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "impossible") {

	    $sql = "SELECT * FROM `history` WHERE `status` = 'Impossible' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} else {
	    
		$sql = "SELECT * FROM `history` WHERE `status` = 'For Review' or `status` = 'Reviewed' or `status` = 'Impossible' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	}
	
	if ($result) {
		$row_count = $result->num_rows;
	} else {

	}

	if ($result->num_rows > 0) {
		
	    // output data of each row
	    while ($row = $result->fetch_assoc()) {
	    	if ($row['status'] === "For Review"){
	    		$color = "lightgoldenrodyellow";
	    	}elseif ($row['status'] === "Reviewed"){
	    		$color = "lightgreen";
	    	}elseif ($row['status'] === "Impossible"){
	    		$color = "indianred";
	    	}else{
	    		$color = "white";
	    	}
	    	$id = $id + 1;
	    	echo '<div style="width: 100%; background-color:' . $color . '; padding: 1px 0; margin-bottom: 5px;">';
	    		echo '<div style="width: 100%; margin: 5px 0; display: flex; flex-direction: row;">';
		    		echo '<div style="width: 33.33%; color: #000; text-align: left; margin-left: 10%;">'. $row['title'] .'</div>';
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
            $product = "";
        	$templatesql = "SELECT frontthumb, product FROM template WHERE email = '$email' and deyt = '$date'";
        	$templateresult = $conn->query($templatesql);
        	if ($templateresult->num_rows > 0) {
        		$templaterow = $templateresult->fetch_assoc();
        		$product = $templaterow['product'];
        	    		echo '<div style="width: 100%; margin: 5px 0;">';
				        	echo '<div style="width: 100%; text-align: center">Template</div>';
        				echo '</div>';
        				echo '<div style="width: 100%; height: 2px; background-color: #000;"></div>';
        				echo '<div style="width: 100%; margin: 5px 0; display: flex;">';
	        	    		echo '<div style="flex: 50%; margin: 5px 0; padding: 20px; display: flex; justify-content: center; align-items: center;" class="template-img border" id="image">';
	        	    			echo '<input type="hidden" name="image" value="'. $templaterow['frontthumb'] .'">';
	        	    			echo '<img src="'. $templaterow['frontthumb'] .'" style="width: auto; height: 300px;">';
	        	    		echo '</div>';
	        	    		echo '<div style="flex: 50%; margin: 5px 0; padding: 20px; height: 350px; overflow-x:hidden; overflow-y:auto; font-family: Monospace; font-size: 1.5rem;" class="border">';
    	    		        	
    	    		        	echo '<small>Live URL: </small><br>';
    	    		        	echo '<small style="margin-left: 100px;">';
    	    		        	$link = 'http://20.205.112.210/make_customize_v2.php?&email=' . $email . '&deyt=' . $date . '&product=' . $product;
    	    		        	echo '<a href="' . $link . '" target="_blank" style="color: #0A58CA;">' . $link . '</a>';
    	    		        	echo '</small><br><br>';
    	    		        	
	        	$objectsql = "SELECT * FROM object WHERE email = '$email' and deyt = '$date'";
	        	$objectresult = $conn->query($objectsql);
	        	if ($objectresult->num_rows > 0) {
	        		while ($objectrow = $objectresult->fetch_assoc()) {
	        			$properties = $objectrow['properties'];
	        			$newProperties = explode(",", $properties);
	        					echo '<small>'. $objectrow['objectType'] .':</small><br>';
	        			if ($objectrow['objectType'] === "background" || $objectrow['objectType'] === "image") {
	        					echo '<small style="margin-left: 100px;">
	        						'. $newProperties[6] .'
	        					</small><br>
	        					<small style="margin-left: 100px;">
	        						'. $newProperties[7] .'
	        					</small><br><br>';
	        			} else if ($objectrow['objectType'] === "i-text") {
	        					echo '<small style="margin-left: 100px;">
	        						'. $newProperties[6] .'
	        					</small><br>
	        					<small style="margin-left: 100px;">
	        						'. $newProperties[7] .'
	        					</small><br>
	        					<small style="margin-left: 100px;">
	        						'. $newProperties[8] .'
	        					</small><br>
	        					<small style="margin-left: 100px;">
	        						'. $newProperties[9] .'
	        					</small><br>
	        					<small style="margin-left: 100px;">
	        						'. $newProperties[10] .'
	        					</small><br>
	        					<small style="margin-left: 100px;">
	        						'. $newProperties[31] .'
	        					</small><br>
	        					<small style="margin-left: 100px;">
	        						'. $newProperties[34] .'
	        					</small><br><br>';
	        			} else {
	        					echo '<small style="margin-left: 100px;">
	        						'. $newProperties[6] .'
	        					</small><br>
	        					<small style="margin-left: 100px;">
	        						'. $newProperties[7] .'
	        					</small><br>
	        					<small style="margin-left: 100px;">
	        						'. $newProperties[8] .'
	        					</small><br>
	        					<small style="margin-left: 100px;">
	        						'. $newProperties[9] .'
	        					</small><br>
	        					<small style="margin-left: 100px;">
	        						'. $newProperties[10] .'
	        					</small><br><br>';
	        			}
	        		}
	        	}
	        	    		echo '</div>';
	        	    	echo '</div>';
        	} else {
        	   			echo '<div style="width: 100%; margin: 5px 0; text-align: center; display: flex; flex-direction: row;">';
        	    			echo '<div style="width: 100%; text-align: center;">No Available Data</div>';
        	    		echo '</div>';
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
        				echo '<div style="width: 100%; margin: 5px 0; text-align: center;">';
        	    			echo '<div style="width: 100%; text-align: center;">Other Information</div>';
        	    			echo '<div style="width: 100%; display: flex;">';
        	    				echo '<div style="flex: 50%; text-align: right; margin-right: 2.5%;">';
        	    					echo '<p style="color: #000; margin: 5px 0;">Main Material:</p>';
        	    					echo '<p style="color: #000; margin: 5px 0;">Description:</p>';
        	    				echo '</div>';
        	    				echo '<div style="flex: 50%; text-align: left; margin-left: 2.5%;">';
        	    					echo '<p style="color: #000; margin: 5px 0;">'. $row['input_material'] .'</p>';
        	    					echo '<p style="color: #000; margin: 5px 0;">'. $row['input_description'] .'</p>';
        	    				echo '</div>';
        	    			echo '</div>';
        	    		echo '</div>';
        				echo '<div style="width: 100%; height: 2px; background-color: #000;"></div>';
        			echo '</div>';
        			echo '<div style="width: 100%; display: flex; justify-content: space-around; text-align: center; padding: 10px 0;">';
        			    echo '<div style="max-width: 100%; min-width: 20%;">';
        			        echo '<div data-action="reviewed" class="status-form">';
        			        	echo '<input type="hidden" value="'. $date .'" name="date">';
        			        	echo '<input type="hidden" value="'. $email .'" name="email">';
        			        	echo '<input type="submit" style="background-color: lightgreen; color: #fff; padding: 5px 0; width: 100%; cursor: inherit;" value="Reviewed">';
        			        echo '</div>';
        			    echo '</div>';
        			    echo '<div style="max-width: 100%; min-width: 20%;">';
        			        echo '<div data-action="impossible" class="status-form">';
        			        	echo '<input type="hidden" value="'. $date .'" name="date">';
        			        	echo '<input type="hidden" value="'. $email .'" name="email">';
        			        	echo '<input type="submit" style="background-color: indianred; color: #fff; padding: 5px 0; width: 100%; cursor: inherit;" value="Impossible">';
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
                    echo '<div style="width: 100%; height: 2px; background-color: #000;"></div>';
            		echo '<div style="width: 100%;">';
        				echo '<div style="width: 100%; margin: 5px 0; text-align: center;">';
	        				echo '<div class="input-container">';
	        					echo '<div style="margin: 0 10px 0 20px;">Price:</div>';
	        					echo '<input type="text" class="input" value="'. $row['total'] .'" id="price'. $row['id'] .'">';
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
        			echo '</div>';
                    echo '<div style="width: 100%; height: 2px; background-color: #000;"></div>';
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
        			echo '</div>';
        			echo '<div style="width: 100%; text-align: center;">';
    			        echo '<p>Once this option is selected, it will became an order.</p>';
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