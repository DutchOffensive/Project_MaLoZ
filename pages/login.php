<form method="post" action="">
	<h1>Inloggen</h1>
	<table style="padding-left: 20px;">
		<?php
		include('db.php');
		if (!empty($_POST['submit'])) {
			$gebruikersnaam = mysqli_real_escape_string($link, $_POST['gebruikersnaam']);
			$wachtwoord = mysqli_real_escape_string($link, $_POST['wachtwoord']);

			// echo "$gebruikersnaam $wachtwoord";

			// $wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
			$query = "SELECT * FROM accounts WHERE gebruikersnaam = '$gebruikersnaam'";
			// wachtwoord = '$wachtwoord' AND 
			// echo '<br>' . $query . '<br>';
			$result = mysqli_query($link, $query);

			$nr_rows = mysqli_num_rows($result);
			// echo $nr_rows;

			if ($nr_rows == 1) {
				$row = mysqli_fetch_assoc($result);
				//echo '<br>' . $row["password"] . '<br>';
				if (password_verify($wachtwoord, $row["wachtwoord"])) {
					//echo 'Password is valid!';
					$_SESSION['gebruikersnaam'] = $row['gebruikersnaam'];
					$_SESSION['idaccounts'] = $row['idaccounts'];
					echo '<script>window.location.href = "index.php"</script>;';
				} else {
					echo 'Invalid password.';
				}
			} else {
				//error
			}
		}
		?>
		<tr>
			<td width="220"><b>Vul je gebruikersnaam in</b></td>
			<td width="150"><input type="text" name="gebruikersnaam" value="" size="20" /></td>
		</tr>
		<tr>
			<td width="200"><b>Vul je wachtwoord in</b></td>
			<td><input type="password" name="wachtwoord" value="" size="20" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Inloggen" /></td>
		</tr>
	</table>
	<p>Nog geen account <a href="?pagina=register">Meld je aan</a>.</p>
	<a href="?pagina=index">terug naar home</a>
</form>