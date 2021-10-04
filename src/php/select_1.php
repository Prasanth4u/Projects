<?php
  include "dbcon.php";
  session_start();

  //$query = "select * from bill_db.`".$_SESSION["name"]."`  WHERE id NOT IN('1')";
  //$query = "select * from bill_db.`".$_SESSION["name"]."`  WHERE Pro_id IS NOT NULL";
  $query = "SELECT ItemName,COUNT(*) AS quan,(COUNT(*)*Cost) as Total  from bill_db.`".$_SESSION["name"]."` WHERE Pro_id IS NOT NULL GROUP BY ItemName ";
  $rs = $conn->query($query);
  while ($row = $rs->fetch_array())
  {
      $data[] = $row;
  }
  print json_encode($data);
  $_SESSION['list']= json_encode($data);

  $sql2 = "SELECT SUM(Cost) AS count FROM bill_db.`".$_SESSION["name"]."` ";
  $result = $conn->query($sql2);
  $rw = $result->fetch_assoc();
  $_SESSION['total']= $rw['count'];
  // print $total;
?>
