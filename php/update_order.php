<?php
session_start();
include('connect.php');
$id = $_POST['id'];
$payment = $_POST['payment'];
$proof = $_POST['proof'];

$sql = "SELECT * FROM history WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['proof'] !== null) {
        $proof = $row['proof'] .', '. $proof;
    }
    $sql = "UPDATE history SET payment = '$payment', proof = '$proof' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "1";
    }
}
mysqli_close($conn);
?>
