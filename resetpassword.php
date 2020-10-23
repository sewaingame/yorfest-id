<?php
  include 'version.php';

  header('Location: v' . $version . '/apicall.php?c=r&key=' . $_GET['key']);

?>
