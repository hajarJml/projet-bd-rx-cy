<?php
/**
 * deconnexion.php
 * Cette page est une page de deconnexion.
 * Vide le contenu de la SESSION et redirige vers la connexion.
 * Auteur : El behedy Ramy
 */

session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');

header('Location: index.php');
exit();
?>
