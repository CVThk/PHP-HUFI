<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi Mail</title>
    <style>
        .flex-center {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }

        .flex-center div {
            width: 20%;
        }

        .flex-center input,
        .flex-center textarea {
            flex: 1;
        }
    </style>
</head>
<?php
    require("./PHPMailer-master/src/PHPMailer.php");
    require("./PHPMailer-master/src/SMTP.php");

    if(isset($_POST['btnSend'])) {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP

        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "hoctapcvtpro@gmail.com";
        $mail->Password = "qgszrzddjicxntwi";
        
        $mail->SetFrom($_POST['email_to']);
        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['body'];
        $mail->AddAddress($_POST['email_to']);

        if($_POST['email_cc'] != '') {
            $mail->addCC($_POST['email_cc']);
        }
        if($_POST['email_bcc'] != '') {
            $mail->addBCC($_POST['email_bcc']);
        }

        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
    }
?>

<body>
    <div style="padding: 20px 460px;">
        <form action="SendMail.php" method="post" enctype="multipart/form-data">
            <div class="flex-center">
                <div>To</div>
                <input name="email_to" type="email" />
            </div>
            <div class="flex-center">
                <div>Cc</div>
                <input name="email_cc" type="email" />
            </div>
            <div class="flex-center">
                <div>Bccc</div>
                <input name="email_bcc" type="email" />
            </div>
            <div class="flex-center">
                <div>Title</div>
                <input name="subject" />
            </div>
            <div class="flex-center">
                <div>Content</div>
                <textarea name="body"></textarea>
            </div>
            <div class="flex-center">
                <div>File</div>
                <input name="file" type="file" />
            </div>
            <div style="text-align: center; margin-top: 10px;">
                <button name="btnSend" type="submit">Send</button>
            </div>
        </form>
    </div>
</body>

</html>