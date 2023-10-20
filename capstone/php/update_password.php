<?php
session_start(); 
include("connect.php");

// Escape user inputs for security
$password = mysqli_real_escape_string($conn, $_POST['old_password']);
$new_password = mysqli_real_escape_string($conn, $_POST['password']);
$email = $_SESSION["email"];

$sql = "SELECT * FROM account WHERE email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) === 1) {

	$sql = "UPDATE account SET password = '$new_password' WHERE email='$email'";

	if ($conn->query($sql) === TRUE) {

  		echo "2";

	} else {

	  	echo "3";

	}

} else {

 	echo "1";

}
mysqli_close($conn);
?>