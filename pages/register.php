<!DOCTYPE html>
<html lang="nl">
	<head>

		<link href="style/main.css" rel="stylesheet" type="text/css">
		<!-- bootstrap -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">        
		<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
		<title>Project MaLoZ | Register</title>

    </head>
	<body>
	<div class="content">
	<form name="registeren" class="form" method="POST" >
        <h1 id="pagina_titel">Register</h1>
		<input type="text" required name="voornaam" placeholder="voornaam"/>
        <br><br>
		<input type="text" required name="tussenvoegsel" placeholder="tussenvoegsel"/>
		<br><br>
		<input type="text" required name="achternaam" placeholder="achternaam" />
		<br><br>
		<input type="number" required name="telefoonnummer" placeholder="telefoonnummer" />
		<br><br>
		<input type="text" required name="functie" placeholder="functie" />
		<br><br>
		<input type="text" required name="gebruikersnaam" placeholder="gebruikersnaam" />
		<br><br>
		<input type="password" required name="wachtwoord" placeholder="wachtwoord" />
		<br><br>
		<div class="icon_container">

        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" class="icon" id="submit" name="submit" value="Submit" />
		</div>
		<a class="btn btn-outline-danger my-2 my-sm-0" href="index.php">Back</a>
	</form>
	</div>
<?php 
include("db.php");
if(isset($_POST["submit"])){
	$melding ="";
	$voornaam = htmlspecialchars($_POST['voornaam']);
	$tussenvoegsel = htmlspecialchars($_POST['tussenvoegsel']);
	$achternaam = htmlspecialchars($_POST['achternaam']);
	$telefoonnummer = htmlspecialchars($_POST['telefoonnummer']);
	$functie = htmlspecialchars($_POST['functie']);
	$gebruikersnaam = htmlspecialchars($_POST['gebruikersnaam']);
    $wachtwoord = htmlspecialchars($_POST['wachtwoord']);
	$passwordHash = password_hash($wachtwoord, PASSWORD_DEFAULT);
	echo strlen($passwordHash) ;

	// Controleer of e-mail al bestaat (geen dubbele adressen)
	$sql= "SELECT * FROM accounts WHERE gebruikersnaam = ?";
	$stmt = $link1->prepare($sql);
	$stmt->execute(array($leerlingnummer));
	$resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($resultaat) {
		$melding = "gebruikersnaam geregistreerd";
        print_r ($melding);
	}else {
		$sql = "INSERT INTO accounts (voornaam,tussenvoegsel,achternaam,telefoonnummer,functie,gebruikersnaam,wachtwoord)
                            VALUES ('$voornaam','$cohort','$leerlingnummer','$passwordHash')";
		$stmt= $link1->prepare($sql);
		try {
			$stmt->execute (array(
			$voornaam,
			$cohort,
			$leerlingnummer,
			$passwordHash,
            0,
            0)
            );
			$melding = "Nieuw account aangemaakt.";
		}catch(PDOException $e) {
			$melding = "Kon geen account aanmaken.";
			echo $e->getMessage();
		}
		echo "<div id='melding'>".$melding."</div>";
	}
}

?>       
</body>
</html>