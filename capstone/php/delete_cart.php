<?php
include("connect.php");

// Escape user inputs for 
$id = mysqli_real_escape_string($conn, $_REQUEST['id']);

$sql = "DELETE FROM cart WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo"<script>alert('Notice: An item has been deleted successfully!')</script>";
  $script = "<script>window.location = '../account.php';</script>";
  echo $script;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  sleep(2); 
  header("Location: ../account.php");
}
$conn->close();
?>