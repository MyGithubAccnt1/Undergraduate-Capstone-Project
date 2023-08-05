<?php
session_start(); 
include("connect.php");

// Escape user inputs for security
$title = mysqli_real_escape_string($conn, $_REQUEST['customize']);

$_SESSION["title"] = $title;

$script = "<script>window.location = 'make-customize.php';</script>";
echo $script;

$conn->close();
?>
