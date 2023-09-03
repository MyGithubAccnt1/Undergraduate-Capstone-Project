<?php
// ssh -L 8000:localhost:80 Myadmin@20.205.112.210
// t@yOn2x/Gnk,

$servername = "localhost";
$username = "root";
$password = "t@yOn2x/Gnk";
$dbname = "sbm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
