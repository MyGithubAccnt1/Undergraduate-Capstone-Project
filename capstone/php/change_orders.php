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

}else if ($action === "reviewed") {

	$status = "Reviewed";

}else if ($action === "impossible") {

	$status = "Impossible";

}else{

	$status = "Pending";
}

$stmt = $conn->prepare("UPDATE history SET status = ? WHERE email = ? AND deyt = ?");
$stmt->bind_param("sss", $status, $email, $date);
$stmt->execute();

$notifmessage = "An [Admin] has changed an order status of [". $email ."] from [". $date ."] to [". $status ."].";
$notifcategory = "log";
$notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
$notifresult = mysqli_query($conn, $notifsql);

$stmt->close();
mysqli_close($conn);
?>
