<?php

require_once('../database/connection.php');

session_start();

$db = connexion();

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT IdUser FROM users WHERE Email = '" . $_POST['Email'] . "' AND Password = '" . hash('sha256', $_POST['Password']) . "'";

$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['utilisateur'] = $row['IdUser'];
    header('Location: ../welcome.php');
    exit();
} else {
    header('Location: ../pages/login.html?error=1');
    exit();
}