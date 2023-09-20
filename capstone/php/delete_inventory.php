<?php
include("connect.php");
$id = $_POST["id"];
$material = $_POST["material"];
$quantity = $_POST["quantity"];
$category = $_POST["category"];
$material = mysqli_real_escape_string($conn, $material);
$quantity = mysqli_real_escape_string($conn, $quantity);
$category = mysqli_real_escape_string($conn, $category);
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
