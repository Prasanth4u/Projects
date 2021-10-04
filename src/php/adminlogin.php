<?php
  include 'dbcon.php';
  session_start();
  $usrid = $_POST["uname"];
  $usrpss = $_POST["psw"];
  $sql = "SELECT sno FROM admin WHERE username = '$usrid' and password = '$usrpss'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
      while ($row = $result->fetch_assoc())
      {
          header("location: ../web_pages/adminportal.html");
      }
  }
  else
  {
      header("location: ../web_pages/404.html");
  }
  $conn->close();
?>
