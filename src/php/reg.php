<?php
  session_start();
  include 'dbcon.php';
  $data=json_decode(file_get_contents("php://input"));

  $name=$conn->real_escape_string($data->name);
  $Mbl=$conn->real_escape_string($data->Mbl);
  $cid=$conn->real_escape_string($data->cid);
  $_SESSION["r_db_name"]=$name;

  $sql = "INSERT INTO users VALUES ('" . $name . "','" . $Mbl . "','" . $cid . "')";
  $conn->query($sql);

  //$sql1 = "INSERT INTO users VALUES ('" . $name . "','" . $Mbl . "','" . $cid . "')";
  //$conn->query($sql1);
?>
