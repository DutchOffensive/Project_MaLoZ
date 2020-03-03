<?php
    include 'crud.php';
?>

<?php
    if(isset($_GET['string'])){ ?>
    <div class="completed">
        <h2>Succesvol toegevoegd!</h2>
    </div>
    <?php } ?>
<a href="action.php">Toevoegen</a><br><br>

<?php
    $result = readAll($con);
    while($row = mysqli_fetch_assoc($result)){ ?>
        <div class="read">
            <b>Name:</b> <?php echo $row['name'] ?>
            <br/><b>File:</b> <?php echo $row['file'] ?>
            <br/><b>Text:</b> <?php echo $row['text']; ?>
            <a href="update.php?id=<?php echo $row['id']; ?>">Updaten</a>
            <br><br>
        </div>
    <?php } 
?>