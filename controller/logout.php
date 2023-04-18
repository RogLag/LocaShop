<?php
session_start();

echo("Déconnexion en cours...");
// Déconnecte l'utilisateur
session_unset();
session_destroy();
header('Location: ../welcome.php');
exit;

?>