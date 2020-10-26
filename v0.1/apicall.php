<?php

  include 'api.php';

  $cmd = "";



  if(isset($_POST['cmd']))
  {
    $cmd = $_POST['cmd'];
  }

  if(isset($_GET['c']))
  {
    $cmd = $_GET['c'];
  }

  if(isset($_POST["api_key"]))
  {
    $data['api_key'] = $_POST['api_key'];
    checkapikey($data);
  }

  if($cmd == "register")
  {
    $data["name"] = $_POST['name'];
    $data["email"] = $_POST['email'];
    $data["phone"] = $_POST['phone'];
    $data["birth"] = $_POST['birth'];
    $data["company"] = $_POST['company'];
    $data["conference"] = $_POST['conference'];
    $data["interest"] = $_POST['interest'];
    $data["password"] = md5($_POST['password']);
    $data["photourl"] = "images/user.png";
    $data["cardurl"] = "images/card.png";

    if(isset($_FILES["profilepicture"]))
    {
      $target_file = "profilepictures/" . $data["email"] . "." . strtolower(pathinfo($_FILES["businesscard"]["name"],PATHINFO_EXTENSION));

      if (file_exists($target_file))
      {
         unlink($target_file);
      }


      if (move_uploaded_file($_FILES["profilepicture"]["tmp_name"], '../' . $target_file))
      {
        $data["photourl"] = $target_file;
      }
    }

    if(isset($_FILES["businesscard"]))
    {
      $target_file = "businesscard/" . $data["email"] . "." . strtolower(pathinfo($_FILES["businesscard"]["name"],PATHINFO_EXTENSION));

      if (file_exists($target_file))
      {
         unlink($target_file);
      }

      if (move_uploaded_file($_FILES["businesscard"]["tmp_name"], '../'. $target_file))
      {
        $data["cardurl"] = $target_file;
      }
    }

    echo json_encode(register($data), JSON_PRETTY_PRINT);
  }
  else if($cmd == "rc")
  {
    $data["verifiedkey"] = $_GET['key'];

    $response = resendverify($data);

    $response['data']['password'] = null;

    echo json_encode($response, JSON_PRETTY_PRINT);

    header("Location: emailconfirmationsent.php?key=" . $data["verifiedkey"]);
  }
  else if($cmd == "ck")
  {
    $data["api_key"] = $_POST['api_key'];

    $response = checkapikey($data);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "v")
  {
    $data["verifiedkey"] = $_GET['key'];

    $response = verify($data);

    $result = "false";

    if($response['error'] == 1)
      $result = "true";

    echo json_encode($response, JSON_PRETTY_PRINT);

    if($result == 'true')
      header("Location: linkexpired.php?e=" . $result);
    else
      header("Location: emailconfirmation.php?e=" . $result);
  }
  else if($cmd == "login")
  {
    $data["email"] = $_POST['email'];
    $data["password"] = md5($_POST['password']);

    $response = login($data);

    session_start();

    if($response['error'] != 1)
    {
      $_SESSION["api_key"] = $response['data']['api_key'];
      $_SESSION["name"] = $response['data']['name'];
      $_SESSION["email"] = $response['data']['email'];
      $_SESSION["phone"] = $response['data']['phone'];
      $_SESSION["birth"] = $response['data']['birth'];
      $_SESSION["company"] = $response['data']['company'];
      $_SESSION["interest"] = $response['data']['interest'];
    }
    $response['data']['password'] = null;
    echo json_encode( $response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "forgetpassword")
  {
    $data['email'] = $_POST['email'];

    $response = sendresetpasswordemail($data);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "r")
  {
    $data['verifiedkey'] = $_GET['key'];

    $response = checkverifiedkey($data);

    $result = "false";

    if($response['error'] == 1)
      $result = "true";

    if($result == 'true')
      header("Location: linkexpired.php?e=" . $result);
    else
      header('Location: resetpassword.php?e='. $response['error'] .'&key=' .$response['data']['verifiedkey']);
  }
  else if($cmd == "resetpassword")
  {
    $data['verifiedkey'] = $_POST['verifiedkey'];
    $data['password'] = md5($_POST['password']);

    $response = changepassword($data);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "contact")
  {
    $data['nama'] = $_POST['nama'];
    $data['email'] = $_POST['email'];
    $data['telepon'] = $_POST['telepon'];
    $data['subject'] = $_POST['subject'];
    $data['message'] = $_POST['message'];

    $response = savemessage($data);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "newpost")
  {
    $data['api_key'] = $_POST['api_key'];
    $data['message'] = $_POST['message'];

    $response = newpost($data);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "lw")
  {
    $data['api_key'] = $_POST['api_key'];
    $data['last_post_id'] = $_POST['last_post_id'];
    $data['first_post_id'] = $_POST['first_post_id'];

    $response = getpost($data, $_POST['methode'], 0);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "cm")
  {
    $data['api_key'] = $_POST['api_key'];
    $data['id'] = $_POST['id'];
    $data['message'] = $_POST['message'];

    $response = newcomment($data);
    $response['data'] = [];
    $response['data']['id'] = $data['id'];

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "cc")
  {
    $data['api_key'] = $_POST['api_key'];
    $data['id'] = $_POST['id'];
    $data['last_post_id'] = 0;
    $data['first_post_id'] = 0;

    $response = getpost($data, '', $_POST['id']);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "cp")
  {
    $data['api_key'] = $_POST['api_key'];
    $data['id'] = $_POST['id'];
    $data['time'] = $_POST['time'];

    $response = checkpostupdated($data, '', $_POST['id']);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "lc")
  {
    $data['api_key'] = $_POST['api_key'];
    $data['id'] = $_POST['id'];

    $response = likepost($data);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "ul")
  {
    $data['api_key'] = $_POST['api_key'];
    $data['filter'] = $_POST['filter'];

    $response = userlist($data);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "sc")
  {
    $data['api_key'] = $_POST['api_key'];
    $data['to'] = $_POST['to'];
    $data['message'] = $_POST['message'];
    $data['chatid'] = $_POST['chatid'];
    $data['id'] = $_POST['id'];

    $response = sendchat($data);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "ch")
  {
    $data['api_key'] = $_POST['api_key'];
    $data['to'] = $_POST['to'];
    $data['maxCounter'] = $_POST['maxCounter'];
    $data['minCounter'] = $_POST['minCounter'];
    $data['time'] = $_POST['time'];

    $response = getchat($data);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "cl")
  {
    $data['api_key'] = $_POST['api_key'];

    $response = getchatlist($data);



    echo json_encode($response, JSON_PRETTY_PRINT);
  }
  else if($cmd == "mr")
  {
    $data['api_key'] = $_POST['api_key'];
    $data['id'] = $_POST['id'];

    $response = markchatasread($data);

    echo json_encode($response, JSON_PRETTY_PRINT);
  }


?>
