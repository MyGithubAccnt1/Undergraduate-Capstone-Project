<?php
include("connect.php");

$sql = "TRUNCATE TABLE cart";

if ($conn->query($sql) === TRUE) {

    echo "1";

} else {

    echo "2";

}
mysqli_close($conn);
?>