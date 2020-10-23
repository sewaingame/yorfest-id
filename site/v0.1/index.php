<?php
  session_start();

  if(!isset($_SESSION['api_key']))
  {
    header('Location: login.php');
  }
  else {
    header('Location: home.php');
  }


?>
