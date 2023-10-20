<?php
	include('connect.php');
	$action = isset($_GET['action']) ? $_GET['action'] : '';

	if ($action === "default") {
	    
	    $sql = "SELECT * FROM `notification` ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "account") {

	    $sql = "SELECT * FROM `notification` WHERE `category` = 'account' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "login") {

	    $sql = "SELECT * FROM `notification` WHERE `category` = 'login' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "order") {

	    $sql = "SELECT * FROM `notification` WHERE `category` = 'order' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} elseif ($action === "log") {

	    $sql = "SELECT * FROM `notification` WHERE `category` = 'log' ORDER BY `id` DESC";
	    $result = $conn->query($sql);

	} else {
	    
		$sql = "SELECT * FROM `notification` ORDER BY `id` DESC";
		$result = $conn->query($sql);

	}

	if ($result->num_rows > 0) {
		
	    // output data of each row
	    while ($row = $result->fetch_assoc()) {
	    	echo '<div style="width: 100%; background-color: lightgoldenrodyellow; padding: 1px 0; margin-bottom: 5px;">';
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