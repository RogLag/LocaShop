<?php
session_start();

if (!isset($_SESSION['utilisateur'])) {
  // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
  header('Location: login.html');
  exit();
}
?>