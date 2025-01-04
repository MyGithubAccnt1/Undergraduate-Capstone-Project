<?php
session_start(); 
include("connect.php");
$password = mysqli_real_escape_string($conn, $_POST['old_password']);
$new_password = mysqli_real_escape_string($conn, $_POST['password']);
$email = $_SESSION["email"];


$sql = "SELECT * FROM account WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 1) {
	$row = mysqli_fetch_assoc($result);
	$database_password = $row['password'];
	if (password_verify($password, $database_password)) {
		$new_password = password_hash($new_password, PASSWORD_DEFAULT);
		$sql = "UPDATE account SET password = '$new_password' WHERE email='$email'";

		if ($conn->query($sql) === TRUE) {
	  		echo "2";
		}
	} else {
		echo '1';
	}
}
mysqli_close($conn);
?>