<?php
include("connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM product WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo'
    <h1 class="text-center bg-dark text-white">PREVIEW</h1>
    <p class="mt-3 mb-1"><small>Product Name: ' . $row['title'] . '</small></p>
    <p class="mb-1"><small>Product Description: ' . $row['description'] . '</small></p>
    <p class="mb-1"><small>Product Price: ₱' . $row['price'] . '</small></p>
    <p class="mb-1"><small>Product Thumbnail:</small></p>
    <div class="w-100">
        <img src="../' . $row['thumbnail'] . '" style="width: 50%; margin-inline: 25%;">
    </div>
    ';
    mysqli_free_result($result);
}
mysqli_close($conn);
?>
