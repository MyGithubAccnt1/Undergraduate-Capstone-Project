<?php
include('connect.php');

$email = mysqli_real_escape_string($conn, $_POST["email"]);

$sql = "SELECT * FROM account WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "1";
    mysqli_free_result($result);
} else {
    echo "2";
}
mysqli_close($conn);
?>