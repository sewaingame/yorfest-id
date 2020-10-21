<?php
  include 'version.php';
  header('Location: v' . $version . '/apicall.php?c=v&key=' . $_GET['key']);
?>
