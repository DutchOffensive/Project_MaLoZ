<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style/main.css" rel="stylesheet" type="text/css">
	<title>Project MaLoZ | Login</title>

	<!-- bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

	<form method="post" action="">
		<h1>Inloggen</h1>
		<table style="padding-left: 20px;">
			<?php
			include('db.php');
			if (!empty($_POST['submit'])) {
				$leerlingnummer = mysqli_real_escape_string($link, $_POST['leerlingnummer']);
				$wachtwoord = mysqli_real_escape_string($link, $_POST['wachtwoord']);

				// echo "$gebruikersnaam $wachtwoord";

				// $wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
				$query = "SELECT * FROM leerling WHERE leerlingnummer = '$leerlingnummer'";
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
						$_SESSION['leerlingnummer'] = $row['leerlingnummer'];
						$_SESSION['idleerling'] = $row['idleerling'];
						echo '<script>window.location.href = "index.php"</script>;';
					} else {
						echo 'Invalid password. '  . $row["wachtwoord"];
					}
				} else {
					//error
				}
			}
			?>
			<tr>
				<td width="220"><b>Vul je leerlingnummer in</b></td>
				<td width="150"><input type="text" name="leerlingnummer" value="" size="20" /></td>
			</tr>
			<tr>
				<td width="200"><b>Vul je wachtwoord in</b></td>
				<td><input type="password" name="wachtwoord" value="" size="20" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Inloggen" /></td>
			</tr>
		</table>
		<p>Nog geen account <a href="register.php">Meld je aan</a>.</p>
		<a href="index.php">terug naar home</a>

	</form>

</body>

</html>