<?php
  include 'dbcon.php';
  session_start();
  session_destroy();

  header("location: ../../home.html");
  exit();
?>
