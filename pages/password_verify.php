<?php

include('db.php');

$naam = '';
$sql = "SELECT * FROM login WHERE voornaam = '$voornaam'";

$result = mysqli_query($link, $sql);
$hash = '';

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        $hash = $row["wachtwoord"];
    }
} else {
    echo "0 results";
}

//$hash = $row["wachtwoord"];

if (password_verify('didyoujustassumemygender', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

?>