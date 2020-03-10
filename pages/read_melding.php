<?php
include 'crud.php';
?>

<?php
$result = readMelding($link);
while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="row" style="padding-top: 100px;">
        <h2>ID: <?php echo $row['idmelding'] ?></h2>
    </div>
    <div class="row">
        <div class="col-3">
            Datum: <?php echo $row['datum_tijd'] ?>
        </div>
        <div class="col-3">
            Korte omschrijving: <?php echo $row['korte_omschrijving'] ?>
        </div>
        <div class="col-3">
            Lange omschrijving: <?php echo $row['lange_omschrijving'] ?>
        </div>
        <div class="col-3">
            Verantwoordeljke: <?php echo $row['verantwoordelijke'] ?>
        </div>
        <div class="col-3">
            Oorzaak: <?php echo $row['oorzaak'] ?>
        </div>
        <div class="col-3">
            Oplossing: <?php echo $row['oplossing'] ?>
        </div>
        <div class="col-3">
            Terugkoppeling: <?php echo $row['terugkoppeling'] ?>
        </div>
        <div class="col-3">
            Impact: <?php echo $row['impact'] ?>
        </div>
        <div class="col-3">
            Urgentie: <?php echo $row['urgentie'] ?>
        </div>
        <div class="col-3">
            Prioriteit: <?php echo $row['prioriteit'] ?>
        </div>
        <div class="col-3">
            Afhandeltijd: <?php echo $row['afhandeltijd'] ?> minuten
        </div>
        <div class="col-3">
            Status: <?php echo $row['status'] ?>
        </div>
    </div>
<?php } ?>