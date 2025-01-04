<?php
include("connect.php");
$id = $_POST['id'];
$comment = 'An administrator deleted this comment.';
$sql = "UPDATE comments SET comment = '$comment' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
?>
