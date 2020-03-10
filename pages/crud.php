<?php
	include 'db.php';

	function readMelding($link) {
		$sql = "SELECT * FROM melding";
		$query = mysqli_query($link,$sql);
		return $query;
	}
	function readId($link) {
		$sql = 'SELECT * FROM melding WHERE idmelding = "'.$_GET['idmelding'].'"';
		$query = mysqli_query($link,$sql);
		return $query;
	}
	function insert ($link) {
		$sql = "INSERT INTO melding (datum_tijd, korte_omschrijving, lange_omschrijving, verantwoordelijke, oorzaak, oplossing, terugkoppeling, impact, urgentie, prioriteit, afhandeltijd, status) VALUES ('".$_POST['datum_tijd']."', '".$_POST['korte_omschrijving']."', '".$_POST['lange_omschrijving']."', '".$_POST['verantwoordelijke']."', '".$_POST['oorzaak']."', '".$_POST['oplossing']."', '".$_POST['terugkoppeling']."', '".$_POST['impact']."', '".$_POST['urgentie']."', '".$_POST['prioriteit']."', '".$_POST['afhandeltijd']."', '".$_POST['status']."')";
		$query = mysqli_query($link,$sql);
	}
	if(isset($_POST['insert'])){
		insert($link);
		header('location: read-melding.php?string=');
	}
	function update($link, $id) {
		$sql = "UPDATE melding SET name='".$_POST['name']."', file='".$_POST['file']."', text='".$_POST['text']."' WHERE id=".$id;
		$query = mysqli_query($link,$sql);
	}	
	if(isset($_POST['update'])){
		$id = $_POST['update_id'];
		update($link, $id);
		header('location: read-melding.php?string=');
	}
	function delete($link,$rij) {
		$sql = "DELETE * FROM melding WHERE id=".$_GET['id'];
		$query = mysqli_query($link,$sql);
		return $rij . 'is verwijderd';
	}
?>