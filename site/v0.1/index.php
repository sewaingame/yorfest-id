<?php
  session_start();

  include_once 'api.php';

  if(!isset($_SESSION['api_key']))
  {
    header('Location: login.php');
  }
  else {
    header('Location: home.php');
  }


?>
