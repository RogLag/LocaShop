<?php

require_once('../database/connection.php');

session_start();

$db = connexion();

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// On récupère l'ID de l'utilisateur grâce à la session puis on récupère les informations de l'annonce pour l'enregistré dans la base de données

$sql = "INSERT INTO annonces (IdUser, Title, CarType, City, Brand, Model, Price, PuissanceDIN, BoiteType, Description, Telephone, Email, DateStart, DateEnd) VALUES ('" . $_SESSION['utilisateur'] . "', '" . $_POST['Title'] . "', '" . $_POST['CarType'] . "', '" . $_POST['City'] . "', '" . $_POST['Brand'] . "', '" . $_POST['Model'] . "', '" . $_POST['Price'] . "', '" . $_POST['PuissanceDIN'] . "', '" . $_POST['BoiteType'] . "', '" . $_POST['Description'] . "', '" . $_POST['Telephone'] . "', '" . $_POST['Email'] . "', '" . $_POST['DateStart'] . "', '" . $_POST['DateEnd'] . "')";

$result = mysqli_query($db, $sql);

// On récupère l'ID de l'annonce pour pouvoir enregistrer l'image dans la base de données

$sql = "SELECT IdAnnonce FROM annonces WHERE IdUser = '" . $_SESSION['utilisateur'] . "' AND Title = '" . $_POST['Title'] . "' AND CarType = '" . $_POST['CarType'] . "' AND City = '" . $_POST['City'] . "' AND Brand = '" . $_POST['Brand'] . "' AND Model = '" . $_POST['Model'] . "' AND Price = '" . $_POST['Price'] . "' AND PuissanceDIN = '" . $_POST['PuissanceDIN'] . "' AND BoiteType = '" . $_POST['BoiteType'] . "' AND Description = '" . $_POST['Description'] . "' AND Telephone = '" . $_POST['Telephone'] . "' AND Email = '" . $_POST['Email'] . "'";

$result = mysqli_query($db, $sql);

header('Location: ../pages/Location.php');

exit();

?>