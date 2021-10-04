<?php
session_start();
//$tmp_name=$_SESSION["name"];
include "dbcon.php";

$sql = "INSERT INTO chk_bill (chk_id, chk_name, chk_cost) SELECT Pro_id, ItemName, Cost FROM bill_db.`" . $_SESSION["name"] . "` WHERE Pro_id IS NOT NULL";
$result = $conn->query($sql);

$sql1 = "INSERT INTO bill_amount (user_name, transaction_amt) VALUES ('" . $_SESSION["name"] . "','" . $_SESSION["total"] . "')";
$result = $conn->query($sql1);

//to insert into b_history table
$sql2 = "INSERT INTO b_his (bh_Cname, bh_Ctot, bh_list) VALUES ('" . $_SESSION["name"] . "', '" . $_SESSION['total'] . "', '" . $_SESSION['list'] . "')";
$conn->query($sql2);
// print $_SESSION["name"];
// print $_SESSION["total"];
// print $_SESSION["list"];

?>
<html>
    <head>
        <meta http-equiv="refresh" content="3;url=logout_1.php" />
		<style>
			div {
			  border: 1px solid black;
			  margin-top: 100px;
			  margin-bottom: 100px;
			  margin-right: 150px;
			  margin-left: 80px;
			  background-color: lightblue;
			}
		</style>
    </head>
    <body>
		<center>
			<div>
				<h1>Amount:Rs. <?php echo "$_SESSION[total]" ?></h1>
				<h2>Payment Gateway.. Success</h2>
				<h3>Redirecting in 3 seconds...</h3>
			</div>
		</center>

    </body>
</html>
