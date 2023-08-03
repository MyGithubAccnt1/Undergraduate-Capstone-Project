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
	echo"<script>alert('Notice: This email is already used. Please try another email.')</script>";
	$script = "<script>window.location = 'signin.php';</script>";
	echo $script;
} else {
	$date = date('Y-m-d H:i');
	$sql = "INSERT INTO account (email, password, role, deyt) VALUES ('$email','$password','Regular','$date')";
	if ($conn->query($sql) === TRUE) {
		$sql = "SELECT * FROM account WHERE email = '$email' and password = '$password'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$_SESSION["id"] = $row['id'];
		$_SESSION["email"] = $row['email'];
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
	  	echo"<script>alert('Notice: An account is successfully created.')</script>";
	  	$script = "<script>window.location = 'index.php';</script>";
	  	echo $script;
	} else {
	  	echo "Error: " . $sql . "<br>" . $conn->error;
	  	sleep(2); 
	  	header("Location: signin.php");
	}
}
$conn->close();
?>
