<?php
include("connect.php");

$sql = "TRUNCATE TABLE history";

if ($conn->query($sql) === TRUE) {

    $sql = "TRUNCATE TABLE `order`";

    if ($conn->query($sql) === TRUE) {

        echo "1";

    } else {

        echo "2";

    }

} else {

    echo "3";

}
mysqli_close($conn);
?>