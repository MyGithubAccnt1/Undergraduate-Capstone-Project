<?php
include("connect.php");
$id = $_GET["id"];
$sql = "SELECT * FROM inventory WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo '
    <form id="change_material" class="container p-3">
        <input type="hidden" value="' . $row['id'] . '" name="id">
        <p class="mb-3"><small>Edit Material Details</small></p>
        <p class="mb-2">
            <small>Product Name: <input type="text" name="material" value="'. $row['material'] .'" required></small>
        </p>
        <p class="mb-2">
            <small>Quantity: <input type="text" name="quantity" value="'. $row['quantity'] .'" oninput="validate(this)" required></small>
        </p>
        <p class="mb-2">
            <small>Category: <input type="text" name="category" value="'. $row['category'] .'" required></small>
        </p>
        <button type="submit" class="btn btn-outline-success rounded-pill btn-sm w-50 mx-auto">Submit</button>
    </form>
    ';
}
mysqli_close($conn);
?>
