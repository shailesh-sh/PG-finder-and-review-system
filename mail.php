<?php
require_once('PHPMailer-master/PHPMailerAutoload.php');

class mail{
  public static function sendMail($subject, $body, $address){
    $mail = new PHPMailer;

    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = '';          // SMTP username
    $mail->Password = ''; // SMTP password
    $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                          // TCP port to connect to

    $mail->setFrom('noreply@pg.com');
    $mail->addAddress($address);

    $mail->isHTML(true);  // Set email format to HTML


    $mail->Subject = $subject;
    $mail->Body    = $body;

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}

}
 ?>
