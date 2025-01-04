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
            .product-nav {
                color: rgb(255, 255, 255, 1.0);
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
        </style>
    </head>
    <body>
        <main class="container-fluid p-0">
            <?php include('include/admin_header.php') ?>
            <section class="container-fluid p-0" style="background-color: #EDEEF1;">
                <?php include('include/admin_upper_header.php') ?>
                <div class="container p-3" style="position: relative;">

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="logo_search" style="cursor: pointer;">
                            <div class="bg-white p-3 pending-button" data-content="LOGO SEAL">
                                <small>LOGO SEAL</small>
                                <h6><b id="logo">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="necklace_search" style="cursor: pointer;">
                            <div class="bg-white p-3 processing-button" data-content="NECKLACE">
                                <small>NECKLACE</small>
                                <h6><b id="necklace">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="table_search" style="cursor: pointer;">
                            <div class="bg-white p-3 delivered-button" data-content="TABLE NAMEPLATE">
                                <small>TABLE NAMEPLATE</small>
                                <h6><b id="table">0</b></h6>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3 px-3 mb-3" id="all_search" style="cursor: pointer;">
                            <div class="bg-white p-3 rejected-button" data-content="ALL">
                                <small>ALL</small>
                                <h6><b id="pin">0</b></h6>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6 text-start">
                                            <i class="fas fa-table me-1"></i>
                                            Products
                                        </div>
                                        <div class="col-6 text-end" style="display: flex; align-items: center; justify-content: right; gap: 0 20px;">
                                            <i class="fas fa-folder-plus" type="button" onclick="open_add_product();" title="Add Product"></i>
                                            <i class="fas fa-download" type="button" onclick="open_print('productlist');" title="Print Preview"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body overflow-x-auto">
                                    <table id="products_database">
                                        <!-- dynamic -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="add_product" class="p-3" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 2; display: none; overflow-y: auto;">
                        <div class="bg-white p-3">
                            <button class="btn btn-outline-danger rounded-0 mb-3 btn-sm" id="close_add_product">X</button>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 border border-dark p-3 mb-3">
                                        <h1 class="text-center bg-dark text-white">NEW PRODUCT</h1>
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
                                                <div class="col-sm-12 col-md-8 text-md-start text-lg-start d-flex flex-direction-row align-items-start gap-1">
                                                    <small><textarea type="text" rows="5" style="resize: none;" name="description" required></textarea></small>
                                                    <button type="button" class="btn btn-sm btn-danger rounded-0" style="display: none;" id="erase_description">X</button>
                                                </div>
                                                <div class="col-sm-12 col-md-4 text-md-end text-lg-end">
                                                    <small>Category:</small>
                                                </div>
                                                <div class="col-sm-12 col-md-8 text-md-start text-lg-start">
                                                    <small><select name="category">
                                                        <option value="Logo">Logo Seal</option>
                                                        <option value="Necklace" selected>Necklace</option>
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
                    </div>

                    <div id="selected" class="p-3" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; z-index: 2; display: none; overflow-y: auto;">
                        <div class="bg-white p-3">
                            <button class="btn btn-outline-danger rounded-0 mb-3 btn-sm" id="close_selected">X</button>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 border border-dark p-3 mb-3">
                                        <div class="row">

                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="container text-start p-3" id="product_settings">
                                                    <!-- dynamic -->
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="container text-start p-3" id="product_details">
                                                    <!-- dynamic -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="container">
                                            <div class="row border border-dark text-start mb-3" style="display: flex; flex-direction: column; height: 300px;">
                                                <div class="bg-dark text-center text-white py-2">COMMENT SECTION</div>
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
            <script type="text/javascript" src="./js/products.js"></script>
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