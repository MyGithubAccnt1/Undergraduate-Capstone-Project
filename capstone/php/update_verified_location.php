<?php
session_start(); 
include("connect.php");

$caddress = mysqli_real_escape_string($conn, $_GET['caddress']);
$email = $_SESSION["email"];

$sql = "SELECT * FROM account WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        if (!$row['verified_location']) {
            $updateSql = "UPDATE account SET verified_location = ? WHERE email = ?";
            $stmt = $conn->prepare($updateSql);
            $stmt->bind_param("ss", $caddress, $email);
            $stmt->execute();
            echo $caddress;
        } else {
            echo $row['verified_location'];
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