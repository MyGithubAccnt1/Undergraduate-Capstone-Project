<?php
session_start(); 
include("connect.php");

// Escape user inputs for security
$password = mysqli_real_escape_string($conn, $_REQUEST['password']);
$new_password = mysqli_real_escape_string($conn, $_REQUEST['new_password']);
$email = $_SESSION["email"];

$sql = "SELECT * FROM account WHERE email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) === 1) {

	$sql = "UPDATE account SET password = '$new_password' WHERE email='$email'";

	if ($conn->query($sql) === TRUE) {

  		echo"<script>alert('Notice: Password has been updated!')</script>";
  		$script = "<script>window.location = 'logout.php';</script>";
  		echo $script;

	} else {

	  	echo "Error: " . $sql . "<br>" . $conn->error;
	  	sleep(2); 
	  	header("Location: ../account.php");

	}

} else {

 	echo"<script>alert('Notice: Old password is incorrect.')</script>";
  	$script = "<script>window.location = '../account.php';</script>";
  	echo $script;

}
$conn->close();
?>