<!DOCTYPE html>

<html>

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Adam, Youri, Simon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="style/main.css" rel="stylesheet" type="text/css">

    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <?php
    if (!isset($_GET['pagina'])) {
        $_GET['pagina'] = 'home';
    }
    if (file_exists('style/' . $_GET['pagina'] . '.css')) {
        echo '<link href="style/' . $_GET['pagina'] . '.css" rel="stylesheet" type="text/css">';
    } else {
        echo '<link href="style/index.css" rel="stylesheet" type="text/css">';
    }
    ?>
</head>

<body>
    <nav class="navbar navbar-expand-md">
        <div class="collapse navbar-collapse mt-2" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link<?php if ($_GET['pagina'] == 'home') { ?> active<?php } ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php if ($_GET['pagina'] == '') { ?> active<?php } ?>" href="?pagina=#">Meldingen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php if ($_GET['pagina'] == '') { ?> active<?php } ?>" href="?pagina=#">Accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?php if ($_GET['pagina'] == '') { ?> active<?php } ?>" href="?pagina=#">Inloggen</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="close-button">
        <button style="position:relative; " class="navbar-toggler openbtn" id="icon" onclick="toggleNav()" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="clearfix">
                <span class="float-left menu">Menu</span>
                <div class="bars float-left">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>
        </button>
    </div>
    <div id="mySidebar" class="sidebar">
        <a href="index.php" class="mobile-css <?php if ($_GET['pagina'] == 'home') { ?> activeMobile<?php } ?>">Home</a>
        <a href="?pagina=#" class="mobile-css <?php if ($_GET['pagina'] == '') { ?> activeMobile<?php } ?>">Meldingen</a>
        <a href="?pagina=#" class="mobile-css <?php if ($_GET['pagina'] == '') { ?> activeMobile<?php } ?>">Accounts</a>
        <a href="?pagina=#" class="mobile-css <?php if ($_GET['pagina'] == '') { ?> activeMobile<?php } ?>">Inloggen</a>
    </div>

    <?php
    $pagina = strtok($_GET['pagina'], '?');
    if (file_exists('pages/' . $pagina . '.php')) {
        include('pages/' . $pagina . '.php');
    } else {
        if ($pagina == '') {
            include('pages/home.php');
        } else {
            include('pages/unknown.php');
        }
    }
    ?>

    <script src="js/navbar_mobile.js"></script>
</body>

</html>