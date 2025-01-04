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
            .message-nav {
                color: rgb(255, 255, 255, 1.0);
            }
            #contact-container > .row:not(:first-child) {
                border: 1px solid #000;
                border-style: none none solid none;
            }
            #contact-container > .row:not(:first-child):hover {
                background-color: rgba(0, 0, 0, 0.1);
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
        <main class="container-fluid p-0" style="height: 100vh;">
            <?php include('include/admin_header.php') ?>
            <section class="container-fluid p-0 d-flex" style="background-color: #EDEEF1; flex-direction: column;">
                <?php include('include/admin_upper_header.php') ?>
                <div class="container pt-3" style="flex: auto;">

                    <div class="row h-100 pb-3">
                        <div class="col-sm-12 col-md-5 col-lg-4 pe-1">
                            <div class="bg-white border border-dark container p-0" style="border-radius: 6px; height: 100%; overflow-x:hidden; overflow-y:auto;" id="contact-container">

                            </div>
                        </div>

                        <div class="col-sm-12 col-md-7 col-lg-8 ps-1">
                            <div class="bg-white border border-dark container p-0" style="border-radius: 6px; height: 100%; display: flex; flex-direction: column;">
                                <div class="bg-dark text-center text-white py-2">SBM Live Inbox</div>
                                <div style="overflow-x:hidden; overflow-y:auto; flex: 1; transform: scaleY(-1);" id="message-container">
                                    <div style="transform: scaleY(-1); display: flex; justify-content: center; align-items: center; height: 100%;">SELECT A CONTACT</div>
                                </div>
                                <div>
                                    <form id="message-form">
                                        <input type="hidden" name="date">
                                        <input type="hidden" name="email">
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
            </section>
            <script type="text/javascript">
                $(window).on('load', function() {
                  $(".loader").fadeOut('slow');
                });
            </script>
            <script type="text/javascript" src="./js/message.js"></script>
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