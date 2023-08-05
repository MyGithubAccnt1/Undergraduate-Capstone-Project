<?php
// $servername = "sql202.epizy.com";
// $username = "epiz_32646408";
// $password = "OXAEzejQNYFM7Rj";
// $dbname = "epiz_32646408_gcp";

// ssh -L 8000:localhost:80 Myadmin@20.205.112.210
// t@yOn2x/Gnk,
// sudo cat /opt/bitnami/apache/logs/error_log

$servername = "localhost";
$username = "root";
$password = "t@yOn2x/Gnk,"; //let password be blank for xampp $password = "";
$dbname = "sbm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
