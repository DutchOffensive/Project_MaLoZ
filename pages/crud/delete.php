<?php

$con = mysqli_connect("localhost","root","","backend");
$con->set_charset("utf8");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$id=$_GET['id'];

$sql = "DELETE FROM `test` WHERE `id`='$id'";
$query = mysqli_query($con,$sql);
header('location:list.php');
?>