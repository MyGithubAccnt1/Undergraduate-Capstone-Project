<?php
session_start(); 
include("connect.php");
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$mnumber = mysqli_real_escape_string($conn, $_POST['mnumber']);
$address_1 = mysqli_real_escape_string($conn, $_POST['address_1']);
$address_2 = isset($_POST['address_2']) ? mysqli_real_escape_string($conn, $_POST['address_2']) : null;
$address_3 = isset($_POST['address_3']) ? mysqli_real_escape_string($conn, $_POST['address_3']) : null;
$email = $_SESSION["email"];

$sql = "UPDATE account SET fname='$fname', lname ='$lname', mnumber='$mnumber', address_1='$address_1'";
if ($address_2 !== null) {
    $sql .= ", address_2='$address_2'";
}
if ($address_3 !== null) {
    $sql .= ", address_3='$address_3'";
}
$sql .= " WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
	$sql = "SELECT * FROM account WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$_SESSION["fname"] = $row['fname'];
	$_SESSION["lname"] = $row['lname'];
	$_SESSION["mnumber"] = $row['mnumber'];
	$_SESSION["address_1"] = $row['address_1'];

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
  	echo "1";
} else {
  	echo "2";
}
mysqli_close($conn);
?>