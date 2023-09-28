<?php
// ssh -L 8000:localhost:80 Myadmin@20.205.112.210
// t@yOn2x/Gnk,
// 12345678910admin!
// sudo cat /opt/bitnami/apache/logs/error_log
// sudo chown -R bitnami:daemon /opt/bitnami/capstone/
// sudo chmod -R g+w /opt/bitnami/capstone/
// sudo /opt/bitnami/ctlscript.sh restart apache
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
