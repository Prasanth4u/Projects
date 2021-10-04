<?php
  include "dbcon.php";
  $data=json_decode(file_get_contents("php://input"));

  $btnName=$conn->real_escape_string($data->btnName);

  $id=$conn->real_escape_string($data->id);
  $name=$conn->real_escape_string($data->name);
  $cost=$conn->real_escape_string($data->cost);

  $query="INSERT INTO rfid_prod VALUES('".$id."','".$name."','".$cost."')";
  $conn->query($query);
?>
