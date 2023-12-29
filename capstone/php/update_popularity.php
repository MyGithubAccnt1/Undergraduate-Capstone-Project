<?php
include("connect.php");
$title = mysqli_real_escape_string($conn, $_POST['title']);
$thumbnail = mysqli_real_escape_string($conn, $_POST['thumbnail']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$category = mysqli_real_escape_string($conn, $_POST['category']);

$sql = "SELECT popularity FROM product WHERE title = '$title' and thumbnail = '$thumbnail' and price = '$price' and description = '$description' and category = '$category'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$popularity = $row['popularity'] + 1;

if(mysqli_num_rows($result) === 1) {

	$sql = "UPDATE product SET popularity = '$popularity' WHERE title = '$title' and thumbnail = '$thumbnail' and price = '$price' and description = '$description' and category = '$category'";

	if (mysqli_query($conn, $sql)) {
		echo '1';
	}

}
mysqli_close($conn);
?>