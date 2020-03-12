<?php
session_start();
require_once('connexion_base_de_donnee.php');

if (isset($_POST['formulaire'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    var_dump($_POST);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $insert = "INSERT INTO inscris (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
    $stmt = $bdd->prepare($insert);
    $stmt->execute(['email' => $email, 'firstname' => $firstname, 'lastname' => $lastname, ':password' => $password]);
}

if (isset($_POST['deuxieme'])) {
    $email = htmlspecialchars($_POST['email']);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>



<body>

    <section class="encadrage_formulaire mx-auto d-flex">
        <form class="col-6 mx-auto " method="POST">
            <div class="form-group col-12 text-center">
                <label for="inputEmail4">FIRSTNAME</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="form-group col-12 text-center">
                <label for="inputEmail4">LASTNAME</label>
                <input type="text" name="lastname" class="form-control">
            </div>
            <div class="form-group col-12 text-center">
                <label for="inputEmail4">EMAIL</label>
                <input type="text" class="form-control" name="email" id="inputEmail4">
            </div>
            <div class="form-group col-12 text-center">
                <label for="inputPassword4">PASSWORD</label>
                <input type="password" class="form-control" name="password" id="inputPassword4">
            </div>
            <div>
                <a href="inscription.php"><button type="submit" name="formulaire" class="btn btn-primary bouton_enregistrer">ENREGISTRER</button></a>
            </div>
        </form>
        
        <section  class="mx-auto" >
        <?php
        if (isset($erreur)) {
            echo "<div><span>$erreur</span></div>";
        }
        ?>
        <form class="col-12 mx-auto" method="POST">
            <div class="form-group col-12 text-center">
                <label for="inputEmail4">EMAIL</label>
                <input type="text" class="form-control" name="email" id="inputEmail4">
            </div>
            <div class="form-group col-12 text-center">
                <label for="inputPassword4">PASSWORD</label>
                <input type="password" name="password" class="form-control" id="inputPassword4">
            </div>
            <div>
                <button type="submit" name="deuxieme" class="btn btn-primary bouton_se_connecter">SE CONNECTER</button>
            </div>
        </form>
    </section>
    </section>

    



</body>

</html>