<?php
// $servername = "sql202.epizy.com";
// $username = "epiz_32646408";
// $password = "OXAEzejQNYFM7Rj";
// $dbname = "epiz_32646408_gcp";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
