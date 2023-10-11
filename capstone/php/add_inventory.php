<?php
include("connect.php");
$material = mysqli_real_escape_string($conn, $_POST["material"]);
$quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
$category = mysqli_real_escape_string($conn, $_POST["category"]);
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
$sql = "INSERT INTO inventory (material, quantity, category) VALUES ('$material', '$quantity', '$category')";
if (mysqli_query($conn, $sql)) {

} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
