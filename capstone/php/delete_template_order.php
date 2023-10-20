<?php
include("connect.php");
$id = $_POST["id"];
if ($id === "") {

} else {

    $sql = "DELETE FROM history WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {

        echo "1";

        $notifmessage = "An [Admin] has deleted an ordered template with an id of [". $id ."].";
        $notifcategory = "log";
        $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
        $notifresult = mysqli_query($conn, $notifsql);

    } else {

        echo "2";
        
    }
    
}
mysqli_close($conn);
?>
