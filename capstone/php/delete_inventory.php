<?php
include("connect.php");
$id = $_POST["id"];
if ($id === "") {

} else {
    $sql = "DELETE FROM inventory WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
