<?php
  include "dbcon.php";
  session_start();
  $name=$_SESSION["name"];

  $query = "select sno, bh_Cname, bh_time, bh_Ctot from b_his where bh_Cname='".$name."'";
  $rs = $conn->query($query);
  while ($row = $rs->fetch_array())
  {
      $data[] = $row;
  }
  print json_encode($data);
?>
