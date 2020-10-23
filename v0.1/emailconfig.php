<?php
  $domain = 'hut56partaigolkar.id';
  $sender = "noreply@hut56partaigolkar.id";
  $sendername = "Perayaan HUT 56 Partai Golkar";
  $password = 'chelsea2018';
  $subject = '[VERIFIKASI EMAIL] Perayaan HUT 56 Partai Golkar';
  $subjectReset = '[RESET PASSWORD] Perayaan HUT 56 Partai Golkar';
  $smtpaddress = 'flash.webmail.co.id';//'';
  $smtpport = 587;
  $smtpsecure = 'ssl';
  $attachment = [];

  function GetBody($data, $domain)
  {
    $body = '
    Yth. '.$data['name'].',
    <br>
    <br>
    Terima kasih telah melakukan registrasi pada platform Partai Golkar Virtual World!
    <br>
    Klik link di bawah ini untuk memverifikasi email anda :
    <br>
    <br>
    <a href="https://'.$domain.'/verify.php?key=' . $data['verifiedkey']. '"> Konfirmasi Email </a>
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
    Facebook: Partai Golkar

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
    Facebook: Partai Golkar

    ';

    return $body;
  }
?>
