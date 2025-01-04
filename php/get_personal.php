<?php
session_start();
include('connect.php');
echo '
    <div class="col-sm-12 col-md-6 col-lg-6">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" value="' . $_SESSION["fname"] . '" disabled>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" value="' . $_SESSION["lname"] . '" disabled>
    </div>
    <div class="col-12">
        <label class="form-label">Mobile Number</label>
        <input type="text" class="form-control" value="' . $_SESSION["mnumber"] . '" disabled>
    </div>
    <div class="col-12">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" value="' . $_SESSION["email"] . '" disabled>
    </div>
    <div class="col-12">
        <label class="form-label">Home Address</label>
        <input type="text" class="form-control" value="' . $_SESSION["address_1"] . '" disabled>
    </div>
    <div class="col-12">
        <label class="form-label">Work Address</label>
        <input type="text" class="form-control" value="' . $_SESSION["address_2"] . '" disabled>
    </div>
';
mysqli_close($conn);
?>