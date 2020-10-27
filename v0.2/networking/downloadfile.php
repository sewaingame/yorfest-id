<?php
  $file = $_GET["url"];
  header('Content-type: octet/stream');
  header('Content-disposition: attachment; filename='.basename($file).';');
  header('Content-Length: '.filesize($file));
  readfile($file);
?>
