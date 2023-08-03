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
		if (!$result) {
		    // Error handling
		    die('Error in SQL query: ' . mysqli_error($conn));
		}
		$row = mysqli_fetch_assoc($result);
		if (!$row) {
		    // Handle the case when no matching row was found
		    echo 'Something went wrong.';
		} else {
		    	// Process the data from $row
		    	$_SESSION["id"] = $row['id'];
			$_SESSION["email"] = $row['email'];
			$_SESSION["fname"] = $row['fname'];
			$_SESSION["lname"] = $row['lname'];
			$_SESSION["mnumber"] = $row['mnumber'];
			$_SESSION["caddress"] = $row['caddress'];
			echo"<script>alert('Notice: An account is successfully created.')</script>";
		  	$script = "<script>window.location = 'index.php';</script>";
		  	echo $script;
		}
	} else {
	  	echo "Error: " . $sql . "<br>" . $conn->error;
	  	sleep(2); 
	  	header("Location: signin.php");
	}
}
$conn->close();
?>
