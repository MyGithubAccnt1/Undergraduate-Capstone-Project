<?php
session_start(); 
include("connect.php");

$address = mysqli_real_escape_string($conn, $_GET['address']);
$email = $_SESSION["email"];

$sql = "SELECT * FROM account WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        if (!$row['verified_location']) {
            $updateSql = "UPDATE account SET verified_location = ? WHERE email = ?";
            $stmt = $conn->prepare($updateSql);
            $stmt->bind_param("ss", $address, $email);
            $stmt->execute();
            echo $address;
        } else {
            echo $address;
        }
    } else {
        echo "Email not found";
    }

    mysqli_free_result($result);
} else {
    echo "Query failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>