<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
function send_mail($send_to_mail,$send_to_fullname,$subject,$content)
{   global $config;
    $config_email=$config['email'];
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;   //thông báo                   // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = $config_email['smtp_host'];                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $config_email['smtp_user'];                     // SMTP username
        $mail->Password   = $config_email['smtp_pass'];                               // SMTP password
        $mail->SMTPSecure = $config_email['smtp_secure'];         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = $config_email['smtp_port'];    
        $mail->CharSet = 'UTF-8';                                // TCP port to connect to
    
        //Recipients
        $mail->setFrom($config_email['smtp_user'], $config_email['smtp_fullname']);
        $mail->addAddress($send_to_mail, $send_to_fullname);     // Add a recipient
      //  $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($config_email['smtp_user'], $config_email['smtp_fullname']);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //    Đính kèm
        // Attachments
     //   $mail->addAttachment($option);         // Add attachments
       // $mail->addAttachment('img/girl.jpg', 'girl.jpg');    // Optional name  thay đổi tên
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        // Bạn là người đẹp zai';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Đã gửi thành công';
    } catch (Exception $e) {
        echo "Email không được gửi : Chi tiết lỗi: {$mail->ErrorInfo}";
    }
}




// require 'PHPMailer/template/template.php';
// require 'PHPMailer/template/file_config.php';
// global $gmail,$name,$topic,$content,$file;
// send_mail($gmail,$name,$topic,$content,$file);
?>