<?php
  $file = $_GET["url"];
  header('Content-type: octet/stream');
  header('Content-disposition: attachment; filename='.$file.';');
  header('Content-Length: '.filesize($file));
  readfile($file);
?>
