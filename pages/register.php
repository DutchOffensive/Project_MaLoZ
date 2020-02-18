	<div class="content">
	<form name="registeren" class="form" method="POST" >
        <h1 id="pagina_titel">Register</h1>
		<input type="text" required name="voornaam" placeholder="voornaam"/>
        <br><br>
		<input type="text" name="tussenvoegsel" placeholder="tussenvoegsel"/>
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
			<a class="btn btn-outline-danger my-2 my-sm-0" href="/index.php">Back</a>
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
                            VALUES ('$voornaam','$tussenvoegsel','$achternaam','$telefoonnummer','$functie','$gebruikersnaam','$wachtwoord')";
			$stmt = $link1->prepare($sql);
			try {
				$stmt->execute(
					array(
						$voornaam,
						$tussenvoegsel,
						$achternaam,
						$telefoonnummer,
						$functie,
						$gebruikersnaam,
						$passwordHash,
						0,
						0
					)
				);
				$melding = "Nieuw account aangemaakt.";
			} catch (PDOException $e) {
				$melding = "Kon geen account aanmaken.";
				echo $e->getMessage();
			}
			echo "<div id='melding'>" . $melding . "</div>";
		}
	}

	?>