<?php
include("connect.php"); // Include your database connection
$action = isset($_POST['action']) ? $_POST['action'] : '';
$formData = isset($_POST['formData']) ? $_POST['formData'] : '';

$formDataArray = [];
parse_str($formData, $formDataArray);

$email = mysqli_real_escape_string($conn, $formDataArray['email']);
$date = mysqli_real_escape_string($conn, $formDataArray['date']);
$status = "";

if ($action === "otw") {

	$status = "On-The-Way";

}else if ($action === "delivered") {

	$status = "Delivered";

}else if ($action === "rejected") {

	$status = "Rejected";

}else{

	$status = "Pending";
}

$stmt = $conn->prepare("UPDATE history SET status = ? WHERE email = ? AND deyt = ?");
$stmt->bind_param("sss", $status, $email, $date);
$stmt->execute();

$stmt->close();
$conn->close(); // Close the database connection
?>
