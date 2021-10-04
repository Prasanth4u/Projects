<?php
  include "dbcon.php";
  session_start();
  $name=$_SESSION["name"];

  $query = "select bh_list from b_his where sno=1";
  $rs = $conn->query($query);
  while ($row = $rs->fetch_array())
  {
      $data[] = $row;
  }
  print json_encode($data);
?>
