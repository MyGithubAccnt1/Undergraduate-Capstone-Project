<?php
session_start(); 
include("connect.php");
if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $sql = "SELECT COUNT(*) AS total_rows FROM cart WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "(0)";
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '('. $row["total_rows"] .')';
        } else {
            echo "(0)";
        }
    }
}
mysqli_close($conn);
?>