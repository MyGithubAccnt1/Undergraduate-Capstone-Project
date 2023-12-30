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

if (empty($block)) {

} else {

	$blocks = ['BLOCK', 'Block', 'block', 'BLK', 'Blk', 'blk'];
	$try = false;
	foreach ($blocks as $keyword) {
	    if (stripos($block, $keyword) !== false) {
	        $try = true;
	        break;
	    }
	}
	if ($try === true) {
	    $caddress = $block;
	} else {
		$caddress = 'Blk. ' . $block;
	}

}

if (empty($lot)) {

} else {

	$lots = ['LOT', 'Lot', 'lot', 'LT', 'Lt', 'lt'];
	$try = false;
	foreach ($lots as $keyword) {
	    if (stripos($block, $keyword) !== false) {
	    	$try = true;
	        break;
	    }
	}
	if ($try === true) {
	    $caddress = $caddress . ' ' . $lot;
	} else {
		$caddress = $caddress . ' Lot ' . $lot;
	}

}

if (empty($street)) {

} else {

	$streets = ['STREET', 'Street', 'street', 'ST', 'St', 'st'];
	$try = false;
	foreach ($streets as $keyword) {
	    if (stripos($block, $keyword) !== false) {
	        $try = true;
	        break;
	    }
	}
	if ($try === true) {
	    $caddress = $caddress . ' ' . $street;
	} else {
		$caddress = $caddress . ' ' . $street . ' St.';
	}

}

if (empty($phase)) {

} else {

	$phases = ['PHASE', 'Phase', 'phase', 'PH', 'Ph', 'ph'];
	$try = false;
	foreach ($phases as $keyword) {
	    if (stripos($block, $keyword) !== false) {
	        $try = true;
	        break;
	    }
	}
	if ($try === true) {
	    $caddress = $caddress . ' ' . $phase;
	} else {
		$caddress = $caddress . ' Ph. ' . $phase;
	}

}

if (empty($subdivision)) {

} else {

	$subdivisions = ['SUBDIVISION', 'Subdivision', 'subdivision', 'SUBD', 'Subd', 'subd'];
	$try = false;
	foreach ($subdivisions as $keyword) {
	    if (stripos($block, $keyword) !== false) {
	        $try = true;
	        break;
	    }
	}
	if ($try === true) {
	    $caddress = $caddress . ', ' . $subdivision;
	} else {
		$caddress = $caddress . ', ' . $subdivision . ' Subd.';
	}

}

$caddress = $caddress . ' Bgry. ' . $barangay . ', ' . $city . ', ' . $province . ', ' . $region . ', ' . $country;

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