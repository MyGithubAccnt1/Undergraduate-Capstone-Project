<?php 
session_start(); 
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $script = "<script>window.location.href = 'account.php';</script>";
    echo $script;
}else{
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Saint Benedict Medallion</title>
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
        <meta name="description" content="In partial fulfilment of the requirements for the degree of Bachelor of Science in Information Technology">
        <meta name="keywords" content="capstone, project, thesis">
        <meta name="author" content="Mhel Voi A. Bernabe">
        <?php include('include/style.php') ?>
        <style>
            .signin-nav{
                display: none;
            }
            .hero-section {
                position: fixed;
                z-index: -1;
                top: 0;
                left: 0;
                height: 100vh;
                width: 100%;
/*                background-image: linear-gradient(135deg, rgb(169, 169, 169),rgb(41, 41, 41)),linear-gradient(22.5deg, rgb(84, 190, 204) 0%, rgb(84, 190, 204) 19%,rgb(89, 172, 188) 19%, rgb(89, 172, 188) 20%,rgb(94, 154, 171) 20%, rgb(94, 154, 171) 22%,rgb(99, 136, 155) 22%, rgb(99, 136, 155) 31%,rgb(105, 117, 138) 31%, rgb(105, 117, 138) 33%,rgb(110, 99, 122) 33%, rgb(110, 99, 122) 45%,rgb(115, 81, 105) 45%, rgb(115, 81, 105) 51%,rgb(120, 63, 89) 51%, rgb(120, 63, 89) 100%),linear-gradient(45deg, rgb(84, 190, 204) 0%, rgb(84, 190, 204) 19%,rgb(89, 172, 188) 19%, rgb(89, 172, 188) 20%,rgb(94, 154, 171) 20%, rgb(94, 154, 171) 22%,rgb(99, 136, 155) 22%, rgb(99, 136, 155) 31%,rgb(105, 117, 138) 31%, rgb(105, 117, 138) 33%,rgb(110, 99, 122) 33%, rgb(110, 99, 122) 45%,rgb(115, 81, 105) 45%, rgb(115, 81, 105) 51%,rgb(120, 63, 89) 51%, rgb(120, 63, 89) 100%); background-blend-mode:overlay, overlay, normal;*/
                background-image: linear-gradient(67.5deg, rgb(215, 215, 215) 0%, rgb(215, 215, 215) 46%,rgb(198, 198, 198) 46%, rgb(198, 198, 198) 49%,rgb(181, 181, 181) 49%, rgb(181, 181, 181) 56%,rgb(164, 164, 164) 56%, rgb(164, 164, 164) 61%,rgb(146, 146, 146) 61%, rgb(146, 146, 146) 75%,rgb(129, 129, 129) 75%, rgb(129, 129, 129) 84%,rgb(112, 112, 112) 84%, rgb(112, 112, 112) 100%),linear-gradient(22.5deg, rgb(215, 215, 215) 0%, rgb(215, 215, 215) 46%,rgb(198, 198, 198) 46%, rgb(198, 198, 198) 49%,rgb(181, 181, 181) 49%, rgb(181, 181, 181) 56%,rgb(164, 164, 164) 56%, rgb(164, 164, 164) 61%,rgb(146, 146, 146) 61%, rgb(146, 146, 146) 75%,rgb(129, 129, 129) 75%, rgb(129, 129, 129) 84%,rgb(112, 112, 112) 84%, rgb(112, 112, 112) 100%),linear-gradient(112.5deg, rgb(215, 215, 215) 0%, rgb(215, 215, 215) 46%,rgb(198, 198, 198) 46%, rgb(198, 198, 198) 49%,rgb(181, 181, 181) 49%, rgb(181, 181, 181) 56%,rgb(164, 164, 164) 56%, rgb(164, 164, 164) 61%,rgb(146, 146, 146) 61%, rgb(146, 146, 146) 75%,rgb(129, 129, 129) 75%, rgb(129, 129, 129) 84%,rgb(112, 112, 112) 84%, rgb(112, 112, 112) 100%),linear-gradient(90deg, rgb(182,182,182),rgb(155,155,155)); background-blend-mode:overlay,overlay,overlay,normal;
                filter: brightness(70%);
            }
            .container {
                margin-top: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .container > .row {
                width: 100%;
            }
            .container > .row > div {
                padding: 50px 35px 50px 35px;
                background-color: rgba(255, 255, 255, 0.1);
                box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.5);
                border-radius: 5px;
                border-right: 1px solid rgba(255, 255, 255, 0.2);
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(5px);
            }
            .termsNcondition {
                position: absolute;
                z-index: 2;
                top: 100px;
                left: 0;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                visibility: hidden;
                overflow-x: hidden;
            }
            .termsNcondition > .row > div {
                padding: 20px 35px 15px 35px;
            }
            .termsNcondition > .row > div > div{
                overflow-y: auto;
                overflow-x: hidden;
                height: 350px;
            }
            .create-button {
                background-color: transparent;
                border: none;
            }
            .create-button:hover {
                color: #fff !important;
                background-color: transparent;
            }
        </style>
    </head>
    <body>
        <main class="container-fluid p-0">
            <?php include('include/user_header.php') ?>
            <section class="hero-section"></section>
            <section class="container hero">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
                        <div class="row text-center text-white">
                            <img src="images/saint.svg" class="mx-auto mb-3" style="height: 50px; width: auto;">
                            <h5><small id="title">Sign In</small></h5>
                            <h6><small id="sub-title">Use your SMB Account</small></h6>
                        </div>
                        <div class="mt-4" style="display: flex; flex-direction: row;">
                            <div class="w-100" id="signin-1">
                                <form id="get-account">
                                    <p><small><input type="email" placeholder="Email" name="email" style="padding: 15px; border-radius: 6px; width: 100%;" required></small></p>
                                    <p><small><input type="password" placeholder="Password" name="password" style="padding: 15px; border-radius: 6px; width: 100%;" required></small></p>
                                    <div class="row mt-1">
                                        <div class="col-6 d-flex align-items-center justify-content-start">
                                            <input style="margin: 0 5px 0 0;" type="checkbox" name="show-password"/>
                                            <small class="d-flex align-items-center">
                                                <button type="button" class="btn btn-sm" style="border: none; margin: 0; padding: 0; background-color: inherit; color: #fff;" id="sign-in-show-password-button"> Show password</button>
                                            </small>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="button" id="forgot-password" class="btn btn-sm btn-danger p-0 create-button text-danger">Forgot password?</button>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-6 d-flex align-items-center justify-content-start">
                                            <button type="button" id="register" class="btn btn-sm btn-danger p-0 create-button text-danger">Create account</button>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-danger px-3">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="w-100" style="display: none;" id="signin-2">
                                <form id="verify-forgot-password">
                                    <small><input type="text" placeholder="Verification Code" name="verification" style="padding: 15px; border-radius: 6px; width: 100%;" required></small>
                                    <div class="row mt-1">
                                        <div class="col-12 d-flex align-items-center justify-content-start text-white">
                                            <small>An email with a verification code was just sent to <span name="display-email"></span></small>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-6 d-flex align-items-center justify-content-start">
                                            <button type="button" id="back-2" class="btn btn-sm btn-danger px-3">Back</button>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-danger px-3">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="w-100" style="display: none;" id="signin-3">
                                <form id="verify-forgot-change-password">
                                    <small><input type="password" placeholder="New Password" name="password" style="padding: 15px; border-radius: 6px; width: 100%;" required></small>
                                    <div class="row mt-1">
                                        <div class="col-6 d-flex align-items-center justify-content-start">
                                            <input style="margin: 0 5px 0 0;" type="checkbox" name="show-password"/>
                                            <small class="d-flex align-items-start">
                                                <button type="button" class="btn btn-sm" style="border: none; margin: 0; padding: 0; background-color: inherit; color: #fff;" name="show-password-button"> Show password</button>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-6 d-flex align-items-center justify-content-start">
                                            <button type="button" id="back-3" class="btn btn-sm btn-danger px-3">Back</button>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-danger px-3">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="w-100" style="display: none;" id="register-1">
                                <form id="check-email">
                                    <small><input type="email" placeholder="Email" name="email" style="padding: 15px; border-radius: 6px; width: 100%;" required></small>
                                    <div class="row mt-5">
                                        <div class="col-6 d-flex align-items-center justify-content-start">
                                            <button type="button" id="sign-in" class="btn btn-sm btn-danger p-0 create-button text-danger">Sign In</button>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-danger px-3">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="w-100" style="display: none;" id="register-2">
                                <form id="check-password">
                                    <small><input type="password" placeholder="Password" name="password" style="padding: 15px; border-radius: 6px; width: 100%;" required></small>
                                    <div class="row mt-1">
                                        <div class="col-6 d-flex align-items-center justify-content-start">
                                            <input style="margin: 0 5px 0 0;" type="checkbox" name="show-password"/>
                                            <small class="d-flex align-items-center">
                                                <button type="button" class="btn btn-sm" style="border: none; margin: 0; padding: 0; background-color: inherit; color: #fff;" id="register-show-password-button"> Show password</button>
                                            </small>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="button" id="OpenTermsAndConditions" class="btn btn-sm btn-danger p-0 create-button text-danger">Terms & Condition</button>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-6 d-flex align-items-center justify-content-start">
                                            <button type="button" id="register-back-2" class="btn btn-sm btn-danger px-3">Back</button>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-danger px-3">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="w-100" style="display: none;" id="register-3">
                                <form id="verify-email">
                                    <small><input type="text" placeholder="Verification Code" name="verification" style="padding: 15px; border-radius: 6px; width: 100%;" required></small>
                                    <div class="row mt-1">
                                        <div class="col-12 d-flex align-items-center justify-content-start text-white">
                                            <small>An email with a verification code was just sent to <span name="display-email"></span></small>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-6 d-flex align-items-center justify-content-start">
                                            <button type="button" id="register-back-3" class="btn btn-sm btn-danger px-3">Back</button>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                            <button type="submit" class="btn btn-sm btn-danger px-3">Next</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="termsNcondition">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-5 mx-auto text-dark cool">
                        <button type="button" class="tnc-close btn btn-dark pt-1 my-3 w-25 rounded-pill">Close</button>
                        <div class="row">
                            <h1 class="text-center">Terms and Conditions</h1><br>
                            <p class="text-start">These terms and conditions outline the rules and regulations for the use of Saint Benedict Medallion's Website, located at <span id="current-origin"></span>.</p>
                            <p class="text-start">By accessing this website we assume you accept these terms and conditions.</p>
                            <p class="text-start">Do not continue to use Saint Benedict Medallion if you do not agree to take all of the terms and conditions stated on this page.</p>
                            <p class="text-start">The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions.</p>
                            <p class="text-start">"The Company", "Ourselves", "We", "Our" and "Us", refers to our Company.</p>
                            <p class="text-start">"Party", "Parties", or "Us", refers to both the Client and ourselves.</p>
                            <p class="text-start">All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Philippines.</p>
                            <p class="text-start">Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p><br>

                            <h5 class="text-start">License</h5>
                            <p class="text-start">Unless otherwise stated, Saint Benedict Medallion and/or its licensors own the intellectual property rights for all material on Saint Benedict Medallion.</p>
                            <p class="text-start">All intellectual property rights are reserved.</p>
                            <p class="text-start">You may access this from Saint Benedict Medallion for your own personal use subjected to restrictions set in these terms and conditions.</p><br>
                            <h5 class="text-start">You must not:</h5>
                            <li class="text-start">Republish material from Saint Benedict Medallion;</li>
                            <li class="text-start">Sell, rent or sub-license material from Saint Benedict Medallion;</li>
                            <li class="text-start">Reproduce, duplicate or copy material from Saint Benedict Medallion;</li>
                            <li class="text-start">Redistribute content from Saint Benedict Medallion.</li><br>

                            <p class="text-start">This Agreement shall begin on the date hereof.</p>
                            <p class="text-start">Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website.</p>
                            <p class="text-start">Saint Benedict Medallion does not filter, edit, publish or review Comments prior to their presence on the website.</p>
                            <p class="text-start">Comments do not reflect the views and opinions of Saint Benedict Medallion,its agents and/or affiliates.</p>
                            <p class="text-start">Comments reflect the views and opinions of the person who post their views and opinions.</p>
                            <p class="text-start">To the extent permitted by applicable laws, Saint Benedict Medallion shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>
                            <p class="text-start">Saint Benedict Medallion reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p><br>

                            <h5 class="text-start">You warrant and represent that:</h5>
                            <li class="text-start">You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
                            <li class="text-start">The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
                            <li class="text-start">The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy;</li>
                            <li class="text-start">The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li><br>

                            <h5 class="text-start">Content Liability</h5>
                            <p class="text-start">We shall not be hold responsible for any content that appears on your Website.</p>
                            <p class="text-start">You agree to protect and defend us against all claims that is rising on your Website.</p>
                            <p class="text-start">No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p><br>

                            <h5 class="text-start">Removal of links from our website</h5>
                            <p class="text-start">If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment.</p>
                            <p class="text-start">We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>
                            <p class="text-start">We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy;</p>
                            <p class="text-start">nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p><br>
                            
                            <h5 class="text-start">Disclaimer</h5>
                            <p class="text-start">To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website.</p><br>

                            <h5 class="text-start">Nothing in this disclaimer will:</h5>
                            <li class="text-start">limit or exclude our or your liability for death or personal injury;</li>
                            <li class="text-start">limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
                            <li class="text-start">limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
                            <li class="text-start">exclude any of our or your liabilities that may not be excluded under applicable law.</li><br>

                            <h5 class="text-start">The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer:</h5>
                            <p class="text-start">(a) are subject to the preceding paragraph; and</p>
                            <p class="text-start">(b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>
                            <p class="text-start">As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>
                            <div class="row m-0 p-0">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" style="margin: 0 5px 0 0;" type="checkbox" id="pop-accept-check"/>
                                    <label class="form-check-label d-flex align-items-center">
                                        <button type="button" style="border: none; margin: 0; padding: 0; background-color: inherit; color: #000;" id="pop-accept-button"> I agree to the Terms & Conditions</button>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <script type="text/javascript">
            $(window).on('load', function() {
                $(".loader").fadeOut('slow');
                $(".sticky-top").fadeIn('slow');
                var currentURL = window.location.href;
                if (currentURL !== window.location.origin + "/signin.php" || currentURL !== window.location.origin + "/capstone/signin.php") {
                    var register = new URLSearchParams(currentURL).get('register');
                    if (register === "true") {
                        $('#register').click();
                    }
                }
                $('#get-email').find('input[name="email"]').focus()
                $('#current-origin').text(window.location.origin);
            })
        </script>
        <script type="text/javascript" src="js/signin.js"></script>
    </body>
</html>
<?php 
}
?>