<?php
session_start();
require_once('connexion_base_de_donnee.php');


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <header>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo-story-volkswagen.jpg" width="50" height="30" class="d-inline-block align-top" alt="">
            Bootstrap
        </a>
        <a href="login.php" class="btn btn-primary">Cliquez-içi pour vous connecter !</a>
        <a href="inscription.php" class="btn btn-warning">Cliquez-içi pour vous inscrire !</a>
    </nav>

    </header>

</body>

</html>