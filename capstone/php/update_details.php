<?php
session_start(); 
include("connect.php");

// Escape user inputs for security
$fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
$mnumber = mysqli_real_escape_string($conn, $_REQUEST['mnumber']);
$email = $_SESSION["email"];
$caddress = mysqli_real_escape_string($conn, $_REQUEST['caddress']);

$sql = "UPDATE account SET fname='$fname', lname ='$lname', mnumber='$mnumber', caddress = '$caddress' WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
	$sql = "SELECT * FROM account WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$_SESSION["id"] = $row['id'];
	$_SESSION["email"] = $row['email'];
	$_SESSION["fname"] = $row['fname'];
	$_SESSION["lname"] = $row['lname'];
	$_SESSION["fname"] = $row['fname'];
	$_SESSION["mnumber"] = $row['mnumber'];
	$_SESSION["caddress"] = $row['caddress'];
  	echo"<script>alert('Notice: Account details has been updated!')</script>";
  	$script = "<script>window.location = '../account.php';</script>";
  	echo $script;
} else {
  	echo "Error: " . $sql . "<br>" . $conn->error;
  	sleep(2); 
  	header("Location: ../account.php");
}
$conn->close();
?>