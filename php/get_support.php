<?php
session_start();
include("connect.php");
if (isset($_SESSION['email'])) {

    $email = $_SESSION["email"];
    $sql = "SELECT * FROM message WHERE email = '$email' and deyt IS NULL ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo '
            <button class="btn btn-sm rounded-circle btn-danger m-2" style="transform: scaleY(-1); position: sticky; z-index: 2; width: 30px; height: 30px; left: 250px; top: 290px;" onclick="faq(`FAQ`);">?</button>
        ';

        while ($row = mysqli_fetch_assoc($result)) {

            if ($row['role'] === 'Admin'){
                echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-right: auto; transform: scaleY(-1);">';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="d-flex flex-row align-items-center ellipsis">';
                            echo '<div style="width: 100%;">';
                                echo '<small>' . $row['timestamp'] . '</small><br>';
                                echo '<small class="font-weight-bold text-warning">[Administrator]</small>';
                                echo '<small>: ' . $row['message'] . '</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }else{
                echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-left: auto; transform: scaleY(-1);">';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="d-flex flex-row align-items-center ellipsis">';
                            echo '<div style="width: 100%;">';
                                echo '<small>' . $row['timestamp'] . '</small><br>';
                                echo '<small class="font-weight-bold text-primary">' . $row['email'] . '</small>';
                                echo '<small>: ' . $row['message'] . '</small>';
                            echo '</div>';
                        echo '</div>';
                        
                    echo '</div>';
                echo '</div>';
            }

        }

        mysqli_free_result($result);
    } else {
        echo '<div class="card p-3" style="width: 95%; margin: 20px auto; transform: scaleY(-1);">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-row align-items-center ellipsis">
                    <div style="width: 100%;">
                        <small class="font-weight-bold">Frequently Asked Questions</small>
                        <small>
                            <button type="button" onclick="faq(1);" class="mt-2 btn btn-outline-danger rounded-0 btn-sm">How long does the order takes to be delivered?</button>
                            <button type="button" onclick="faq(2);"class="mt-2 btn btn-outline-danger rounded-0 btn-sm">Is it free delivery any where on the Philippines?</button>
                            <button type="button" onclick="faq(3);" class="mt-2 btn btn-outline-danger rounded-0 btn-sm">What are available payment methods?</button>
                        </small>
                    </div>
                </div>
            </div>
        </div>';
    }
    
}
mysqli_close($conn);
?>
