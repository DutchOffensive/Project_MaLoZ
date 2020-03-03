<?php
include('include.php');
include('functions.php');
$con = mysqli_connect("localhost","root","","backend");
$con->set_charset("utf8");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  read($con);
  // $sql = "SELECT * FROM `test`";

  # Execute sql statement.
  // $query=mysqli_query($con,$sql) or die(mysqli_error($con));
  
  # Create an empty array.
  $rows = array();

  # Add each row to the array.
  while ($row = mysqli_fetch_assoc($query)) {
      # Manipulate the data 
      array_push($rows, $row);

      
  }

  $template_data['rows'] = $rows;

  echo $mustache_engine->render(file_get_contents('list.tpl'), $template_data);

?>