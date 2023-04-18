<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>LocaShop</title>
    <link rel="stylesheet" href="public/css/welcome.css">
    <link rel="stylesheet" href="public/css/button.css">
</head>

<body>
    <h1>Bienvenue sur LocaShop</h1>
    <div class="logo">
        <img src="/public/images/logo.png" alt="Logo">
    </div>
    <p>Bienvenue sur notre site de location et de mise en location de voiture ! Nous sommes une plateforme qui facilite la location de véhicules entre particuliers. Si vous avez besoin d'une voiture pour une courte période ou si vous souhaitez louer la vôtre, notre site est la solution qu'il vous faut !</p>
    <div class="buttons">
        <button onclick="window.location.href = '/pages/Location.php';">Trouver une location</button>
        <button onclick="window.location.href = '/pages/CreateLocation.php';" class="outline">Mettre en location</button>
    </div>
    <!-- Se déconnecter -->
    <form action="/controller/logout.php" method="POST">
        <button class="deconnexion" style="display: none;" type="submit" onclick="window.location.reload();">Se déconnecter</button>
    </form>
</body>

<?php
session_start();

if (isset($_SESSION['utilisateur'])) {
    echo '<script>document.querySelector(".deconnexion").style.display = "block";</script>';
}

?>

</html>