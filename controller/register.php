<?php

require_once('../database/connection.php');

session_start();

$db = connexion();

$sql = "SELECT IdUser FROM users WHERE Email = '" . $_POST['Email'] . "';";

$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) === 1) {
    header('Location: ../pages/register.html?error=1');
    exit();
} else {
    $sql = "INSERT INTO users (Username, Familyname, Email, Password) VALUES ('" . $_POST['Username'] . "', '" . $_POST['Familyname'] . "', '" . $_POST['Email'] . "', '" . hash('sha256', $_POST['Password']) . "');";
    $result = mysqli_query($db, $sql);
    // On créer la session
    $_SESSION['utilisateur'] = mysqli_insert_id($db);
    header('Location: ../welcome.php');
    exit();
}

?>