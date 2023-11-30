<?php
/**
 * verificationConnexion.php
 * Cette page est appelée sur toute les pages qui nécessitent une connexion.
 * Elle vérifie la connexion du user et renvoie si la SESSION est vide.
 * Auteur : El behedy Ramy
 */

session_start();
// On teste si la variable de session existe et contient une valeur
if ($_SESSION['connected'] != true) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: ../index.php');
    exit();

}
