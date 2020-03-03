<?php
include("include.php");
$con = mysqli_connect("localhost","root","","backend");
$con->set_charset("utf8");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

# Get id from index.php and assign to $id.
$id=$_GET["id"];

# Select from the database.
$sql = "SELECT * FROM `test` WHERE `id` = $id";	

# Execute sql statement.
$query=mysqli_query($con,$sql)or die(mysqli_error($con));

# Create new array.
$rows = array();
$row = mysqli_fetch_assoc($query);
array_push($rows, $row); 

# Assign query output to $row.
$row = mysqli_fetch_assoc($query);

$template_data['rows'] = $rows;
echo $mustache_engine->render(file_get_contents("edit.tpl"), $template_data);

?>