<?php
session_start(); 
include("connect.php");
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM account WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {

	$row = mysqli_fetch_assoc($result);
	$database_password = $row['password'];
	if (password_verify($password, $database_password)) {
    	$_SESSION["id"] = $row['id'];
    	$_SESSION["email"] = $row['email'];
    	$_SESSION["role"] = $row['role'];

    	if (empty($row['fname'])) {
    	    $_SESSION["fname"] = '';
    	} else {
    	    $_SESSION["fname"] = $row['fname'];
    	}

    	if (empty($row['lname'])) {
    	    $_SESSION["lname"] = '';
    	} else {
    	    $_SESSION["lname"] = $row['lname'];
    	}

    	if (empty($row['mnumber'])) {
    	    $_SESSION["mnumber"] = '';
    	} else {
    	    $_SESSION["mnumber"] = $row['mnumber'];
    	}

    	if (empty($row['address_1'])) {
    	    $_SESSION["address_1"] = '';
    	} else {
    	    $_SESSION["address_1"] = $row['address_1'];
    	}

    	if (empty($row['address_2'])) {
    	    $_SESSION["address_2"] = '';
    	} else {
    	    $_SESSION["address_2"] = $row['address_2'];
    	}

    	if (empty($row['address_3'])) {
    	    $_SESSION["address_3"] = '';
    	} else {
    	    $_SESSION["address_3"] = $row['address_3'];
    	}

    	$newsql = "UPDATE account SET status = 'Online' WHERE email = '$email'";

    	if (mysqli_query($conn, $newsql)) {

    	} else {
    	    echo "Error: " . mysqli_error($conn);
    	}

    	date_default_timezone_set('Asia/Manila');
    	$date = date('Y-m-d H:i');

    	if($row['role'] === "Admin") {
    		$_SESSION["role"] = $row['role'];
    		echo "2";
       		$notifmessage = "[". $email ."] logs to the system on [". $date ."].";
    		$notifcategory = "login";

    		$notifsql = "INSERT INTO notification (message, category) VALUES (?, ?)";
    		$stmt = $conn->prepare($notifsql);
    		$stmt->bind_param("ss", $notifmessage, $notifcategory);
    		if ($stmt->execute()) {
    		    $stmt->close();
    		}
    	}else{
    		$_SESSION["role"] = $row['role'];
    		echo "3";
       		$notifmessage = "[". $email ."] logs to the system on [". $date ."].";
    		$notifcategory = "login";

    		$notifsql = "INSERT INTO notification (message, category) VALUES (?, ?)";
    		$stmt = $conn->prepare($notifsql);
    		$stmt->bind_param("ss", $notifmessage, $notifcategory);
    		if ($stmt->execute()) {
    		    $stmt->close();
    		}
    	}
    } else {
        echo "1";
    }
}
mysqli_close($conn);
?>
