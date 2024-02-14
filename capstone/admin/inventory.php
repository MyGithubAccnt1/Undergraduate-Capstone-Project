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
            .inventory-nav {
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
                        <div class="col-sm-12 col-md-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    Add Materials
                                </div>
                                <div class="card-body">
                                    <form id="inventory_add_update">
                                        <div class="row gy-2 text-center overflow-x-hidden">
                                            <div class="col-sm-12 col-md-4 text-md-end text-lg-end">
                                                <small>Material:</small>
                                            </div>
                                            <div class="col-sm-12 col-md-8 text-md-start text-lg-start">
                                                <input type="text" id="material" required>
                                                <button type="button" class="btn btn-sm btn-danger rounded-0" style="display: none;" id="erase_material">X</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 text-md-end text-lg-end">
                                                <small>Quantity:</small>
                                            </div>
                                            <div class="col-sm-12 col-md-8 text-md-start text-lg-start">
                                                <input type="text" id="quantity" oninput="validate(this)" required>
                                                <button type="button" class="btn btn-sm btn-danger rounded-0" style="display: none;" id="erase_quantity">X</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 text-md-end text-lg-end">
                                                <small>Category:</small>
                                            </div>
                                            <div class="col-sm-12 col-md-8 text-md-start text-lg-start">
                                                <input type="text" id="category" required>
                                                <button type="button" class="btn btn-sm btn-danger rounded-0" style="display: none;" id="erase_category">X</button>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-sm btn-outline-success rounded-pill w-50">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="print_inventory_table">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <i class="fas fa-table me-1"></i>
                                            Inventory
                                        </div>
                                        <div class="col-6 text-end">
                                            <i class="fas fa-download" type="button" onclick="generatePDFinventorytable();"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body overflow-x-auto">
                                    <table id="materials_database">
                                        <!-- dynamic -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="selected" class="p-3" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 2; display: none; overflow-y: auto;">
                        <div class="bg-white p-3">
                            <button class="btn btn-outline-danger rounded-0 mb-3" id="close_selected">X</button>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                                        <div class="container">
                                            <div class="row border border-dark text-start" style="display: flex; flex-direction: column; height: 300px;">
                                                <div class="bg-dark text-center text-white py-2">SETTINGS</div>
                                                <div style="overflow-x:hidden; overflow-y:auto; flex: 1;" id="inventory_settings" class="p-3">
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
            <script type="text/javascript" src="./js/inventory.js"></script>
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