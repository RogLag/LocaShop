<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locations</title>
    <link rel="stylesheet" href="../public/css/Location.css">
    <link rel="stylesheet" href="../public/css/button.css">
</head>
<body>
<h1 id="titrepage">Toutes les annnonces - 37 Locatchop</h1>
            <div class="Location">
                <button class="Location-button">Rechercher une location</button>
                <button class="Location-button" onclick="window.location.href='/pages/CreateLocation.php'">Déposer une annonce</button>
            </div>

<!-- Formulaire de recherche -->
<form action="/pages/Location.php" method="POST">
    <div>
Doit contenir : <input type="text" name="search" placeholder="Rechercher une annonce">
    </div>
    <div>
Ne doit pas être plus cher que : 0€ <input type='range' name='price' min='0' max='1000' value='0' step='10' oninput='this.nextElementSibling.value = this.value'> 1000€
    </div>
    <div>
Ville : <select name="city">
            <option value="">Toutes les villes</option>
            <option value="Tours">Tours</option>
            <option value="Lille">Lille</option>
            <option value="Marseille">Marseille</option>
            <option value="Lyon">Lyon</option>
            <option value="Paris">Paris</option>
        </select>
    </div>
    <button type="submit" class="outline reduce">Rechercher</button>
</form>
<div class="annonces">
<?php

// Pour chaque location, afficher les informations

function contient($str, $recherche) {
    return strpos($str, $recherche) !== false;
}

$recherche = "";
$price = 0;
$city = "";

if (isset($_POST['search'])) {
    $recherche = $_POST['search'];
};
if (isset($_POST['price'])) {
    $price = intval($_POST['price']);
};
if (isset($_POST['city'])) {
    $city = $_POST['city'];
};

if ($price === 0) {
    $price = 1000;};

require_once '../database/connection.php';

$db = connexion();

$sql = 'SELECT * FROM annonces';

$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $href = "'/pages/Annonce.php?annonceid=" . $row['IdAnnonce'] . "'";
        if ($recherche == "" && $price == 1000 && $city == "") {
            echo '<div class="annonce" onclick="window.location.href=' . $href . '">';
            echo "<h2>" . $row['Title'] . "</h2>";
            echo "<p>" . $row['Description'] . "</p>";
            echo "<p>" . $row['Price'] . "€/jours</p>";
            echo "<p>" . $row['City'] . "</p>";
            echo "<p> Disponible du " . $row['DateStart'] . " Au " . $row['DateEnd'] . "</p>";
            echo "</div>";
            // ou contient la recherche
        } else if ($recherche != "" && $price == 1000 && $city == "") {
            if (contient($row['Title'], $recherche) || contient($row['Description'], $recherche)) {
                echo '<div class="annonce" onclick="window.location.href=' . $href . '">';
                echo "<h2>" . $row['Title'] . "</h2>";
                echo "<p>" . $row['Description'] . "</p>";
                echo "<p>" . $row['Price'] . "€/jours</p>";
                echo "<p>" . $row['City'] . "</p>";
                echo "<p> Disponible du " . $row['DateStart'] . " Au " . $row['DateEnd'] . "</p>";
                echo "</div>";
            }
        } else if ($recherche == "" && $price != 1000 && $city == "") {
            if ($row['Price'] <= $price) {
                echo '<div class="annonce" onclick="window.location.href=' . $href . '">';
                echo "<h2>" . $row['Title'] . "</h2>";
                echo "<p>" . $row['Description'] . "</p>";
                echo "<p>" . $row['Price'] . "€/jours</p>";
                echo "<p>" . $row['City'] . "</p>";
                echo "<p> Disponible du " . $row['DateStart'] . " Au " . $row['DateEnd'] . "</p>";
                echo "</div>";
            }
        } else if ($recherche == "" && $price == 1000 && $city != "") {
            if (contient($row['City'], $city)) {
                echo '<div class="annonce" onclick="window.location.href=' . $href . '">';
                echo "<h2>" . $row['Title'] . "</h2>";
                echo "<p>" . $row['Description'] . "</p>";
                echo "<p>" . $row['Price'] . "€/jours</p>";
                echo "<p>" . $row['City'] . "</p>";
                echo "<p> Disponible du " . $row['DateStart'] . " Au " . $row['DateEnd'] . "</p>";
                echo "</div>";
            }
        } else if ($recherche != "" && $price != 1000 && $city == "") {
            if (contient($row['Title'], $recherche) || contient($row['Description'], $recherche) && $row['Price'] <= $price) {
                echo '<div class="annonce" onclick="window.location.href=' . $href . '">';
                echo "<h2>" . $row['Title'] . "</h2>";
                echo "<p>" . $row['Description'] . "</p>";
                echo "<p>" . $row['Price'] . "€/jours</p>";
                echo "<p>" . $row['City'] . "</p>";
                echo "<p> Disponible du " . $row['DateStart'] . " Au " . $row['DateEnd'] . "</p>";
                echo "</div>";
            }
        } else if ($recherche != "" && $price == 1000 && $city != "") {
            if (contient($row['Title'], $recherche) || contient($row['Description'], $recherche) && contient($row['City'], $city)) {
                echo '<div class="annonce" onclick="window.location.href=' . $href . '">';
                echo "<h2>" . $row['Title'] . "</h2>";
                echo "<p>" . $row['Description'] . "</p>";
                echo "<p>" . $row['Price'] . "€/jours</p>";
                echo "<p>" . $row['City'] . "</p>";
                echo "<p> Disponible du " . $row['DateStart'] . " Au " . $row['DateEnd'] . "</p>";
                echo "</div>";
            }
        } else if ($recherche == "" && $price != 1000 && $city != "") {
            if ($row['Price'] <= $price && contient($row['City'], $city)) {
                echo '<div class="annonce" onclick="window.location.href=' . $href . '">';
                echo "<h2>" . $row['Title'] . "</h2>";
                echo "<p>" . $row['Description'] . "</p>";
                echo "<p>" . $row['Price'] . "€/jours</p>";
                echo "<p>" . $row['City'] . "</p>";
                echo "<p> Disponible du " . $row['DateStart'] . " Au " . $row['DateEnd'] . "</p>";
                echo "</div>";
            }
        } else if ($recherche != "" && $price != 1000 && $city != "") {
            if (contient($row['Title'], $recherche) || contient($row['Description'], $recherche) && $row['Price'] <= $price && contient($row['City'], $city)) {
                echo '<div class="annonce" onclick="window.location.href=' . $href . '">';
                echo "<h2>" . $row['Title'] . "</h2>";
                echo "<p>" . $row['Description'] . "</p>";
                echo "<p>" . $row['Price'] . "€/jours</p>";
                echo "<p>" . $row['City'] . "</p>";
                echo "<p> Disponible du " . $row['DateStart'] . " Au " . $row['DateEnd'] . "</p>";
                echo "</div>";
            }
        }
    }
}

?>
</div>  
</body>
<?php

session_start();

if (!isset($_SESSION['utilisateur'])) {
    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header('Location: login.html');
    exit();
}

?>
</html>