<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=fustore", "root", "root");

$column = array('t_id','user_name', 'time', 'transaction_amt');

$query = '
SELECT * FROM bill_amount
WHERE t_id LIKE "%'.$_POST["search"]["value"].'%"
OR user_name LIKE "%'.$_POST["search"]["value"].'%"
OR time LIKE "%'.$_POST["search"]["value"].'%"
OR transaction_amt LIKE "%'.$_POST["search"]["value"].'%"
';

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY t_id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$total_order = 0;

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["t_id"];
 $sub_array[] = $row["user_name"];
 $sub_array[] = $row["time"];
 $sub_array[] = $row["transaction_amt"];

 $total_order = $total_order + floatval($row["transaction_amt"]);
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM bill_amount";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST["draw"]),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data,
 'total'    => number_format($total_order, 2)
);

echo json_encode($output);


?>
