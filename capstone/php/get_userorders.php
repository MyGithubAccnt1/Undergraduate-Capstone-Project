<?php
	include('connect.php');
	$date = "";
	$id = 0;
	$sql = "SELECT * FROM history";
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
	    	echo '<div style="width: 100%; background-color:' . $color . '"';
	    	echo '<div style="width: 100%; text-align: center; color: #000; margin: 5px 0; display: flex; flex-direction: row;">';
	    	echo '<div style="width: 33.33%;">'. $row['title'] .'</div>';
	    	echo '<div style="width: 16.66%;">₱'. $row['total'] .'</div>';
	    	echo '<div style="width: 16.66%;">'. $row['deyt'] .'</div>';
	    	echo '<div style="width: 16.66%;">'. $row['status'] .'</div>';
	    	echo '<div style="width: 16.66%;">';
	    	echo '<a data-toggle="collapse" href="#collapseExample'. $id .'"';
	    	echo '<i class="fas fa-ellipsis-h" style="color: #000000;"></i>';
	    	echo '</a>';
	    	echo '</div>';
	    	echo '</div>';
	    	echo '</div>';
	    	$date = $row['deyt'];
	    }
	} else {
		echo '<div>';
	    echo '<small>No orders found.</small>';
	    echo '</div>';
	}
	$conn->close();
?>