<?php
session_start(); 
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $requestData = file_get_contents("php://input");
    if (!isset($requestData)) {
        echo 'Error in receiving data';
        exit;
    }

    $canvasObjects = json_decode($requestData, true);
    if (!is_array($canvasObjects)) {
        echo 'Error in JSON data format';
        exit;
    }

    $email = $canvasObjects['email'];
    $date = $canvasObjects['deyt'];
    $view = $canvasObjects['view'];
    $product = $canvasObjects['product'];

    if (empty($email) || $email != $_SESSION['email']) {

        $new_email = $_SESSION['email'];
        $new_date = date('Y-m-d H:i');
    
        foreach ($canvasObjects as $obj) {

            foreach ($obj as $new) {

                if (isset($new['objectType']) && isset($new['properties'])) {

                    $viewsql = "SELECT * FROM template WHERE email = '$new_email' and deyt = '$new_date' and product = '$product'";
                    $viewresult = mysqli_query($conn, $viewsql);

                    if (mysqli_num_rows($viewresult) < 1) {

                        $thumbnail = "images/products/new.png";

                        if ($view == 'Front') {

                            $viewsql = "INSERT INTO template (email, deyt, thumbnail, front, product) VALUES (?, ?, ?, ?, ?)";
                            $stmt = $conn->prepare($viewsql);
                            $stmt->bind_param("sssss", $new_email, $new_date, $thumbnail, $new_date, $product);

                        } else {

                            $viewsql = "INSERT INTO template (email, deyt, thumbnail, back, product) VALUES (?, ?, ?, ?, ?)";
                            $stmt = $conn->prepare($viewsql);
                            $stmt->bind_param("sssss", $new_email, $new_date, $thumbnail, $new_date, $product);

                        }
                        if ($stmt->execute()) {

                            $_SESSION['view'] = $view;
                            $_SESSION['date'] = $new_date;
                            $_SESSION['product'] = $product;
                            $new_date = $_SESSION['date'];
                            $stmt->close();

                        } else {

                            echo '1';
                            exit;

                        }

                    }

                    $objectType = $new['objectType'];
                    $properties = json_encode($new['properties']);

                    $sql = "SELECT * FROM object WHERE objectType = '$objectType' and properties = '$properties' and email = '$new_email' and deyt = '$new_date' and view = '$view' and product = '$product'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {

                        echo '1';
                        exit;

                    } else {

                        $sql = "INSERT INTO object (objectType, properties, email, deyt, view, product) VALUES (?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssssss", $objectType, $properties, $new_email, $new_date, $view, $product);

                        if ($stmt->execute()) {

                            $stmt->close();

                        } else {

                            echo '1';
                            exit;

                        }

                    }

                } else {

                    echo '1';
                    exit;

                }

            }

        }
        
    } else {

        $front = "";
        $back = "";

        $viewsql = "SELECT * FROM template WHERE email = '$email' and deyt = '$date' and product = '$product'";
        $viewresult = mysqli_query($conn, $viewsql);

        if (mysqli_num_rows($viewresult) > 0) {

            $row = $viewresult->fetch_assoc();
            $front = $row["front"];
            $back = $row["back"];

        }

        if ($view == "Front") {

            if ($front) {

                $sql = "DELETE FROM object WHERE email = '$email' and deyt = '$front' and view = '$view' and product = '$product'";

            } else {

                $front = date('Y-m-d H:i');
                $sql = "UPDATE template SET front = '$front' WHERE email = '$email' and deyt = '$date' and product = '$product'";

            }

        } else {

            if ($back) {

                $sql = "DELETE FROM object WHERE email = '$email' and deyt = '$back' and view = '$view' and product = '$product'";

            } else {

                $back = date('Y-m-d H:i');
                $sql = "UPDATE template SET back = '$back' WHERE email = '$email' and deyt = '$date' and product = '$product'";

            }
            
        }

        if (mysqli_query($conn, $sql)) {

            foreach ($canvasObjects as $obj) {

                foreach ($obj as $new) {

                    if (isset($new['objectType']) && isset($new['properties'])) {

                        $objectType = $new['objectType'];
                        $properties = json_encode($new['properties']);

                        if ($view == "Front") {

                            $sql = "INSERT INTO object (objectType, properties, email, deyt, view, product) VALUES (?, ?, ?, ?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ssssss", $objectType, $properties, $email, $front, $view, $product);

                        } else {

                            $sql = "INSERT INTO object (objectType, properties, email, deyt, view, product) VALUES (?, ?, ?, ?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ssssss", $objectType, $properties, $email, $back, $view, $product);

                        }

                        if ($stmt->execute()) {
                            
                            $_SESSION['view'] = $view;
                            $_SESSION['date'] = $date;
                            $_SESSION['product'] = $product;
                            $stmt->close();

                        } else {

                            echo '1';
                            exit;

                        }

                    } else {

                        echo '1';
                        exit;

                    }
                }
                
            }
            
        }

    }

}
mysqli_close($conn);
?>