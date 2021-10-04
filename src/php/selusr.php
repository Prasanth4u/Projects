<?php
  include "dbcon.php";
  session_start();
  $query = "select * from users";
  $rs = $conn->query($query);
  while ($row = $rs->fetch_array())
  {
      $data[] = $row;
  }
  print json_encode($data);
?>
