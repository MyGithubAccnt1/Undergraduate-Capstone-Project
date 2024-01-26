<?php
$servername = "localhost";
$username = "root";
$password = "t@yOn2x/Gnk,";
$dbname = "sbm";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
