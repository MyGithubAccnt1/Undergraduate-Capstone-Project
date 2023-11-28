<?php
	session_start(); 
	include('connect.php');
	$email = $_SESSION["email"];
	$sql = "SELECT * FROM `notification` WHERE `category` = 'user' AND `email` = '$email' ORDER BY `id` DESC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while ($row = $result->fetch_assoc()) {
	    	echo '<div class="notif">';
	    		echo '<div style="width: 100%; margin: 5px 0; display: flex; flex-direction: row;">';
		    		echo '<div style="width: 100%; color: #000; text-align: left; margin: 0 20px;">System: '. $row['message'] .'</div>';
		    	echo '</div>';
	    	echo '</div>';
	    }
	} else {
		echo '<div style="width: 100%; text-align: center; margin-top: 10px;">';
	    	echo '<small>There are currently no notification available.</small>';
	    echo '</div>';
	}
	mysqli_close($conn);
?>