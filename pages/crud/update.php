<?php
include('functions.php');
$con = mysqli_connect("localhost","root","","backend");
$con->set_charset("utf8");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$id=$_GET['id'];

update($con,$id);

// $id=$_GET['id'];

// $naam=$_POST['naam'];
// $file=$_POST['file'];
// $tekst=$_POST['tekst'];



// $sql = "UPDATE `test` SET `naam`='$naam', `file`='$file', `tekst`='$tekst' WHERE `id`=$id";

// mysqli_query($con,$sql);

header('location:list.php');

?>