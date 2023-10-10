<?php
session_start(); 
include("connect.php");

// Escape user inputs for security
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM account WHERE email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {

	$row = mysqli_fetch_assoc($result);
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
	
	if (empty($row['caddress'])) {
	    $_SESSION["caddress"] = '';
	} else {
	    $_SESSION["caddress"] = $row['caddress'];
	}

	$newsql = "UPDATE account SET status = 'Online' WHERE email = '$email'";

	if (mysqli_query($conn, $newsql)) {

	} else {
	    echo "Error: " . mysqli_error($conn);
	}

	if($row['role'] === "Admin") {
		$_SESSION["role"] = $row['role'];

		echo "2";

   		$notifmessage = "An [Admin] has logged in to the system with an email of [". $row['email'] ."].";
		$notifcategory = "login";
		$notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
		$notifresult = mysqli_query($conn, $notifsql);
	}else{
		$_SESSION["role"] = $row['role'];

		echo "3";

   		$notifmessage = "An [User] has logged in to the system with an email of [". $row['email'] ."].";
		$notifcategory = "login";
		$notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
		$notifresult = mysqli_query($conn, $notifsql);
	}
}else {

 	echo "1";

}
$conn->close();
?>
