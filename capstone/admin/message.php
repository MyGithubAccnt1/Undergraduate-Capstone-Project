<?php
session_start();
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
        <main class="container-fluid p-0">
            <?php include('include/admin_header.php') ?>
            <section class="container-fluid p-0" style="background-color: #EDEEF1;">
                <?php include('include/admin_upper_header.php') ?>
                <div class="container p-3 h-100">

                    <div class="d-flex" style="height: calc(100% - 70px);">
                        <div class="col-sm-12 col-md-5 col-lg-4 pe-1 flex-grow-1">
                            <div class="bg-white border border-dark container p-0" style="border-radius: 6px; height: 100%;" id="contact-container">
                                <!-- dynamic -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7 col-lg-8 ps-1 flex-grow-1">
                            <div class="bg-white border border-dark container p-0" style="border-radius: 6px; height: 100%; display: flex; flex-direction: column;">
                                <div class="sticky-top bg-dark text-center text-white py-2">Chat with SBM</div>
                                <div style="overflow-x:hidden; overflow-y:auto; flex: auto; max-height: 69vh; transform: scaleY(-1);" id="message-container">
                                    <!-- dynamic -->
                                </div>
                                <div class="sticky-bot">
                                    <form id="message-form">
                                        <input type="hidden" name="date">
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
                        </div>
                    </div>


                </div>
            </section>
            <script type="text/javascript" src="./js/message.js"></script>
        </main>
    </body>
</html>