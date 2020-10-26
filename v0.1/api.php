<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;


  function register($data)
  {
    include_once 'connection.php';

    $response["error"] = false;
    $response["message"] = "";
    $response["data"] = null;
    $verifiedkey = uniqid();

    $sql = '
    INSERT INTO participant(name, email, phone, birth, company, interest, password, verifiedkey, photourl, cardurl)
    VALUES("'.$data['name'].'","'.$data['email'].'","'.$data['phone'].'","'.$data['birth'].'","'.$data['company'].'","'.$data['interest'].'","'.$data['password'].'","'.$verifiedkey.'","'.$data['photourl'].'","'.$data['cardurl'].'")
    ';

    if ($con->query($sql) === TRUE)
    {
      $data['verifiedkey'] = $verifiedkey;

      $response['data'] = $data;
      $response = sendEmail($data, 'register');
    }
    else
    {
      $checkverify = checkemail($data);

      if($checkverify['data']['verified'] == 0)
      {
        $response = sendEmail($checkverify['data'], 'register');
        $response["error"] = false;
        $response["message"] = "";
      }

      $response["error"] = true;
      $response["message"] = $con->error;
      $response["data"] = null;
    }

    $con->close();

    return $response;
  }

  function sendEmail($data, $body)
  {
    require dirname(__FILE__).'/PHPMailer/src/PHPMailer.php';
    require dirname(__FILE__).'/PHPMailer/src/Exception.php';
    require dirname(__FILE__).'/PHPMailer/src/SMTP.php';
    require dirname(__FILE__).'/PHPMailer/src/OAuth.php';

    include 'emailconfig.php';

    $response["error"] = false;
    $response["message"] = "Sending Email";
    $response["data"] = $data;

    $mail = new PHPMailer(true);

    if($body == 'reset')
    {
      $body = GetResetBody($data, $domain);
      $subjectText = $subjectReset;
    }
    else if($body == 'register'){
      $body = GetBody($data, $domain);
      $subjectText = $subject;
    }

    /*
    try {
        //Server settings
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = $smtpaddress;
        $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = false;
        $mail->Username = $sender;
        $mail->Password = $password;
        $mail->Port = $smtpport;

        $mail->setFrom($sender , $sendername);
        $mail->addAddress($data['email'], $data['name']);
        $mail->AddReplyTo($data['email'], $data['name']);
        //$mail->addBCC('sewaingame@gmail.com');

        // Attachments
        for ($i=0; $i < count($attachment); $i++)
        {
          $mail->addAttachment($attachment[$i]);
        }

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subjectText;
        $mail->Body    = $body;

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
    */
    return $response;
    }

    function sendresetpasswordemail($data)
    {
      include 'connection.php';

      $response["error"] = true;
      $response["message"] = "";

      $sql = 'SELECT * FROM participant WHERE email="'.$data["email"].'"';

      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
          $data["name"] = $row['name'];
          $data["phone"] = $row['phone'];
          $data["email"] = $row['email'];
          $data["verifiedkey"] = $row['verifiedkey'];

          $response = $data;
          $response = sendEmail($data, 'reset');
        }
      }

      $con->close();

      return $response;
    }

    function verify($data)
    {
      include_once 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = null;
      $verifiedkey = uniqid();

      $sql = 'UPDATE participant SET verified=1,verifiedtime=now() WHERE  verified=0 AND verifiedkey="'.$data['verifiedkey'].'"';

      $response["sql"] = $sql;

      if ($con->query($sql) === TRUE)
      {
        if(mysqli_affected_rows($con) == 0)
        {
          $response["error"] = true;
          $response["message"] = "Link sudah tidak berlaku.";
        }
        else
        {
          $response["error"] = false;
          $response["message"] = "";
        }
      }
      else
      {
        $response["error"] = true;
        $response["message"] = $con->error;
        $response["data"] = null;
      }

      $con->close();

      return $response;
    }

    function resendverify($data)
    {
      include_once 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = null;

      $sql = 'SELECT * FROM participant WHERE verifiedkey="'. $data['verifiedkey'] .'"';
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
          $data["name"] = $row['name'];
          $data["email"] = $row['email'];
          $data["phone"] = $row['phone'];
          $data["birth"] = $row['birth'];
          $data["company"] = $row['company'];
          $data["interest"] = $row['interest'];

          $response = sendEmail($data, 'register');
        }
      }

      return $response;

      $con->close();
    }

    function login($data)
    {
      include_once 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = null;

      $sql = 'SELECT * FROM participant WHERE email="'. $data['email'] .'" AND password="'.$data['password'].'"';
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
          $data["name"] = $row['name'];
          $data["email"] = $row['email'];
          $data["phone"] = $row['phone'];
          $data["birth"] = $row['birth'];
          $data["company"] = $row['company'];
          $data["interest"] = $row['interest'];
          $data["password"] = $row['password'];
          $data["verified"] = $row['verified'];
          $data["photourl"] = $row['photourl'];
          $data["cardurl"] = $row['cardurl'];
          $data["verifiedkey"] = $row['verifiedkey'];

          $apikey = uniqid();
          $data["api_key"] = $apikey;

          $response['data'] = $data;
          $sql2 = 'UPDATE participant SET api_key="'.$apikey.'", last_update=now() WHERE id="'. $row['id'] .'"';
          if($result2 = $con->query($sql2)){}
          else
          {
              $response["error"] = true;
              $response["message"] = $con->error;
          }

          if($data["verified"] == 0)
          {
            $response["error"] = true;
            $response["message"] = "Please verify your email first.";
          }

          AddLoginLog($row['id']);
        }
      }
      else
      {
        $response["error"] = true;
        $response["message"] = "Wrong email or password.";
        $response["data"] = null;
      }

      $con->close();

      return $response;

    }

    function checkapikey($data)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = null;

      $sql = 'SELECT * FROM `participant` WHERE `api_key`="'. $data['api_key'] .'"';

      if($result = $con->query($sql))
      {
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc())
          {
            $sql2 = 'UPDATE participant SET last_update=now() WHERE api_key="'. $data['api_key'] .'"';
            $con->query($sql2);

            $data["id"] = $row['id'];
            $data["name"] = $row['name'];
            $data["email"] = $row['email'];
            $data["phone"] = $row['phone'];
            $data["birth"] = $row['birth'];
            $data["company"] = $row['company'];
            $data["interest"] = $row['interest'];
            $data["verified"] = $row['verified'];
            $data["verifiedkey"] = $row['verifiedkey'];
            $data["last_update"] = $row['last_update'];
            $response["data"] = $data;
          }
        }
        else
        {
          $response["error"] = true;
        }
      }
      else
      {
        $response["error"] = true;
        $response["message"] = $con->error;
      }

      return $response;

      $con->close();
    }

    function checkemail($data)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = null;

      $sql = 'SELECT * FROM participant WHERE email="'. $data['email'] .'"';
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
          $data["id"] = $row['id'];
          $data["name"] = $row['name'];
          $data["phone"] = $row['phone'];
          $data["email"] = $row['email'];
          $data["birth"] = $row['birth'];
          $data["company"] = $row['company'];
          $data["interest"] = $row['interest'];
          $data["verified"] = $row['verified'];
          $data["verifiedkey"] = $row['verifiedkey'];
          $response["data"] = $data;
        }
      }
      else
      {
        $response["error"] = true;
      }

      return $response;

      $con->close();
    }

    function AddLoginLog($participantid)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";

      $sql = '
      INSERT INTO login(`participantid`) VALUES('.$participantid.')
      ';

      if ($con->query($sql) === TRUE)
      {
        if(mysqli_affected_rows($con) == 0)
        {
          $response["error"] = true;
        }
        else
        {
          $response["error"] = false;
        }
      }
      else
      {
        $response["error"] = true;
        $response["message"] = $con->error;
      }

      $con->close();

      return $response;
    }

    function AddPageViewLog($api_key, $pageid)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $data["api_key"] = $api_key;

      $sqlView = 'UPDATE page SET view=view+1 WHERE id='. $pageid;
      $con->query($sqlView);

      $participantid = "NULL";

      if($api_key != "null")
        $participantid = checkapikey($data)['data']['id'];

      $sql = 'INSERT INTO pageview(`participantid`, `pageid`) VALUES('.$participantid.','.$pageid.')';

      if ($con->query($sql) === TRUE)
      {
        if(mysqli_affected_rows($con) == 0)
        {
          $response["error"] = true;
        }
        else
        {
          $response["error"] = false;
        }
      }
      else
      {
        $response["error"] = true;
        $response["message"] = $con->error;
      }

      $con->close();

      return $response;
    }

    function checkverifiedkey($data)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = null;

      $verifiedkey = uniqid();

      $sql = 'SELECT * FROM participant WHERE verifiedkey="'. $data['verifiedkey'] .'"';
      $result = $con->query($sql);

      if ($result->num_rows > 0)
      {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
          $data["id"] = $row['id'];
          $data["name"] = $row['name'];
          $data["phone"] = $row['phone'];
          $data["email"] = $row['email'];
          $data["verifiedkey"] = $row['verifiedkey'];

          $sql2 = 'UPDATE participant SET verifiedkey="'.$verifiedkey.'" WHERE id=' . $data["id"];

          if($con->query($sql2))
          {
            $data["verifiedkey"] = $verifiedkey;
            $data["sql"] = $sql2;
          }

          $response["data"] = $data;
        }
      }
      else
      {
        $response["error"] = true;
      }

      return $response;

      $con->close();
    }

    function changepassword($data)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";

      $verifiedkey = uniqid();

      $sql = 'UPDATE participant SET verifiedkey="'.$verifiedkey.'", password="'.$data['password'].'" WHERE verifiedkey="'.$data['verifiedkey'].'"';

      if ($con->query($sql) === TRUE)
      {
        if(mysqli_affected_rows($con) == 0)
        {
          $response["error"] = true;
        }
        else
        {
          $response["error"] = false;
        }
      }
      else
      {
        $response["error"] = true;
        $response["message"] = $con->error;
      }

      $con->close();

      return $response;
    }

    function savemessage($data)
    {
      include 'connection.php';

      $sql = 'INSERT INTO message(`name`,`email`,`telepon`,`subject`,`message`) VALUES("'.$data['name'].'","'.$data['email'].'","'.$data['telepon'].'","'.$data['subject'].'","'.$data['message'].'")';

      if ($con->query($sql) === TRUE)
      {
        if(mysqli_affected_rows($con) == 0)
        {
          $response["error"] = true;
        }
        else
        {
          $response["error"] = false;
        }
      }
      else
      {
        $response["error"] = true;
        $response["message"] = $con->error;
      }

      $con->close();

      return $response;
    }

    function newpost($data)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";

      $user = checkapikey($data);

      $sql = 'INSERT INTO livewall(`participantid`,`message`) VALUES("'.$user['data']['id'].'","'.$data['message'].'")';

      if ($con->query($sql) === TRUE)
      {
        if(mysqli_affected_rows($con) == 0)
        {
          $response["error"] = true;
        }
        else
        {
          $response["error"] = false;
        }
      }
      else
      {
        $response["error"] = true;
        $response["message"] = $con->error;
      }

      $con->close();

      return $response;
    }

    function getpost($data, $time, $id)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = [];

      $sql = 'SELECT * FROM livewall WHERE id>'. $data['last_post_id'] .' ORDER BY id DESC LIMIT 5';

      if($time == 'old'){
        $sql = 'SELECT * FROM livewall WHERE id<'.$data['first_post_id'].' ORDER BY id DESC LIMIT 5';

      }

      if($id != 0)
      {
        $sql = 'SELECT * FROM livewall WHERE id=' . $data['id'];
        $response["sql"] = $sql;
      }


      $result = $con->query($sql);

      unset($data['api_key']);
      unset($data['last_post_id']);

      if ($result->num_rows > 0)
      {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
          $newPost = [];
          $newPost["id"] = $row['id'];
          $newPost["message"] = $row["message"];
          $newPost["time"] = $row["time"];
          $newPost["updated"] = $row["updated"];
          $newPost["like"] = [];
          $newPost["comment"] = [];
          $newPost["user"] = getParticipantByID($row["participantid"]);
          // $userSQL = "SELECT id, name, photourl FROM participant WHERE id=".$row["participantid"];
          // $resultUser = $con->query($userSQL);
          //
          // while($rowUser = $resultUser->fetch_assoc())
          // {
          //   $newPost["user"] = [];
          //   $newPost["user"]["id"] = $rowUser["id"];
          //   $newPost["user"]["name"] = $rowUser["name"];
          //   $newPost["user"]["photourl"] = $rowUser["photourl"];
          // }

          $likeSQL = "SELECT id, participantid, time FROM livewall_like WHERE livewallid=".$newPost["id"];
          $resultLike = $con->query($likeSQL);

          while($rowLike = $resultLike->fetch_assoc())
          {
            $like = [];
            $like["id"] = $rowLike["id"];
            $like["user"] = getParticipantByID($rowLike["participantid"]);
            $like["time"] = $rowLike["time"];

            $newPost["like"][] = $like;
          }

          $commentSQL = "SELECT `id`, `message`, `participantid`, `time` FROM `livewall_comment` WHERE `livewallid`=".$newPost["id"];
          $resulLike = $con->query($commentSQL);

          while($rowComment = $resulLike->fetch_assoc())
          {
            $comment = [];
            $comment["id"] = $rowComment["id"];
            $comment["user"] = $newPost["user"] = getParticipantByID($rowComment["participantid"]);
            $comment["message"] = $rowComment["message"];
            $comment["time"] = $rowComment["time"];

            $newPost["comment"][] = $comment;
          }

          $response["data"][] = $newPost;
        }
      }

      $con->close();

      return $response;
    }

    function newcomment($data)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";

      $user = checkapikey($data);

      $sql = 'INSERT INTO livewall_comment(`livewallid`,`participantid`,`message`) VALUES('.$data['id'].','.$user['data']['id'].',"'.$data['message'].'")';

      if ($con->query($sql) === TRUE)
      {
        if(mysqli_affected_rows($con) == 0)
        {
          $response["error"] = true;
        }
        else
        {
          $sqlUpdate = 'UPDATE livewall SET updated=now() WHERE id=' . $data['id'];

          $con->query($sqlUpdate);

          $response["error"] = false;
        }
      }
      else
      {
        $response["error"] = true;
        $response["message"] = $con->error;
      }

      $con->close();

      return $response;
    }

    function getParticipantByID($id)
    {
      include 'connection.php';

      $response = [];

      $userSQL = "SELECT id, name, photourl, email, company FROM participant WHERE id=".$id;
      $resultUser = $con->query($userSQL);

      while($rowUser = $resultUser->fetch_assoc())
      {
        $response = [];
        $response["id"] = $rowUser["id"];
        $response["name"] = $rowUser["name"];
        $response["email"] = $rowUser["email"];
        $response["company"] = $rowUser["company"];
        $response["photourl"] = $rowUser["photourl"];
      }

      $con->close();

      return $response;
    }

    function checkpostupdated($data)
    {
      include 'connection.php';

      $response = [];
      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = $data;


      $userSQL = 'SELECT id FROM livewall WHERE id='.$data["id"] . ' AND time="'.$data['time'].'"';
      $resultUser = $con->query($userSQL);

      if ($resultUser->num_rows > 0) {

      }
      else
      {
        $response["error"] = true;
      }

      $con->close();

      return $response;
    }

    function likepost($data)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = $data;

      $user = checkapikey($data);

      $likeExists = checklike($data);

      $sql = 'INSERT INTO livewall_like(`livewallid`, `participantid`) VALUES('.$data["id"].','.$user["data"]["id"].')';
      if($likeExists["error"] == false)
      {
        $sql = 'DELETE FROM livewall_like WHERE `livewallid`='.$data["id"].' AND `participantid`='.$user["data"]["id"];
      }

      if ($con->query($sql) === TRUE)
      {
        if(mysqli_affected_rows($con) == 0)
        {
          $response["error"] = true;
        }
        else
        {
          $response["error"] = false;
        }
      }
      else
      {
        $response["error"] = true;
        $response["message"] = $con->error;
      }

      $con->close();

      return $response;
    }

    function checklike($data)
    {
      include 'connection.php';

      $response = [];
      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = $data;

      $user = checkapikey($data);

      $userSQL = 'SELECT id FROM livewall_like WHERE livewallid='.$data["id"] . ' AND participantid='.$user['data']['id'];
      $resultUser = $con->query($userSQL);

      if ($resultUser->num_rows > 0) {

      }
      else
      {
        $response["error"] = true;
      }

      $con->close();

      return $response;
    }

    function userlist($data)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = [];

      $user = checkapikey($data);

      $sql = 'SELECT * FROM participant WHERE id!=' . $user['data']['id'] . ' AND name LIKE "%'.$data["filter"].'%"';
      $result = $con->query($sql);

      if ($result->num_rows > 0)
      {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
          $newUser = [];
          $newUser["id"] = $row['id'];
          $newUser["name"] = $row['name'];
          $newUser["phone"] = $row['phone'];
          $newUser["email"] = $row['email'];
          $newUser["birth"] = $row['birth'];
          $newUser["company"] = $row['company'];
          $newUser["interest"] = $row['interest'];
          $newUser["photourl"] = $row['photourl'];
          $newUser["cardurl"] = $row['cardurl'];
          $newUser["last_update"] = $row['last_update'];

          $response["data"][] = $newUser;
        }
      }
      else
      {
        $response["error"] = true;
      }

      return $response;

      $con->close();
    }

    function sendchat($data)
    {
      include 'connection.php';
      $response["error"] = false;
      $response["message"] = "";

      $sender = checkapikey($data)["data"];
      $chatid = getchatid($data['to'], $sender['id']);

      $sqlChatID = 'INSERT INTO chatid(`id`) SELECT * FROM (SELECT "'.$chatid.'") AS tmp WHERE NOT EXISTS (SELECT id FROM chatid WHERE id="'.$chatid.'")';
      $sqlSenderParticipantChat = 'INSERT INTO participant_chat(`participantid`, `chatid`) SELECT * FROM (SELECT '.$sender['id'].', "'.$chatid.'") AS tmp WHERE NOT EXISTS (SELECT id FROM participant_chat WHERE `participantid`='.$sender["id"].' AND `chatid`="'.$chatid.'")';
      $sqlToParticipantChat = 'INSERT INTO participant_chat(`participantid`, `chatid`) SELECT * FROM (SELECT '.$data['to'].', "'.$chatid.'") AS tmp WHERE NOT EXISTS (SELECT id FROM participant_chat WHERE `participantid`='.$data['to'].' AND `chatid`="'.$chatid.'")';
      $sqlChat = 'INSERT INTO chat(`id`, `chatid`, `participantid`, `message`) VALUES ("'.$data['id'].'", "'.$chatid.'", '.$sender['id'].', "'.$data['message'].'" )';

      if(!($con->query($sqlChatID)))
      {
        $response["error"] = true;
        $response["message"] = $con->error;
        return $response;
        return;
      }
      if(!($con->query($sqlSenderParticipantChat)))
      {
        $response["error"] = true;
        $response["message"] = $con->error;
        return $response;
        return;
      }
      if(!($con->query($sqlToParticipantChat)))
      {
        $response["error"] = true;
        $response["message"] = $con->error;
        return $response;
        return;
      }
      if(!($con->query($sqlChat)))
      {
        $response["error"] = true;
        $response["message"] = $con->error;
        return $response;
        return;
      }

      $selectChatTime = 'SELECT time FROM chat WHERE id="'.$data["id"].'"';
      $result = $con->query($selectChatTime);

      if ($result->num_rows > 0)
      {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
          $data['time'] = $row['time'];
        }
      }
      else
      {
        $response["error"] = true;
        $response["message"] = $con->error;
      }

      $response["data"] = $data;

      return $response;
    }

    function getchatid($userid1, $userid2)
    {
      $id1 = $userid1;
      $id2 = $userid2;

      if($id1 > $id2)
      {
        $id1 = $userid2;
        $id2 = $userid1;
      }

      return md5($id1 . '-' . $id2);
    }

    function getchat($data)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = [];
      $response["data"]["chats"] = [];

      $sender = checkapikey($data)["data"];
      $chatid = getchatid($data['to'], $sender['id']);

      $data["myid"] = $sender["id"];

      $response["data"] = $data;

      $sql = 'SELECT * FROM chat WHERE chatid="'.$chatid.'" AND counter>' . $_POST["maxCounter"] . ' ORDER BY counter DESC LIMIT 20';

      if($data['time'] == "old")
        $sql = 'SELECT * FROM chat WHERE chatid="'.$chatid.'" AND counter<' . $_POST["minCounter"] . ' ORDER BY counter DESC LIMIT 20';

      $result = $con->query($sql);

      if ($result->num_rows > 0)
      {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
          $newChat = [];
          $newChat["counter"] = $row['counter'];
          $newChat["id"] = $row['id'];
          $newChat["chatid"] = $row['chatid'];
          $newChat["participantid"] = $row['participantid'];
          $newChat["message"] = $row['message'];
          $newChat["time"] = $row['time'];

          $response["data"]["chats"][] = $newChat;
        }
      }

      return $response;

      $con->close();
    }

    function getchatlist($data)
    {
      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = [];

      $sender = checkapikey($data)["data"];

      $sql = 'SELECT participantid, chatid FROM `participant_chat` WHERE participantid!='.$sender['id'].' AND chatid IN (SELECT chatid FROM participant_chat WHERE participantid='.$sender['id'].') GROUP BY participantid';

      $result = $con->query($sql);

      if ($result->num_rows > 0)
      {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
          $newParticipant = [];
          $newParticipant["participant"] = getParticipantByIDAllData($row['participantid']);

          $sqlTotalChat = 'SELECT COUNT(counter) as total FROM chat WHERE status=0 AND participantid=' . $row['participantid'] . ' AND chatid="'.$row['chatid'].'"';
          $resultTotalChat = $con->query($sqlTotalChat);

          $newParticipant["sql"] = $sqlTotalChat;
          $newParticipant["totalchat"]  = 0;
          while($rowTotalChat = $resultTotalChat->fetch_assoc())
          {
            $newParticipant["totalchat"] = $rowTotalChat["total"];
          }

          $sqlLastChat = 'SELECT time FROM chat WHERE participantid=' . $row['participantid'] . ' AND chatid="'.$row['chatid'].'" ORDER BY counter DESC LIMIT 1';
          $resultLastChat = $con->query($sqlLastChat);
          $newParticipant["time"] = "";
          while($rowLastChat = $resultLastChat->fetch_assoc())
          {
            $newParticipant["time"] = $rowLastChat["time"];
          }

          // $response["sql"] = $sqlLastChat;
          $response["data"][] = $newParticipant;
        }
      }

      return $response;

      $con->close();
    }

    function getParticipantByIDAllData($id)
    {
      include 'connection.php';

      $response = [];
      $userSQL = "SELECT * FROM participant WHERE id=".$id;
      $resultUser = $con->query($userSQL);

      while($rowUser = $resultUser->fetch_assoc())
      {
        $response = [];
        $response["id"] = $rowUser["id"];
        $response["name"] = $rowUser["name"];
        $response["email"] = $rowUser["email"];
        $response["birth"] = $rowUser["birth"];
        $response["company"] = $rowUser["company"];
        $response["interest"] = $rowUser["interest"];
        $response["photourl"] = $rowUser["photourl"];
        $response["cardurl"] = $rowUser["cardurl"];
        $response["last_update"] = $rowUser["last_update"];
      }

      $con->close();

      return $response;
    }

    function markchatasread($data)
    {
      checkapikey($data);

      include 'connection.php';

      $response["error"] = false;
      $response["message"] = "";
      $response["data"] = $data;

      $sql = 'UPDATE chat SET status=1 WHERE id="'.$data["id"].'"';
      $response["sql"] = $sql;
      $resultUser = $con->query($sql);

      $con->close();

      return $response;
    }
?>
