<?php
session_start();
require_once('connexion_base_de_donnee.php');

if (isset($_POST['deuxieme'])) {
    $email = htmlspecialchars($_POST['email']) ;
    $password = htmlspecialchars($_POST['password']);
    $reponse = $bdd->query("SELECT * FROM inscris where email='$email'");
    $resultat = $reponse->fetch();
    // var_dump($resultat);
    if (count($resultat) > 0 && password_verify($password, $resultat['password'])) {
        $_SESSION['email'] = $resultat['email'];
        header('location: info.php');
    } else {
        $erreur = 'Non valide';
    };
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (isset($erreur)) {
        echo "<div><span>$erreur</span></div>";
    }
    ?>

    <form class="col-6" method="POST">
        <div class="form-group col-6">
            <label for="inputEmail4">email</label>
            <input type="text" class="form-control" name="email" id="inputEmail4">
        </div>
        <div class="form-group col-6 p-0">
            <label for="inputPassword4">password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4">
        </div>
        <div>
            <button type="submit" name="deuxieme" class="btn btn-primary">connexion</button>
        </div>
    </form>
</body>

</html>