<?php
session_start();
include('connect.php');
if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM notification WHERE email = '$email' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
        echo '
        <div class="row">
        ';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
                <div type="button" class="col-12" onclick="redirect(\'' . htmlspecialchars($row["redirect"], ENT_QUOTES, 'UTF-8') . '\');">
                    <small>'. $row["message"] .'</small>
                </div>
            ';
        }
        echo '
        ';
        mysqli_free_result($result);
    } else {
        echo '
        <div class="row my-auto">
            <small class="py-2" style="width: 100%; text-align: center; margin-block: auto;">
                You don`t have notifications.
            </small>
        </div>
        ';
    }
}
mysqli_close($conn);
?>