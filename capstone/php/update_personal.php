<?php
session_start(); 
include("connect.php");
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$mnumber = mysqli_real_escape_string($conn, $_POST['mnumber']);
$email = $_SESSION["email"];
$caddress = mysqli_real_escape_string($conn, $_POST['caddress']);

$sql = "UPDATE account SET fname='$fname', lname ='$lname', mnumber='$mnumber', caddress = '$caddress' WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
	$sql = "SELECT * FROM account WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$_SESSION["fname"] = $row['fname'];
	$_SESSION["lname"] = $row['lname'];
	$_SESSION["mnumber"] = $row['mnumber'];
	$_SESSION["caddress"] = $row['caddress'];
  	echo "1";
} else {
  	echo "2";
}
mysqli_close($conn);
?>