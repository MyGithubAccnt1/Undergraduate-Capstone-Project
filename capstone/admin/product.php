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
            .product-nav {
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
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="directory_search" style="cursor: pointer;">
                            <div class="bg-white p-3" style="border: 5px solid #4E73DF; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #4E73DF">DIRECTORY MARKERS</small>
                                <h6><b id="directory">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="necklace_search" style="cursor: pointer;">
                            <div class="bg-white p-3" style="border: 5px solid #1CC88A; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #1CC88A">NECKLACE</small>
                                <h6><b id="necklace">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="pin_search" style="cursor: pointer;">
                            <div class="bg-white p-3" style="border: 5px solid #36B9CC; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #36B9CC">PINS</small>
                                <h6><b id="pin">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="table_search" style="cursor: pointer;">
                            <div class="bg-white p-3" style="border: 5px solid #F6C23E; border-style: none none none solid; border-radius: 6px;">
                                <small style="color: #F6C23E">TABLE NAMEPLATE</small>
                                <h6><b id="table">0</b></h6>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Products
                                </div>
                                <div class="card-body overflow-x-auto">
                                    <table id="products_database">
                                        <!-- dynamic -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Add Products
                                </div>
                                <div class="card-body">
                                    <form id="product_add">
                                        <div class="row gy-2 text-center overflow-x-hidden">
                                            <div class="col-sm-12 col-md-4 text-md-end text-lg-end">
                                                <small>Product Name:</small>
                                            </div>
                                            <div class="col-sm-12 col-md-8 text-md-start text-lg-start">
                                                <small><input type="text" name="title" required></small>
                                                <button type="button" class="btn btn-sm btn-danger rounded-0" style="display: none;" id="erase_title">X</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 text-md-end text-lg-end">
                                                <small>Price:</small>
                                            </div>
                                            <div class="col-sm-12 col-md-8 text-md-start text-lg-start">
                                                <small><input type="text" name="price" oninput="validate(this)" required></small>
                                                <button type="button" class="btn btn-sm btn-danger rounded-0" style="display: none;" id="erase_price">X</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 text-md-end text-lg-end">
                                                <small>Description:</small>
                                            </div>
                                            <div class="col-sm-12 col-md-8 text-md-start text-lg-start d-flex flex-direction-row align-items-start gap-1 justify-content-center">
                                                <small><textarea type="text" rows="5" style="resize: none;" name="description" required></textarea></small>
                                                <button type="button" class="btn btn-sm btn-danger rounded-0" style="display: none;" id="erase_description">X</button>
                                            </div>
                                            <div class="col-sm-12 col-md-4 text-md-end text-lg-end">
                                                <small>Category:</small>
                                            </div>
                                            <div class="col-sm-12 col-md-8 text-md-start text-lg-start">
                                                <small><select name="category">
                                                    <option value="Directory">Directory Marker</option>
                                                    <option value="Necklace" selected>Necklace</option>
                                                    <option value="Pin">Pin</option>
                                                    <option value="Table">Table Nameplate</option>
                                                </select></small>
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

                    <div id="selected" class="p-3" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 2; display: none; overflow-y: auto;">
                        <div class="bg-white p-3">
                            <button class="btn btn-outline-danger rounded-0 mb-3" id="close_selected">X</button>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                                        <div class="container border border-dark text-start p-3" id="product_details">
                                            <!-- dynamic -->
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="container">
                                            <div class="row border border-dark text-start" style="display: flex; flex-direction: column; height: 300px;">
                                                <div class="bg-dark text-center text-white py-2">SETTINGS</div>
                                                <div style="overflow-x:hidden; overflow-y:auto; flex: 1;" id="product_settings" class="p-3">
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
            <script type="text/javascript" src="./js/products.js"></script>
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