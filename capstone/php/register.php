<?php
session_start(); 
include("connect.php");
// Escape user inputs for security
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$password = mysqli_real_escape_string($conn, $_REQUEST['password']);
$sql = "SELECT * FROM account WHERE email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) === 1) {

	echo "1";

} else {
	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d H:i');
	$sql = "INSERT INTO account (email, password, role, status, deyt) VALUES ('$email','$password','Regular', 'Online','$date')";
	if ($conn->query($sql) === TRUE) {
		$sql = "SELECT * FROM account WHERE email = '$email' and password = '$password'";
		$result = mysqli_query($conn, $sql);
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

	  	echo "2";

	  	$notifmessage = "A new account has been created with an email of [". $row['email'] ."].";
		$notifcategory = "account";
		$notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
		$notifresult = mysqli_query($conn, $notifsql);
	} else {

	  	echo "3";
	  	
	}
}
$conn->close();
?>