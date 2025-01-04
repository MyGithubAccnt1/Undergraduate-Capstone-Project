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
            <small>Material: <input type="text" name="material" value="'. $row['material'] .'" required></small>
        </p>
        <p class="mb-2">
            <small>Quantity: <input type="text" name="quantity" value="'. $row['quantity'] .'" oninput="validate(this)" required></small>
        </p>
        <div class="container mb-2">
            <div class="row">
                <div class="col-sm-12 col-md-4 text-md-end text-lg-end">
                    <small>Category:</small>
                </div>
                <div class="col-sm-12 col-md-8 text-md-start text-lg-start">
                    <small>
                        <select name="category">
    ';
                    if ($row['category'] === 'Logo') {
                        echo '
                            <option value="Other">Other</option>
                            <option value="Logo" selected>Logo Seal</option>
                            <option value="Necklace">Necklace</option>
                            <option value="Table">Table Nameplate</option>
                        ';
                    } else if ($row['category'] === 'Necklace') {
                        echo '
                            <option value="Other">Other</option>
                            <option value="Logo">Logo Seal</option>
                            <option value="Necklace" selected>Necklace</option>
                            <option value="Table">Table Nameplate</option>
                        ';
                    } else if ($row['category'] === 'Table') {
                        echo '
                            <option value="Other">Other</option>
                            <option value="Logo">Logo Seal</option>
                            <option value="Necklace">Necklace</option>
                            <option value="Table" selected>Table Nameplate</option>
                        ';
                    } else {
                        echo '
                            <option value="Other" selected>Other</option>
                            <option value="Logo">Logo Seal</option>
                            <option value="Necklace">Necklace</option>
                            <option value="Table">Table Nameplate</option>
                        ';
                    }
    echo '
                        </select>
                    </small>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success rounded-pill btn-sm w-50 mx-auto">Submit</button>
    </form>
    ';
}
mysqli_close($conn);
?>
