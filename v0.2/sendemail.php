<?php

include 'emailconfig.php';

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

require dirname(__FILE__) . '/PHPMailer/src/PHPMailer.php';
require dirname(__FILE__) . '/PHPMailer/src/Exception.php';
require dirname(__FILE__) . '/PHPMailer/src/SMTP.php';
require dirname(__FILE__) . '/PHPMailer/src/OAuth.php';

$data['name'] = $_POST['name'];
$data['email'] = $_POST['email'];
$data['verifiedkey'] = $_POST['verifiedkey'];

$response["error"] = false;
$response["message"] = "Sending Email";
$response["data"] = $data;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->SMTPDebug = 4;
    $mail->Host = $smtpaddress;
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false;
    $mail->Username = $sender;
    $mail->Password = $password;
    $mail->Port = $smtpport;


    $mail->setFrom($sender , $sendername);
    $mail->addAddress($data['email'], $data['name']);
    //$mail->addBCC('sewaingame@gmail.com');

    // Attachments
    for ($i=0; $i < count($attachment); $i++)
    {
      $mail->addAttachment($attachment[$i]);
    }

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = GetBody($data, $domain);

    $mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
      )
    );

    $mail->send();
    $response["message"] = 'Email sudah terkirim.';
}
catch (Exception $e)
{
    $response["error"] = true;
    $response["message"] = "Send email error : " . $mail->ErrorInfo;
}

echo json_encode($response) ;

?>
