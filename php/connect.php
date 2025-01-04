<?php
// ssh -L 8000:localhost:80 Myadmin@20.205.112.210
// t@yOn2x/Gnk,
// 12345678910admin!
// sudo cat /opt/bitnami/apache/logs/error_log
// sudo chown -R bitnami:daemon /opt/bitnami/capstone/
// sudo chmod -R g+w /opt/bitnami/capstone/
// sudo /opt/bitnami/ctlscript.sh restart apache
// ls /opt/bitnami/capstone/htdocs/capstone
// sudo rm filename
// sudo rm -r directoryname

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbm";

// $servername = "sql107.infinityfree.com";
// $username = "if0_36072249";
// $password = "oa063CnKpKJ";
// $dbname = "if0_36072249_sbm";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>