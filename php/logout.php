<?php 
session_start();
include("connect.php");
$email = $_SESSION['email'];
$newsql = "UPDATE account SET status = 'Offline' WHERE email = '$email'";

if (mysqli_query($conn, $newsql)) {
    
} else {
    echo "Error: " . mysqli_error($conn);
}
$conn->close();

session_unset();

session_destroy();

$script = "<script>window.location = '../signin.php';</script>";
echo $script;

?>