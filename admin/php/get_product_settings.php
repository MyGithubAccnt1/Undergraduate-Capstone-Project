<?php
include("connect.php");
$id = $_GET["id"];

$sql = "SELECT * FROM product WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo '
    <form id="change_product">
        <input type="hidden" value="' . $row['id'] . '" name="id">
        <h1 class="text-center bg-dark text-white">EDIT DETAILS</h1>
        <p class="mb-2">
            <small>Product Name: <input type="text" name="title" value="'. $row['title'] .'" required></small>
        </p>
        <div class="mb-2" style="display: flex; flex-direction: column; gap: 3px 0;">
            <small>Product Description: </small>
            <small><textarea rows="5" style="resize: none; width: 100% !important;" type="text" name="description" required>'. $row['description'] .'</textarea></small>
        </div>
        <p class="mb-2">
            <small>Product Price: <input type="text" name="price" value="'. $row['price'] .'" oninput="validate(this)" required></small>
        </p>
        <button type="submit" class="btn btn-outline-success rounded-pill btn-sm w-50 mx-auto">Submit</button>
    </form>
    <form class="container p-3" action="./php/upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="' . $row['id'] . '" name="id">
        <p class="mb-3" style="display: flex; flex-direction: column; align-items: start; gap: 3px;">
            <small>Product Thumbnail: </small>
            <small><input type="file" name="image" accept="image/png" required></small>
            <button type="submit" class="btn btn-outline-success rounded-pill btn-sm w-50 mx-auto"><small>Upload Image</small></button>
        </p>
    </form>
    ';
}
mysqli_close($conn);
?>
