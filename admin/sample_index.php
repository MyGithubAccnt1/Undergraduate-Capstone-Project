<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] === "Admin") {
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Saint Benedict Medallion</title>
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
        <meta name="description" content="In partial fulfilment of the requirements for the degree of Bachelor of Science in Information Technology">
        <meta name="keywords" content="capstone, project, thesis">
        <meta name="author" content="Mhel Voi A. Bernabe">
        <?php include('include/style.php') ?>
        <style type="text/css">
            .dashboard-nav {
                color: rgb(255, 255, 255, 1.0);
            }
        </style>
    </head>
    <body>
        <main class="container-fluid p-0">
            <?php include('include/admin_header.php') ?>
            <section class="container-fluid p-0" style="background-color: #EDEEF1;">
                <?php include('include/admin_upper_header.php') ?>
                <div class="container p-3">

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3">
                            <div class="bg-white p-3" style="border: 5px solid #4E73DF; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #4E73DF">ONLINE USERS</small>
                                <h6><b id="online">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3">
                            <div class="bg-white p-3" style="border: 5px solid #1CC88A; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #1CC88A">TODAYS PENDING ORDER</small>
                                <h6><b id="pending">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3">
                            <div class="bg-white p-3" style="border: 5px solid #36B9CC; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #36B9CC">TODAYS DELIVERED ORDER</small>
                                <h6><b id="delivered">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3">
                            <div class="bg-white p-3" style="border: 5px solid #F6C23E; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #F6C23E">TODAYS EARNING</small>
                                <h6>₱<b id="earnings">0</b></h6>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Monthly Earnings
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Products Count
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Accounts
                                </div>
                                <div class="card-body overflow-x-auto">
                                    <table id="account_database">
                                        <!-- dynamic -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <script type="text/javascript">
                $(window).on('load', function() {
                  $(".loader").fadeOut('slow');
                });
                $(document).ready(function() {
                    FillAccounts();
                });
                function FillAccounts() {
                    $.ajax({
                        url: "./php/get_accounts.php",
                        method: "GET",
                        success: function (data) {
                            data = data.trim();
                            $("#account_database").html(data);
                            ShowAccounts();
                        }
                    });
                }
                function ShowAccounts() {
                    const datatablesSimple = document.getElementById('account_database');
                    if (datatablesSimple) {
                        const dataTable = new simpleDatatables.DataTable(datatablesSimple);

                        const columnWidths = ['40%', '10%', '10%', '15%', '25%'];
                        const headers = datatablesSimple.querySelectorAll('th');

                        headers.forEach((header, index) => {
                            header.style.width = columnWidths[index];
                        });
                    }
                }
            </script>
            <script type="text/javascript" src="./js/index.js"></script>
            <script type="text/javascript" src="./js/header.js"></script>
        </main>
    </body>
</html>
<?php 
}else{
    if (isset($_SESSION['email'])) {
        echo"<script>alert('Notice: Please login to an Administrator account.')</script>";
        $script = "<script>window.location = '../php/logout.php';</script>";
        echo $script;
    } else {
        echo"<script>alert('Notice: Please login to an Administrator account.')</script>";
        $script = "<script>window.location = '../signin.php';</script>";
        echo $script;
    }
    
}
?>