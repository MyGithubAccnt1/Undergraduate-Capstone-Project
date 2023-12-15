<?php
include("connect.php");
$email = $_POST["email"];
$deyt = $_POST["deyt"];
$product = $_POST["product"];

$checksql = "SELECT * FROM history WHERE email = '$email' and deyt = '$deyt'";
$checkresult = mysqli_query($conn, $checksql);
if (mysqli_num_rows($checkresult) > 0) {
    echo "1";
    exit;
} else {
    $front = "";
    $back = "";
    $gettemplatesql = "SELECT front, back FROM template WHERE email = '$email' and deyt = '$deyt' and product = '$product'";
    $result = mysqli_query($conn, $gettemplatesql);
    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $front = $row['front'];
        $back = $row['back'];

        if (empty($front)) {

        } else {
             
            $objectsql = "DELETE FROM object WHERE email = '$email' and deyt = '$front' and product = '$product'";

        }

        if (empty($back)) {

        } else {
             
            $objectsql = "DELETE FROM object WHERE email = '$email' and deyt = '$back' and product = '$product'";
             
        }

        if (mysqli_query($conn, $objectsql)) {

            $gettemplatesql = "SELECT thumbnail FROM template WHERE email = '$email' and deyt = '$deyt' and product = '$product'";
            $result = mysqli_query($conn, $gettemplatesql);
            if (mysqli_num_rows($result) > 0) {
                $row = $result->fetch_assoc();
                $imageFile = $row['thumbnail'];
                if (file_exists("../" . $imageFile)) {
                    unlink("../" . $imageFile);
                }
            }

            $templatesql = "DELETE FROM template WHERE email = '$email' and deyt = '$deyt' and product = '$product'";
            if (mysqli_query($conn, $templatesql)) {

            } else {
                echo "Error: " . mysqli_error($conn);
            }

        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }    
}
mysqli_close($conn);
?>
