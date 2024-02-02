<?php
session_start(); 
include("connect.php");
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i');
$role = 'Regular';
$status = 'Online';

$sql = "INSERT INTO account (email, password, role, status, deyt) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $email, $password, $role, $status, $date);

if ($stmt->execute()) {
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

  	echo "1";

  	$email = $row['email'];
  	$notifmessage = "A new account has been created with an email of [". $email ."] on [". $date ."].";
	$notifcategory = "account";

	$notifsql = "INSERT INTO notification (message, category) VALUES (?, ?)";
	$notifstmt = $conn->prepare($notifsql);
	$notifstmt->bind_param("sss", $notifmessage, $notifcategory);
	if ($notifstmt->execute()) {
	    $notifstmt->close();
	}

	$notifmessage = "You successfully created your account on [". $date ."].";
	$notifcategory = "user";

	$notifsql = "INSERT INTO notification (message, category, email) VALUES (?, ?, ?)";
	$notifstmt = $conn->prepare($notifsql);
	$notifstmt->bind_param("sss", $notifmessage, $notifcategory, $email);
	if ($notifstmt->execute()) {
	    $notifstmt->close();
	}

}
$stmt->close();
mysqli_close($conn);
?>