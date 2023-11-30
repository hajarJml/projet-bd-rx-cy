<?php

/**
 * index.php
 * Cette page est une page de connexion. Après connexion elle permet d'avoir accès au contenu du site.
 * Auteur : El behedy Ramy
 */

require_once('connexionBD/fonctions_postgresql.inc.php');
session_start();
$error = '';
                        if (isset($_SESSION['connected']) && isset($_SESSION['login'])) {
                            header('Location:vues/home.php');
                            exit();
                        } else if (isset($_POST['login']) and isset($_POST['pass'])) {
                            if (connexion($_POST['login'], $_POST['pass']) == true) {
                                $_SESSION['connected'] = true;
                                $_SESSION['login'] = $_POST['login'];
                                header('Location:vues/home.php');
                                exit();
                            } else {
                                $error =  "<p id='erreurConnexion'> Nom d'utilisateur ou mot de passe incorrect. 
                                <br>Veuillez réessayer s'il vous plait.</p>"; 
                            }
                        }
                        ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="style/logstyles.css" rel="stylesheet">
    <title>MH_Agengy</title>
</head>

<body>
    <img src="images/bell.jpg">

    <div id="panneauDroite">
        <div id="moduleLogin">
            <h1>MH_Agengy<span>.</span></h1>
            <h2>Votre confort est notre priorité!!</h2>
            <p>Bienvenue sur le site de notre hôtel, où le confort et l'hospitalité se rencontrent pour créer une expérience inoubliable. Que vous soyez client ou membre du personnel, découvrez ici tout ce que notre établissement a à offrir.</p>
            <div class="login-page">
                <div class="form">

                    <form class="login-form" method="post" action="index.php">

                        <h5> Connexion administrateur</h5>
                        <input type="text" name="login" placeholder="Nom utilisateur" />
                        <input type="password" name="pass" placeholder="Mot de passe" />
                        <button>connexion</button>
                        <p>Première connexion ? <br><a href="inscription.php">Créer un compte !</a></p>
                        <?php echo $error; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>