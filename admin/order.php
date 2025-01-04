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
            .order-nav {
                color: rgb(255, 255, 255, 1.0);
            }
            .card {
                box-shadow: 5px 6px 6px 2px #e9ecef;
                border-radius: 4px;
            }
            .comment-area textarea{
                resize: none; 
                border: 1px solid #000;
            }
            .ellipsis {
                white-space: normal;
                overflow: hidden;
            }
            .pending-button {
                border: 5px solid #4E73DF;
                color: #4E73DF;
                border-style: none none none solid; 
                border-radius: 6px; 
                position: relative;
            }
            .pending-button::before {
                content: attr(data-content);
                position: absolute;
                bottom: 0;
                left: -5px;
                width: 0;
                height: 100%;
                background-color: #4E73DF;
                border-radius: 6px;
                transition: width 0.4s linear;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                overflow: hidden;
            }
            .processing-button {
                border: 5px solid #1CC88A;
                color: #1CC88A;
                border-style: none none none solid; 
                border-radius: 6px; 
                position: relative;
            }
            .processing-button::before {
                content: attr(data-content);
                position: absolute;
                bottom: 0;
                left: -5px;
                width: 0;
                height: 100%;
                background-color: #1CC88A;
                border-radius: 6px;
                transition: width 0.4s linear;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                overflow: hidden;
            }
            .delivered-button {
                border: 5px solid #36B9CC;
                color: #36B9CC;
                border-style: none none none solid; 
                border-radius: 6px; 
                position: relative;
            }
            .delivered-button::before {
                content: attr(data-content);
                position: absolute;
                bottom: 0;
                left: -5px;
                width: 0;
                height: 100%;
                background-color: #36B9CC;
                border-radius: 6px;
                transition: width 0.4s linear;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                overflow: hidden;
            }
            .rejected-button {
                border: 5px solid #F6C23E;
                color: #F6C23E;
                border-style: none none none solid; 
                border-radius: 6px; 
                position: relative;
            }
            .rejected-button::before {
                content: attr(data-content);
                position: absolute;
                bottom: 0;
                left: -5px;
                width: 0;
                height: 100%;
                background-color: #F6C23E;
                border-radius: 6px;
                transition: width 0.4s linear;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                overflow: hidden;
            }
            .pending-button:hover::before, .processing-button:hover::before, .delivered-button:hover::before, .rejected-button:hover::before {
                width: calc(100% + 5px);
            }
        </style>
    </head>
    <body>
        <main class="container-fluid p-0">
            <?php include('include/admin_header.php') ?>
            <section class="container-fluid p-0 d-flex" style="background-color: #EDEEF1; flex-direction: column;">
                <?php include('include/admin_upper_header.php') ?>
                <img src="" id="imagePreview" class="imagePreview" alt="Missing_Image">
                <div class="container pt-3" style="position: relative;">

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="pending_search" style="cursor: pointer;">
                            <div class="bg-white p-3 pending-button" data-content="PENDING ORDERS">
                                <small>PENDING ORDERS</small>
                                <h6><b id="pending">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="on-the-way_search" style="cursor: pointer;">
                            <div class="bg-white p-3 processing-button" data-content="PROCESSING ORDERS">
                                <small>PROCESSING ORDERS</small>
                                <h6><b id="otw">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="delivered_search" style="cursor: pointer;">
                            <div class="bg-white p-3 delivered-button" data-content="DELIVERED ORDERS">
                                <small>DELIVERED ORDERS</small>
                                <h6><b id="delivered">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="all_search" style="cursor: pointer;">
                            <div class="bg-white p-3 rejected-button" data-content="ALL">
                                <small>ALL</small>
                                <h6><b id="default">0</b></h6>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-2 col-lg-2 text-start">
                                            <i class="fas fa-table me-1"></i>
                                            Orders
                                        </div>
                                        <div class="col-sm-12 col-md-8 col-lg-8 text-center">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-3 col-lg-3 d-flex flex-direction-row align-items-center justify-content-center">
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
                                                <div class="col-sm-12 col-md-3 col-lg-3 d-flex flex-direction-row align-items-center justify-content-center">
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
                                                <div class="col-sm-12 col-md-3 col-lg-3 d-flex flex-direction-row align-items-center justify-content-center">
                                                    <small style="margin-right: 5px;">YEAR</small>
                                                    <small><select id="year">
                                                        <!-- dynamic -->
                                                    </select></small>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 d-flex flex-direction-row align-items-center justify-content-center">
                                                    <small style="margin-right: 5px;">STATUS </small>
                                                    <small><select id="selected-status">
                                                        <option value="None">None</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Processing">Processing</option>
                                                        <option value="Delivered">Delivered</option>
                                                        <option value="Canceled">Canceled</option>
                                                        <option value="Rejected">Rejected</option>
                                                    </select></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-2 col-lg-2 text-end">
                                            <i class="fas fa-download" type="button" onclick="open_print('orderlist');" title="Print Preview"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body overflow-x-auto">
                                    <table id="order_database">
                                        <!-- dynamic -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="selected" class="p-3" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 2; display: none; overflow-y: auto;">
                        <div class="bg-white p-3">
                            <div class="d-flex align-items-center mb-3">
                                <button class="btn btn-outline-danger rounded-0 me-auto btn-sm" id="close_selected">X</button>
                                <button class="btn btn-outline-success rounded-0 ms-auto btn-sm" type="button" onclick="generatePDFsalesinvoice();">
                                    <small><b>Download Sales Invoice</b></small>
                                    <i class="fas fa-download" style="margin-left: 5px;"></i>
                                </button>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 mb-3" id="print_sales_invoice">
                                        <div class="container border border-dark text-start p-3" id="invoice">
                                            <!-- dynamic -->
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="container">
                                            <div class="row border border-dark text-start mb-3" style="display: flex; flex-direction: column; height: 300px;">
                                                <div class="bg-dark text-center text-white py-2">MESSAGE</div>
                                                <div style="overflow-x:hidden; overflow-y:auto; flex: 1; transform: scaleY(-1);" id="message-container">
                                                    <!-- dynamic -->
                                                </div>
                                                <div class="p-0">
                                                    <form id="message-form">
                                                        <input type="hidden" name="id">
                                                        <div class="comment-area">
                                                            <div class="bg-dark" style="display: flex; justify-content: center; align-items: center; flex-direction: row; margin: 0; padding: 0;">
                                                                <div class="w-100 p-1">
                                                                    <textarea class="form-control rounded-pill" placeholder="Type your message here." rows="1" name="comment" required></textarea>
                                                                </div>
                                                                <div class="w-50 p-1 d-flex align-items-center">
                                                                    <button type="submit" class="btn btn-sm btn-danger py-1 w-100 rounded-pill">Send</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row border border-dark text-start" style="display: flex; flex-direction: column;">
                                                <div class="bg-dark text-center text-white py-2">SETTINGS</div>
                                                <div style="display: flex; overflow-x:hidden; overflow-y:auto; flex-direction: column; flex: 1; align-items: center;" id="settings-container" class="p-3">
                                                    <!-- dynamic -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="print" class="p-3" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 2; display: none; overflow-y: auto;">
                        <div class="bg-white p-3">
                            <div class="w-100 d-flex align-items-center justify-content-center">
                                <button class="btn btn-outline-danger rounded-0 me-auto btn-sm" id="close_print">X</button>
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
            <script type="text/javascript" src="./js/order.js"></script>
            <script type="text/javascript" src="./js/image_hover.js"></script>
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