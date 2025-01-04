<?php
include("connect.php");
$id = $_POST["id"];

$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
    $date = $row['deyt'];
    $status = $row['status'];
    
    if ($status === 'Processing') {
        $sql = "SELECT * FROM `order` WHERE email = '$email' AND deyt = '$date'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (!is_null($row['details'])) {
                    $order_quantity = $row['qty'];
                    $detailsArray = explode(', ', $row['details']);
                    foreach ($detailsArray as $value) {
                        if (strpos($value, ':') !== false) {
                            $details = explode(': ', $value);
                            if ($details[0] === 'Product') {
                                $newDetails = explode(' ', $details[1]);
                                $product = ucfirst($newDetails[0]);
                            } else if ($details[0] === 'Material') {
                                $material = ucfirst($details[1]);
                            }
                        }
                    }

                    $sql_select_popularity = "SELECT * FROM product WHERE category = '$product'";
                    $result_select_popularity = mysqli_query($conn, $sql_select_popularity);
                    if (mysqli_num_rows($result_select_popularity) > 0) {
                        while ($row_select_popularity = mysqli_fetch_assoc($result_select_popularity)) {
                            $popularity = $row_select_popularity['popularity'] + $order_quantity;
                            $id = $row_select_popularity['id'];
                            $sql_update_popularity = "UPDATE product SET popularity = '$popularity' WHERE id = '$id'";
                            $result_update_popularity = mysqli_query($conn, $sql_update_popularity);
                        }
                    }
            
                    $sql_inventory = "SELECT * FROM inventory WHERE category = '$product' AND material = '$material'";
                    $result_inventory = mysqli_query($conn, $sql_inventory);
                    if (mysqli_num_rows($result_inventory) > 0) {
                        $row_inventory = mysqli_fetch_assoc($result_inventory);
                        $material_quantity = $row_inventory['quantity'];
                        $quantity = $material_quantity - $order_quantity;
                        $sql_update = "UPDATE inventory SET quantity = '$quantity' WHERE category = '$product' AND material = '$material'";
                        $result_update = mysqli_query($conn, $sql_update);

                        $sql_check = "SELECT * FROM inventory WHERE category = '$product' AND material = '$material'";
                        $result_check = mysqli_query($conn, $sql_inventory);
                        if (mysqli_num_rows($result_check) > 0) {
                            $row_check = mysqli_fetch_assoc($result_check);
                            $quantity_check = $row_check['quantity'];
                            if ($quantity_check <= 50) {
                                echo "Yes";
                            } else {
                                echo "No";
                            }
                        }
                    }
                } else {
                    $order_quantity = $row['qty'];
                    $product = 'Necklace';
                    $material = 'Gold';
                    $title = $row['title'];

                    $sql_select_product = "SELECT * FROM product WHERE title = '$title'";
                    $result_select_product = mysqli_query($conn, $sql_select_product);
                    if (mysqli_num_rows($result_select_product) > 0) {
                        $row_select_product = mysqli_fetch_assoc($result_select_product);
                        $popularity = $row_select_product['popularity'] + $order_quantity;
                        $id = $row_select_product['id'];
                        $sql_update_product = "UPDATE product SET popularity = '$popularity' WHERE id = '$id'";
                        $result_update_product = mysqli_query($conn, $sql_update_product);
                    }

                    $sql_inventory = "SELECT * FROM inventory WHERE category = '$product' AND material = '$material'";
                    $result_inventory = mysqli_query($conn, $sql_inventory);
                    if (mysqli_num_rows($result_inventory) > 0) {
                        $row_inventory = mysqli_fetch_assoc($result_inventory);
                        $material_quantity = $row_inventory['quantity'];
                        $quantity = $material_quantity - $order_quantity;
                        $sql_update = "UPDATE inventory SET quantity = '$quantity' WHERE category = '$product' AND material = '$material'";
                        $result_update = mysqli_query($conn, $sql_update);
                    }
                }
            }

            $sql_check = "SELECT * FROM inventory WHERE category = 'Necklace' AND material = 'Gold'";
            $result_check = mysqli_query($conn, $sql_inventory);
            if (mysqli_num_rows($result_check) > 0) {
                $row_check = mysqli_fetch_assoc($result_check);
                $quantity_check = $row_check['quantity'];
                if ($quantity_check <= 50) {
                    echo "Yes";
                } else {
                    echo "No";
                }
            }
        }
    }
}
mysqli_close($conn);
?>
