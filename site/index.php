<?php

  include 'version.php';

  session_start();
  $_SESSION['version'] = $version;
  header('Refresh: 0, url = v' . $version);
?>
