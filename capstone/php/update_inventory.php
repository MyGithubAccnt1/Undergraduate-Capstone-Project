<?php
include("connect.php");
$id = $_POST["id"];
$material = mysqli_real_escape_string($conn, $_POST["material"]);
$quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
$category = mysqli_real_escape_string($conn, $_POST["category"]);
if ($id === "") {

} else {
    if ($material === "") {
        $material = "Empty";
    }
    if ($quantity <= 0) {
        $quantity = 0;
    }else if ($quantity === ""){
        $quantity = 0;
    }
    if ($category === "") {
        $category = "Empty";
    }
    $sql = "UPDATE inventory SET material = '$material', quantity = '$quantity', category = '$category' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
