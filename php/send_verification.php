<?php

    require_once __DIR__.'\..\vendor\autoload.php';
    require_once __DIR__.'\send_verification_config.php';

    function generateOTP() {
        $randomBytes = random_bytes(4);
        $hexString = bin2hex($randomBytes);
        $uppercasedHexString = strtoupper($hexString);
        return $uppercasedHexString;
    }

    $otp = generateOTP();

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
        $mail->addAddress($_POST['email']);
        $mail->Subject = "[SBM Account Verification]";
        $mail->Body = <<<EOT
    Your Verification code is: {$otp}
    EOT;
        $mail->send();
        echo $otp;
    } catch (Exception $e) {
        echo "ERROR";
    }

?>