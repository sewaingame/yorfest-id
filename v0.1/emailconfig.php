<?php
  $domain = 'yorfest.id';
  $sender = "noreply@hut56partaigolkar.id";
  $sendername = "YORFest 2020";
  $password = 'chelsea2018';
  $subject = '[VERIFIKASI EMAIL] YORFest 2020';
  $subjectReset = '[RESET PASSWORD] YORFest 2020';
  $smtpaddress = 'jupiter.webmail.co.id';
  $smtpport = 587;
  $smtpsecure = 'ssl';
  $attachment = [];

  function GetBody($data, $domain)
  {
    $body = '
    Yth. '.$data['name'].',
    <br>
    <br>
    Terima kasih telah melakukan registrasi pada platform YORFest 2020!
    <br>
    Klik link di bawah ini untuk memverifikasi email anda :
    <br>
    <br>
    <a href="https://'.$domain.'/verify.php?key=' . $data['verifiedkey']. '"> Konfirmasi Email </a>
    <br>
    <br>
    Kunjungi YORFest 2020 world di '.$domain.'
    <br>
    Sampai bertemu!
    <br>
    <br>
    Hormat kami,
    <br>
    YORFest 2020
    <br>
    <br>
    ';

    return $body;
  }

  function GetResetBody($data, $domain)
  {
    $body = '
    Yth. '.$data['name'].',
    <br>
    <br>
    Klik link di bawah ini untuk mereset password anda :
    <br>
    <br>
    <a href="https://'.$domain.'/resetpassword.php?key=' . $data['verifiedkey']. '"> Reset Password </a>
    <br>
    <br>
    Hormat kami,
    <br>
    YORFest 2020
    ';

    return $body;
  }
?>
