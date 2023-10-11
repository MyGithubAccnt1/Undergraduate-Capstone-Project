<?php
include("connect.php");
$id = $_POST["id"];
$title = mysqli_real_escape_string($conn, $_POST["title"]);
if ($id === "") {

} else {

    $sql = "DELETE FROM product WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {

        echo "1";

        $notifmessage = "An [Admin] has deleted a product with a title of [". $title ."].";
        $notifcategory = "log";
        $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
        $notifresult = mysqli_query($conn, $notifsql);

    } else {

        echo "2";
        
    }
    
}
mysqli_close($conn);
?>
