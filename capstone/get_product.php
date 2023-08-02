<?php
session_start(); 
include("connect.php");

// Escape user inputs for security
$title = mysqli_real_escape_string($conn, $_REQUEST['title']);

$sql = "SELECT * FROM product WHERE title = '$title'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_SESSION["title"] = $row['title'];
$_SESSION["price"] = $row['price'];
$_SESSION["description"] = $row['description'];
$_SESSION["thumbnail"] = $row['thumbnail'];
$_SESSION["qty"] = "1";
// If result matched $myusername and $mypassword, table row must be 1 row
if(mysqli_num_rows($result) === 1) {
    $script = "<script>window.location = 'preview.php';</script>";
    echo $script;
}else {
 	echo"<script>alert('Notice: Something went wrong, please try again.')</script>";
  	$script = "<script>window.location = 'index.php';</script>";
  	echo $script;
}
$conn->close();
?>
