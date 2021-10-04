<?php
include 'dbcon.php';
session_start();
$usrid = $_POST["uid"];
// $_SESSION["total"]=0;
$sql = "select user_name from users where user_id=$usrid";
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    while ($row = $result->fetch_assoc())
    {
        $_SESSION["name"] = $row["user_name"];
        $_SESSION["login"] = True;
        $sql1 = "create table bill_db.`" . $_SESSION["name"] . "` as select * from bills";
        $conn->query($sql1);

        $sql2 = "ALTER TABLE bill_db.`" . $_SESSION["name"] . "` ADD UNIQUE (Pro_id)";
        $conn->query($sql2);

        $sql3 = "TRUNCATE TABLE bill_db.`" . $_SESSION["name"] . "`";
        $conn->query($sql3);

        header("location: shop_1.php");
    }
}
else
{
    header("location: ../web_pages/404.html");
}
$conn->close();
?>
