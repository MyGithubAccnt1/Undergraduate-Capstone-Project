<?php
include("connect.php");

// Escape user inputs for security
$id = $_POST['id'];
$qty = $_POST['qty'];
$price = $_POST['price'];
if ($qty > 1){
    $qty = $qty - 1;
}else{
    
}
$total = $qty * $price;

$sql = "UPDATE cart SET qty='$qty', total='$total' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
}

mysqli_close($conn);
?>
