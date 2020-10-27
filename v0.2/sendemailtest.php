<?php
  include 'version.php';

  $sender = "noreply@yorfest.id";
  $sendername = "Perayaan HUT 56 Partai Golkar";
  $password = 'chelsea2018';
  $subject = '[VERIFIKASI EMAIL] Perayaan HUT 56 Partai Golkar';
  $smtpaddress = 'jupiter.webmail.co.id';//'mail.hut56partaigolkar.id';//'';
  $smtpport = 587;
  $smtpsecure = 'ssl';
  $attachment = [];

  function GetBody($data)
  {
    $body = '
    Yth. '.$data['nama'].',
    <br>
    <br>
    Terima kasih telah melakukan registrasi pada platform Partai Golkar Virtual World!
    <br>
    Klik link di bawah ini untuk memverifikasi email anda :
    <br>
    <br>
    <a href="https://hut56partaigolkar.id/verify.php?key=' . $data['verifiedkey']. '"> Konfirmasi Email </a>
    <br>
    <br>
    Kunjungi platform Partai Golkar Virtual world di www.hut56partaigolkar.id
    <br>
    Anda dapat mejelajahi platform Partai Golkar Virtual World untuk mendapatkan informasi serta menghadiri seluruh rangkaian acara HUT 56 Partai Golkar.
    <br>
    Sampai bertemu!
    <br>
    <br>
    Hormat kami,
    <br>
    Sekretariat HUT 56 Partai Golkar
    <br>
    <br>
    Jangan lupa ikuti update informasi rangkaian kegiatan peringatan HUT Partai Golkar melalui:
    <br>
    Website : www.hut56partaigolkar.id
    <br>
    Youtube : PartaiGolkar
    <br>
    Instagram : @partaigolkar
    <br>
    Facebook: Partai Golar

    ';

    return $body;
  }
?>


<?php
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\Exception;

require dirname(__FILE__) . '/' . $version . '/PHPMailer/src/PHPMailer.php';
require dirname(__FILE__) . '/' . $version . '/PHPMailer/src/Exception.php';
require dirname(__FILE__) . '/' . $version . '/PHPMailer/src/SMTP.php';
require dirname(__FILE__) . '/' . $version . '/PHPMailer/src/OAuth.php';

$data['nama'] = $_GET['nama'];
$data['email'] = $_GET['email'];
$data['verifiedkey'] = $_GET['verifiedkey'];

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
    $mail->Port = $_GET['smtpport'];


    $mail->setFrom($sender , $sendername);
    $mail->addAddress($data['email'], $data['nama']);
    //$mail->addBCC('sewaingame@gmail.com');

    // Attachments
    for ($i=0; $i < count($attachment); $i++)
    {
      $mail->addAttachment($attachment[$i]);
    }

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = GetBody($data);

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
