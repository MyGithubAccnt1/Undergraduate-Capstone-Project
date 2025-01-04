<?php

    include("connect.php");
    require_once __DIR__.'\..\..\vendor\autoload.php';
    require_once __DIR__.'\send_notification_config.php';

    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    if (empty($email) && !empty($id)) {
        $sql = "SELECT * FROM history WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];
        }
    }
    $message = $_POST['message'];

    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->setLanguage(CONTACTFORM_LANGUAGE);
        $mail->SMTPDebug = CONTACTFORM_PHPMAILER_DEBUG_LEVEL;
        $mail->isSMTP();
        $mail->Host = CONTACTFORM_SMTP_HOSTNAME;
        $mail->SMTPAuth = true;
        $mail->Username = CONTACTFORM_SMTP_USERNAME;
        $mail->Password = CONTACTFORM_SMTP_PASSWORD;
        $mail->SMTPSecure = CONTACTFORM_SMTP_ENCRYPTION;
        $mail->Port = CONTACTFORM_SMTP_PORT;
        $mail->CharSet = CONTACTFORM_MAIL_CHARSET;
        $mail->Encoding = CONTACTFORM_MAIL_ENCODING;
        $mail->setFrom(CONTACTFORM_FROM_ADDRESS, CONTACTFORM_FROM_NAME);
        $mail->addAddress($email);
        $mail->Subject = "Notification from SBM";
        
        // Define the plain text version
        $plainTextMessage = "{$message}

        -----------------------------------------------------------------------------------------------
        Please check your notification upon logging in at http://sbmedallion.infinityfreeapp.com/
        -----------------------------------------------------------------------------------------------";

        // Define the HTML version
        $htmlMessage = <<<EOT
        <html>
        <head>

        </head>
        <body style="font-family: 'Arial', sans-serif; font-size: 14px; line-height: 1.6; color: #000; background-color: #ffffff; padding: 30px;">
            <h2 style="padding: 0; margin: 0; text-align: center;">
                <small>SAINT BENEDICT MEDALLION</small>
            </h2>
            <h3 style="padding: 0; margin: 0; text-align: center;">
                <small>TRECE MARTIRES CITY</small>
            </h3>
            <h3 style="padding: 0; margin: 25px 0 15px 15px; text-align: left; color: #FFC107;">
                <small>{$message}</small>
            </h3>
            <hr>
            <h4 style="padding: 0; margin: 15px 0 0 0; text-align: left;">
                <small>
                    Please check your notification upon logging in at <a href="http://sbmedallion.infinityfreeapp.com/">sbmedallion.infinityfreeapp.com</a>
                </small>
            </h4>
        </body>
        </html>
        EOT;

        $mail->Body = $htmlMessage;
        $mail->AltBody = $plainTextMessage;
        $mail->send();
        echo "Sending an email is successful.";
    } catch (Exception $e) {
        echo "Sending an email is unsuccessful.";
    }

?>