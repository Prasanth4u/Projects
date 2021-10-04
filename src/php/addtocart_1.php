<?php
  session_start();
  include "dbcon.php";
  $data = json_decode(file_get_contents("php://input"));
  $btnName = $conn->real_escape_string($data->btnName);
  $id = $conn->real_escape_string($data->id);
  $sql = "SELECT pro_id, pro_name, pro_cost FROM rfid_prod where pro_id=$id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
      while ($row = $result->fetch_object())
      {
          $pid = $row->pro_id;
          $pname = $row->pro_name;
          $pcost = $row->pro_cost;

          // $sql1 = "INSERT INTO bill_db.`".$_SESSION["name"]."` (Pro_id, ItemName, Cost) VALUES ('" . $pid . "','" . $pname . "','" . $pcost . "')";
          // $conn->query($sql1);
          $sql1 = "INSERT INTO bill_db.`" . $_SESSION["name"] . "` (Pro_id, ItemName, Cost)
  		    VALUES ('" . $pid . "','" . $pname . "','" . $pcost . "')
  		    ON DUPLICATE KEY
          UPDATE Pro_id=NULL, ItemName = NULL, Cost = NULL";
          $conn->query($sql1);
      }
  }
  $conn->close();
?>
