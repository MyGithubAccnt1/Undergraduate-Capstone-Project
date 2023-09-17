<?php 

session_start();

session_unset();

session_destroy();

echo"<script>alert('Notice: Logout Successful.')</script>";
$script = "<script>window.location = '../signin.php';</script>";
echo $script;

?>