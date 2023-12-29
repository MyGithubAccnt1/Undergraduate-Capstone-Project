<?php
session_start(); 
include("connect.php");
$email = $_SESSION["email"];
$country = $_SESSION["country"];
$region = mysqli_real_escape_string($conn, $_POST['region']);
$province = mysqli_real_escape_string($conn, $_POST['province']);
$city = mysqli_real_escape_string($conn, $_POST['city']);
$barangay = mysqli_real_escape_string($conn, $_POST['barangay']);
$subdivision = mysqli_real_escape_string($conn, $_POST['subdivision']);
$street = mysqli_real_escape_string($conn, $_POST['street']);
$phase = mysqli_real_escape_string($conn, $_POST['phase']);
$block = mysqli_real_escape_string($conn, $_POST['block']);
$lot = mysqli_real_escape_string($conn, $_POST['lot']);
$caddress = '';

if (empty($phase)) {

} else {
	$caddress = $phase;
}

if (empty($block)) {

} else {
	$caddress = $caddress . ', ' . $block;
}

if (empty($lot)) {

} else {
	$caddress = $caddress . ', ' . $lot;
}

if (empty($street)) {

} else {
	$caddress = $caddress . ', ' . $street;
}

if (empty($subdivision)) {

} else {
	$caddress = $caddress . ', ' . $subdivision;
}

$caddress = $caddress . ', ' . $barangay . ', ' . $city . ', ' . $province . ', ' . $region . ', ' . $country;

$sql = "UPDATE account SET caddress = '$caddress', region = '$region', province = '$province', city = '$city', barangay = '$barangay', subdivision = '$subdivision', street = '$street', phase = '$phase', block = '$block', lot = '$lot' WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
	$sql = "SELECT * FROM account WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$_SESSION["caddress"] = $row['caddress'];
  	echo "1";
} else {
  	echo "2";
}
mysqli_close($conn);
?>