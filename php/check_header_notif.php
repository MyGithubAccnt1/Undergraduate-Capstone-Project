<?php
session_start();
include('connect.php');
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $yes = 'Yes';
    $sql = "SELECT * FROM notification WHERE email = '$email' AND unread = '$yes' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        
        echo 'Yes';

    } else {

        echo 'No';
    
    }
}
mysqli_free_result($result);
mysqli_close($conn);
?>