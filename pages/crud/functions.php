<?php

$con = mysqli_connect("localhost","root","","backend");
$con->set_charset("utf8");

function read($con) {

    $sql = 'SELECT * FROM `test`';
    global $query;
    $query = mysqli_query($con,$sql);
    
    return $query;}

    function update($con,$id) {
        $naam=$_POST['naam'];
        $file=$_POST['file'];
        $tekst=$_POST['tekst'];
      
        $sql = "UPDATE `test` SET `naam`='$naam', `file`='$file', `tekst`='$tekst' WHERE `id`=$id";
        $query = mysqli_query($con,$sql);
        
        return;}



?>