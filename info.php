<?php
session_start();
require_once('connexion_base_de_donnee.php');




if (isset($_POST['formulaire'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);

    $update = "UPDATE inscris SET firstname=:firstname,lastname=:lastname WHERE id=:id";
    $stmt = $bdd->prepare($update);
    $result2 = $stmt->execute([':firstname' => $firstname, ':lastname' => $lastname, ':id' => htmlspecialchars($_POST['id'])]);
    header('location: info.php');
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <form class="col-6" method="POST">

        <div class="form-group col-6">
            <label for="">firstname</label>
            <input type="text" class="form-control" name="firstname" value="<?= $firstname ?>">
        </div>
        <div class="form-group col-6 p-0">
            <label for="">lastname</label>
            <input type="text" name="lastname" class="form-control" value="<?= $lastname ?>">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">modifier</button>
        </div>
    </form>

    <a href="deconnexion.php">Déconnexion</a>
</body>

</html>