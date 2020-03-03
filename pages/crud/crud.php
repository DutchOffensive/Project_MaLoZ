<?php
include('include.php');
$con = mysqli_connect("localhost","root","","backend");
$con->set_charset("utf8");
 

function read($con) {

    $sql = 'SELECT * FROM `test`';
    
    $query = mysqli_query($con,$sql);
    
    return $query;}
    
     
if(isset($_POST['naam']))
{
function insert($con) {
    
    $naam=$_POST['naam'];
    $file=$_POST['file'];
    $tekst=$_POST['tekst'];
    
    $sql = "INSERT INTO `test` (`id`,`naam`,`file`,`tekst`) VALUES ('','$naam','$file','$tekst')";
    
    $query = mysqli_query($con,$sql);
    
    return 'record x is opgeslagen';
    
    }
    insert($con);
    header('location:list.php');
}

     
function update($con,$rij) {
    $id=$_POST =['id'];
    $naam=$_POST['naam'];
    $file=$_POST['file'];
    $tekst=$_POST['tekst'];

    $sql = "UPDATE `test` SET `naam`='$naam', `file`='$file', `tekst`='$tekst' WHERE `id`=$id";
    $query = mysqli_query($con,$sql);
    
    return 'succes';}
    
         
function delete($con,$rij) {
    if(isset($_POST['id']))
{
    $id=$_POST['id'];
}
   
    $sql = "DELETE * FROM `test` WHERE `id` = $id";
    $query = mysqli_query($con,$sql);
    
    return $rij . 'is verwijderd';
}


    // $template_data['rows'] = $rows;

	echo $mustache_engine->render(file_get_contents('crud.tpl'));

?>
