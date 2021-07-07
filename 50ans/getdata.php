<?php

$db = mysqli_connect('localhost', 'root', 'root', 'rudhweb');

$sel = mysqli_query($db,"select * from ans50");
$data = array();

while ($row = mysqli_fetch_array($sel)) {
 $data[] = array("id"=>$row['id'],"name"=>$row['name'],"data"=>$row['data']);
}
echo json_encode($data);