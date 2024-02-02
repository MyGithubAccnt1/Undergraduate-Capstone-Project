<?php
session_start();
if ($_SESSION['role'] === "Admin") {
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Saint Benedict Medallion</title>
        <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
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
                text-overflow: ellipsis;
                overflow: hidden;
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
                            <div class="bg-white p-3" style="border: 5px solid #4E73DF; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #4E73DF">PENDING ORDERS</small>
                                <h6><b id="pending">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="on-the-way_search" style="cursor: pointer;">
                            <div class="bg-white p-3" style="border: 5px solid #1CC88A; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #1CC88A">ON THE WAY ORDERS</small>
                                <h6><b id="otw">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="delivered_search" style="cursor: pointer;">
                            <div class="bg-white p-3" style="border: 5px solid #36B9CC; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #36B9CC">DELIVERED ORDERS</small>
                                <h6><b id="delivered">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="rejected_search" style="cursor: pointer;">
                            <div class="bg-white p-3" style="border: 5px solid #F6C23E; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #F6C23E">REJECTED ORDERS</small>
                                <h6><b id="rejected">0</b></h6>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <button class="btn btn-outline-success rounded-0 ms-auto btn-sm" onclick="generatePDFordertable();">DOWNLOAD ORDER TABLE AS PDF</button>
                        </div>
                    </div>

                    <div class="row mb-3" id="print_order_table">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Orders
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
                                <button class="btn btn-outline-success rounded-0 ms-auto btn-sm" onclick="generatePDFsalesinvoice();">DOWNLOAD SALES INVOICE AS PDF</button>
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
                                                                    <button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Send</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row border border-dark text-start" style="display: flex; flex-direction: column; height: 200px;">
                                                <div class="bg-dark text-center text-white py-2">SETTINGS</div>
                                                <div style="overflow-x:hidden; overflow-y:auto; flex: 1;" id="settings-container" class="p-3">
                                                    <!-- dynamic -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <script type="text/javascript" src="./js/order.js"></script>
            <script type="text/javascript" src="./js/image_hover.js"></script>
            <script type="text/javascript" src="./js/header.js"></script>
        </main>
    </body>
</html>
<?php 
}else{
    echo"<script>alert('Notice: Please login to an Administrator account.')</script>";
    $script = "<script>window.location = '../php/logout.php';</script>";
    echo $script;
}
?>