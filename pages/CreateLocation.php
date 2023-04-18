<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Location</title>
    <link rel="stylesheet" href="../public/css/createLocation.css">
    <link rel="stylesheet" href="../public/css/button.css">
</head>
<body>
<h1 id="titrepage">Dépôt d'annonce - 37 Locatchop</h1>
            <div class="Location">
                <button class="Location-button" onclick="window.location.href='/pages/Location.php'">Rechercher une location</button>
                <button class="Location-button">Déposer une annonce</button>
            </div>
<form action="../controller/annonce.php" method="POST">
            <div class="depot">
                <div class="col1depot">
                    Titre de l'annonce : <input type="text" name="Title" maxlength="100" required=""> <br>
                    Type de véhicule : <select name="CarType">
                        <option value="coupé">coupé</option>
                        <option value="berlin">berline</option>
                        <option value="citadine">citadine</option>
                        <option value="SUV">SUV</option>
                        </select>
                    
                    Ville : <select id="ville" name="City">
                        <option value="Tours">Tours</option>
                        <option value="Lille">Lille</option>
                        <option value="Marseille">Marseille</option>
                        <option value="Lyon">Lyon</option>
                        <option value="Paris">Paris</option>
                    </select> <br>
                    Prix de la location : <input type="number" name="Price" placeholder="prix" required=""> <br>
                    Marque : <input type="text" name="Brand" placeholder="marque du véhicule" required="">
                    Modèle : <input type="text" name="Model" placeholder="modèle du véhicule" required=""> <br>
                    Puissance DIN : <input name="PuissanceDIN" type="number">
                    Boite : <select id="boite" name="BoiteType">
                        <option value="auto">Automatique</option>
                        <option value="manuel">Manuel</option>
                    </select> <br>
                    Description : <textarea name="Description" class="Vcenter" id="description" cols="30" rows="3" placeholder="Décrivez brièvement votre annonce/véhicule" required=""></textarea><br>
                    Date de debut de mise en location : <input type="date" name="DateStart" required=""><br>
                    Date de fin de mise en location : <input type="date" name="DateEnd" required="">
                </div>
                <div class="separator"></div>
                <div class="col2depot">
                    <h3>Contact : </h3>
                    Numéro de téléphone : <input name="Telephone" type="text" pattern="[0-9]{10}" placeholder="0600000000"> <br>
                    Adresse email : <input type="text" name="Email" placeholder="aaa@gmail.com" pattern="[a-zA-Z0-9\.\-_]{1,}[@]{1}[a-zA-Z0-9\.\-_]{1,}[\.]{1}[a-zA-Z0-9\.\-_]{1,}" required="">
                </div>
            </div>
            <button type="submit" class="submit outline">Mettre en ligne</button>
        </form>
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