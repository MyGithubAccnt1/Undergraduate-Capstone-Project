<?php
session_start(); 
include("connect.php");
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT * FROM account WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) === 1) {

	$sql = "UPDATE account SET password = '$password' WHERE email = '$email'";

	if ($conn->query($sql) === TRUE) {

  		echo "1";

	} else {

	  	echo "2";

	}

}
mysqli_close($conn);
?>