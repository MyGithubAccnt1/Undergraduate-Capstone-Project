<?php
include("connect.php");
$id = $_POST["id"];
$price = mysqli_real_escape_string($conn, $_POST["price"]);
if ($id === "") {

} else {

    $sql = "SELECT * FROM history WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($price <= 0) {
                $price = $row['price'];
            }else if ($price === ""){
                $price = $row['price'];
            }
            $input_email = $row['input_email'];
        }

        $sql = "UPDATE history SET total = '$price' WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {

            echo "2";

            $notifmessage = "An [Admin] has updated a template price of [". $input_email ."].";
            $notifcategory = "log";
            $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
            $notifresult = mysqli_query($conn, $notifsql);

        } else {

            echo "3";
            
        }

    } else {

        echo "1";

    }
    
}
mysqli_close($conn);
?>
