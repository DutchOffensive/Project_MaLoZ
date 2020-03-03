<?php
	include 'config.php';

	function readAll($con) {
		$sql = "SELECT * FROM crud";
		$query = mysqli_query($con,$sql);
		return $query;
	}
	function readId($con) {
		$sql = 'SELECT * FROM crud WHERE id = "'.$_GET['id'].'"';
		$query = mysqli_query($con,$sql);
		return $query;
	}
	function insert ($con) {
		$sql = "INSERT INTO crud (name, file, text) VALUES ('".$_POST['name']."', '".$_POST['file']."', '".$_POST['text']."')";
		$query = mysqli_query($con,$sql);
	}
	if(isset($_POST['insert'])){
		insert($con);
		header('location: read.php?string=');
	}
	function update($con, $id) {
		$sql = "UPDATE crud SET name='".$_POST['name']."', file='".$_POST['file']."', text='".$_POST['text']."' WHERE id=".$id;
		$query = mysqli_query($con,$sql);
		return 'succes';
	}	
	if(isset($_POST['update'])){
		$id = $_POST['update_id'];
		update($con, $id);
		header('location: read.php');
	}
	function delete($con,$rij) {
		$sql = "DELETE * FROM crud WHERE id=".$_GET['id'];
		$query = mysqli_query($con,$sql);
		return $rij . 'is verwijderd';
	}
?>