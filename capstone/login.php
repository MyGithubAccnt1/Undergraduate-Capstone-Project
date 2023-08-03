<?php
session_start(); 
include("connect.php");

// Escape user inputs for security
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$password = mysqli_real_escape_string($conn, $_REQUEST['password']);

$sql = "SELECT * FROM account WHERE email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION["id"] = $row['id'];
$_SESSION["email"] = $row['email'];
if($row['fname'] > 0) {
	$_SESSION["fname"] = $row['fname'];
}else{
	$_SESSION["fname"] = '';
}
if($row['lname'] > 0) {
	$_SESSION["lname"] = $row['lname'];
}else{
	$_SESSION["lname"] = '';
}
if($row['mnumber'] > 0) {
	$_SESSION["mnumber"] = $row['mnumber'];
}else{
	$_SESSION["mnumber"] = '';
}
if($row['caddress'] > 0) {
	$_SESSION["caddress"] = $row['caddress'];
}else{
	$_SESSION["caddress"] = '';
}
// If result matched $myusername and $mypassword, table row must be 1 row
if(mysqli_num_rows($result) === 1) {
	if($row['role'] === "Admin") {
		echo"<script>alert('Notice: Login Successful!')</script>";
   		$script = "<script>window.location = 'admin.html';</script>";
   		echo $script;
	}else{
		echo"<script>alert('Notice: Login Successful!')</script>";
   		$script = "<script>window.location = 'account.php';</script>";
   		echo $script;
	}
}else {
 	echo"<script>alert('Notice: Invalid Email or Password.')</script>";
  	$script = "<script>window.location = 'signin.php';</script>";
  	echo $script;
}
$conn->close();
?>
