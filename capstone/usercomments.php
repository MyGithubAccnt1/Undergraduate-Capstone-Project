<?php
session_start(); 
include("connect.php");
$name_entered= $_POST['name'];
$comment_entered= $_POST['comment'];
$table= $_POST['webpage'];
$date = date('Y-m-d H:i');
$sql = ("INSERT INTO $table (name, date, comments) VALUES ('$name_entered', '$date', '$comment_entered')");
if ($conn->query($sql) === TRUE) {
  $sql = ( "SELECT * FROM $table ORDER BY ID DESC" ) or die("SELECT Error: ".mysql_error()); 
  $result = mysqli_query($conn, $sql);
  while ($row = mysql_fetch_array($result)){ 
    $name_field= $row['name'];
    $date_field= $row['date'];
    $comment_field= $row['comments'];
    echo '<div class="card p-3 mx-4">';
    echo '<div class="d-flex justify-content-between align-items-center">';
    echo '<div class="d-flex flex-row align-items-center">';
    echo "($date_field) <br>";
    echo '<span><small class="font-weight-bold text-primary">User: '.$name_field.'</small> <small class="font-weight-bold">'.$comment_field.'</small></span>';
    echo "</div></div></div>";
  }
}
else
{
    echo"<script>alert('Notice: Comment is not yet configured by the admin.')</script>";
   	$script = "<script>window.location = 'preview.php';</script>";
   	echo $script;
}
$conn->close();
?> 
