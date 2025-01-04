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
                <div class="container p-3" style="position: relative;">

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

                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <i class="fas fa-chart-pie me-1"></i>
                                            Product Popularity
                                        </div>
                                        <div class="col-6 text-end">
                                            <i class="fas fa-download" type="button" onclick="open_print('productpopularity');" title="Print Preview"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
                                <!-- <div class="card-footer small text-muted">Updated just now</div> -->
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <i class="fas fa-chart-bar me-1"></i>
                                            Materials Count
                                        </div>
                                        <div class="col-6 text-end">
                                            <i class="fas fa-download" type="button" onclick="open_print('stockcount');" title="Print Preview"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body"><canvas id="myBarChart1" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-2 col-lg-2 text-start">
                                                <i class="fas fa-table me-1"></i>
                                                Sales
                                            </div>
                                            <div class="col-sm-12 col-md-8 col-lg-8 text-center">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-4 col-lg-4 d-flex flex-direction-row align-items-center justify-content-center">
                                                        <small style="margin-right: 5px;">FROM </small>
                                                        <small><select id="month-start">
                                                            <option value="None">None</option>
                                                            <option value="Jan">January</option>
                                                            <option value="Feb">February</option>
                                                            <option value="Mar">March</option>
                                                            <option value="Apr">April</option>
                                                            <option value="May">May</option>
                                                            <option value="Jun">June</option>
                                                            <option value="Jul">July</option>
                                                            <option value="Aug">August</option>
                                                            <option value="Nov">September</option>
                                                            <option value="Oct">October</option>
                                                            <option value="Nov">November</option>
                                                            <option value="Dec">December</option>
                                                        </select></small>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4 d-flex flex-direction-row align-items-center justify-content-center">
                                                        <small style="margin-right: 5px;">TO</small>
                                                        <small><select id="month-end">
                                                            <option value="None">None</option>
                                                            <option value="Jan">January</option>
                                                            <option value="Feb">February</option>
                                                            <option value="Mar">March</option>
                                                            <option value="Apr">April</option>
                                                            <option value="May">May</option>
                                                            <option value="Jun">June</option>
                                                            <option value="Jul">July</option>
                                                            <option value="Aug">August</option>
                                                            <option value="Nov">September</option>
                                                            <option value="Oct">October</option>
                                                            <option value="Nov">November</option>
                                                            <option value="Dec">December</option>
                                                        </select></small>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-lg-4 d-flex flex-direction-row align-items-center justify-content-center">
                                                        <small style="margin-right: 5px;">YEAR</small>
                                                        <small><select id="year">
                                                            <!-- dynamic -->
                                                        </select></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 text-end">
                                                <i class="fas fa-download" type="button" onclick="open_print('salesreport');" title="Print Preview"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body overflow-x-auto">
                                    <table id="sales_database">
                                        <!-- dynamic -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="print" class="p-3" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 2; display: none; overflow-y: auto;">
                        <div class="bg-white p-3">
                            <div class="w-100 d-flex align-items-center justify-content-center">
                                <button class="btn btn-outline-danger rounded-0 me-auto btn-sm" id="close_print">X</button>
                                <!-- <input type="date" id="from">
                                <input type="date" id="to"> -->
                                <button class="btn btn-outline-success rounded-0 ms-auto btn-sm" type="button" onclick="download_print();">
                                    <small><b>Download</b></small>
                                    <i class="fas fa-download" style="margin-left: 5px;"></i>
                                </button>
                            </div>
                            <div class="container mt-3" id="printable_order">
                                <div class="row border border-dark p-3 mx-1" id="printable" style="position: relative;">
                                    <img src="../images/chat_saint.png" style="position: absolute; top: 10px; left: 0; height: 100px; width: auto;">
                                    <h6 class="p-0 m-0 text-end" style="position: absolute; top: 20px; right: 20px; margin-right: auto;"><small id="date"></small></h6>
                                    <h3 class="p-0 m-0 text-center"><small>SAINT BENEDICT MEDALLION</small></h3>
                                    <h6 class="p-0 m-0 text-center"><small>TRECE MARTIRES CITY</small></h6>
                                    <div class="row mt-5 w-100" id="fill_print" style="overflow: auto;">
                                        <!-- dynamic -->
                                    </div>
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