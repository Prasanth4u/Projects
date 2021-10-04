<?php
  include 'dbcon.php';
  session_start();
  session_destroy();

  //$sql = "TRUNCATE TABLE bills";

  $sql = "DROP TABLE bill_db.`".$_SESSION["name"]."`";
  $conn->query($sql);

  header("location: ../../home.html");
  exit();
?>
