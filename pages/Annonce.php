<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonce</title>
    <link rel="stylesheet" href="../public/css/Annonce.css">
    <link rel="stylesheet" href="../public/css/button.css">
</head>
<?php
// On passe dans l'url l'id de l'annonce
$id = $_GET['annonceid'];

// On récupère les informations de l'annonce

require_once('../database/connection.php');

$db = connexion();

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM annonces WHERE IdAnnonce = '" . $id . "'";

$result = mysqli_query($db, $sql);

$row = mysqli_fetch_assoc($result);

// On affiche toutes les informations de l'annonce
?>

<body>
    <h1 id="titrepage">Dépôt d'annonce - 37 Locatchop</h1>
    <div class="Location">
        <button class="Location-button" onclick="window.location.href='/pages/Location.php'">Rechercher une location</button>
        <button class="Location-button">Déposer une annonce</button>
    </div>
    <div class='content'>  
        <div class="infos">
            <div class="left">

            </div>

            <div class="right">
                <h2>Marque : <?php echo $row['Brand']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Modèle : <?php echo $row['Model']; ?></h2>
                <div class="tableau">
                    <div class="column1">
                        <h3> Marque : <i><?php echo $row['Brand']; ?></i> </h3>
                        <h3> Modèle : <i><?php echo $row['Model']; ?></i> </h3>
                        <h3> Type de voiture : <i><?php echo $row['CarType']; ?></i> </h3>
                        <h3> Type de boite : <i><?php echo $row['BoiteType']; ?></i> </h3>
                        <h3> Puissance DIN : <i><?php echo $row['PuissanceDIN']; ?></i> </h3>
                    </div>
                    <div class="column2">
                    </div>
                    <div class="column3">
                        <h3> Ville : <i><?php echo $row['City']; ?></i> </h3>
                        <h3> Prix : <i><?php echo $row['Price']; ?></i> </h3>
                        <h3> Dates : <i><?php echo $row['DateStart']; ?> - <?php echo $row['DateEnd']; ?></i> </h3>
                        <h3> Téléphone : <i><?php echo $row['Telephone']; ?></i> </h3>
                        <h3> Email : <i><?php echo $row['Email']; ?></i> </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="Description">
            <h2>Description :</h2>
            <p><?php echo $row['Description']; ?></p>
        </div>
    </div>
</body>
</html>