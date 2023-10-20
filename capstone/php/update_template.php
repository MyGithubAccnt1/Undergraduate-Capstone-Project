<?php
session_start(); 
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = file_get_contents("php://input");
    $canvasObjects = json_decode($requestData, true);

    $email = $canvasObjects['email'];
    $date = $canvasObjects['deyt'];

    if ($email == "test@admin"){
        $new_email = $_SESSION['email'];
        $new_date = date('Y-m-d H:i');
        if (is_array($canvasObjects)) {
            foreach ($canvasObjects as $obj) {
                foreach ($obj as $new) {
                    if (isset($new['objectType']) && isset($new['properties'])) {
                        $objectType = $new['objectType'];
                        $properties = json_encode($new['properties']);

                        $viewsql = "SELECT * FROM template WHERE email = '$new_email' and deyt = '$new_date'";
                        $viewresult = mysqli_query($conn, $viewsql);
                        if (mysqli_num_rows($viewresult) > 0) {
                            
                        }else{
                            $thumbnail = "images/new.png";
                            $viewsql = "INSERT INTO template (email, deyt, thumbnail) VALUES (?, ?, ?)";
                            $stmt = $conn->prepare($viewsql);
                            $stmt->bind_param("sss", $new_email, $new_date, $thumbnail);
                            if ($stmt->execute()) {
                                $_SESSION['date'] = $new_date;
                                $new_date = $_SESSION['date'];
                                $stmt->close();
                            } else {
                                echo 'Error executing SQL query: ' . $stmt->error;
                                exit;
                            }
                        }
                        $sql = "SELECT * FROM object WHERE objectType = '$objectType' and properties = '$properties' and email = '$new_email' and deyt = '$new_date'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            exit;
                        } else {
                            $sql = "INSERT INTO object (objectType, properties, email, deyt) VALUES (?, ?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ssss", $objectType, $properties, $new_email, $new_date);
                            if ($stmt->execute()) {
                                $stmt->close();
                            } else {
                                echo 'Error executing SQL query: ' . $stmt->error;
                                exit;
                            }
                        }
                    } else {
                        echo 'Invalid JSON data';
                        exit;
                    }
                }
            }
            echo 'Canvas objects saved successfully';
        } else {
            echo 'Error in JSON data format';
        }
    } else {
        $sql = "DELETE FROM object WHERE email = '$email' and deyt = '$date'";
        if (mysqli_query($conn, $sql)) {
            if (is_array($canvasObjects)) {
                foreach ($canvasObjects as $obj) {
                    foreach ($obj as $new) {
                        if (isset($new['objectType']) && isset($new['properties'])) {
                            $objectType = $new['objectType'];
                            $properties = json_encode($new['properties']);
                            $sql = "INSERT INTO object (objectType, properties, email, deyt) VALUES (?, ?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ssss", $objectType, $properties, $email, $date);
                            if ($stmt->execute()) {
                                $_SESSION['date'] = $date;
                                $stmt->close();
                            } else {
                                echo 'Error executing SQL query: ' . $stmt->error;
                                exit;
                            }
                        } else {
                            echo 'Invalid JSON data';
                            exit;
                        }
                    }
                    
                }
                echo 'Canvas objects saved successfully';
            } else {
                echo 'Error in JSON data format';
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    echo 'Method not allowed';
}
mysqli_close($conn);
?>