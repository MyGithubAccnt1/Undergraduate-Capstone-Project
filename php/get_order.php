<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];

$sql = "SELECT * FROM history WHERE email = '$email' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '
    <div class="row">
        <div>
            <small><b>NAME</b></small>
        </div>
        <div>
            <small><b>TOTAL</b></small>
        </div>
        <div>
            <small><b>STATUS</b></small>
        </div>
        <div>
            <small><b>DATE</b></small>
        </div>
    </div>
    ';
    $id = 0;
    $date = "";
    $detailsArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $id + 1;
        echo '
        <div class="row" type="button" onclick="open_order(\'' . $row["deyt"] . '\');" id="'. $row['deyt'] .'">
            <div>
                '. $row["title"] .'
            </div>
            <div>
        ';
        if ($row["total"] === 'Estimating...') {
            echo '
                '. $row["total"] .'
            ';
        } else {
            echo '
                ₱'. $row["total"] .'
            ';
        }
        echo '
            </div>
            <div>
                '. $row["status"] .'
            </div>
            <div>
                '. $row["deyt"] .'
            </div>
            <input type="hidden" name="id" value="'. $id .'">
        </div>
        ';
    }
    mysqli_free_result($result);
} else {
    echo '
    <div class="row">
        <small style="width: 100%; text-align: center; margin-block: auto;">
            There is no history of order.
        </small>
    </div>
    ';
}
mysqli_close($conn);
?>