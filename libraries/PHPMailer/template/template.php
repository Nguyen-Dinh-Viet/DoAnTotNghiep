<?php 
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
    function send_mail($gmail,$name,$topic,$content,$file)
    {
       // global $$gmail,$$name,$$topic,$$content,$$file;
        if(!empty($name)&&!empty($topic)&&!empty($content)&&!empty($file)&&!empty($gmail))
        {
            

// Load Composer's autoloader


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;   //thông báo                   // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = "smtp.gmail.com";                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = "cnttk53mta@gmail.com";                     // SMTP username
    $mail->Password   = '123465a@';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;    
    $mail->CharSet = 'UTF-8';                                // TCP port to connect to

    //Recipients
    $mail->setFrom("cnttk53mta@gmail.com", 'Zai đẹp');
    $mail->addAddress($gmail, $name);     // Add a recipient
  //  $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('cnttk53mta@gmail.com', 'CNTTK53 MTA');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //    Đính kèm
    // Attachments
    $mail->addAttachment($file);         // Add attachments
   // $mail->addAttachment('img/girl.jpg', 'girl.jpg');    // Optional name  thay đổi tên

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $topic;
    $mail->Body    = $content;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Đã gửi thành công';
} catch (Exception $e) {
    echo "Email không được gửi : Chi tiết lỗi: {$mail->ErrorInfo}";
}
        }
    }
?>