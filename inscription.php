<?php

/**
 * inscription.php
 * Cette page est une page d'inscription. Après inscription elle permet à l'utilisateur de se connecter.
 * Auteur : El behedy Ramy
 */

require_once 'connexionBD/fonctions_postgresql.inc.php';
session_start();
$error = '';
if (isset($_SESSION['connected']) && isset($_SESSION['login'])) {
    header('Location: vues/home.php');
    exit();
} else if (isset($_POST['login']) and isset($_POST['pass'])) {

    if (trim($_POST['login'], " ") != "" && trim($_POST['pass'], " ") != "") {

        if (inscription($_POST['login'], $_POST['pass']) == "succès") {
            $_SESSION['connected'] = true;
            $_SESSION['login'] = $_POST['login'];
            header('Location: vues/home.php');
            exit();
        } else if ((inscription($_POST['login'], $_POST['pass']) == "déjà utilisé")) {
            $error="<p id='erreurConnexion'> L'inscription à échouée.
                                    <br>Nom d'utilisateur déjà utilisé.
                                    <br>Veuillez réessayer s'il vous plait.</p>";
        } else {
            $error="<p id='erreurConnexion'> L'inscription à échouée.
                                    <br>Nom d'utilisateur ou mot de passe incorrect.
                                    <br>Veuillez réessayer s'il vous plait.</p>";
        }
    } else {
        $error="<p id='erreurConnexion'>Au moins un des champs est vide.
                                <br>Veuillez réessayer s'il vous plait.</p>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="style/logstyles.css" rel="stylesheet">
    <title>AirPlus</title>
</head>

<body>
    <img src="images/log.jpg">

    <div id="panneauDroite">
        <div id="moduleLogin">
            <h1>AEROW<span>.</span></h1>
            <div class="login-page">
                <div class="form">

                    <form class="login-form" method="post" action="inscription.php">

                        <h5>Création de compte</h5>
                        <input type="text" name="login" placeholder="Nom utilisateur" />
                        <input type="password" name="pass" placeholder="Mot de passe" />
                        <button>Créer un compte</button>
                        <a href="index.php">Se connecter</a>

                        <?php echo $error; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>