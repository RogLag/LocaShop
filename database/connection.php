<?php
$host = "localhost"; /* L'adresse du serveur */
$login = "root"; /* Votre nom d'utilisateur */
$password = ""; /* Votre mot de passe */
$base = "locashop"; /* Le nom de la base */

function connexion()
{
    global $host, $login, $password, $base;
    try {
    $db = mysqli_connect($host, $login, $password, $base);
    } catch (Exception $e) {
        if ($e->getCode() == 1049) {
            $db = mysqli_connect($host, $login, $password);
            $sql = "CREATE DATABASE IF NOT EXISTS " . $base . ";";
            $result = mysqli_query($db, $sql);
            $db = mysqli_connect($host, $login, $password, $base);

            $sql = "CREATE TABLE IF NOT EXISTS users (
                IdUser INTEGER PRIMARY KEY AUTO_INCREMENT,
                Username VARCHAR(255) NOT NULL,
                Familyname VARCHAR(255) NOT NULL,
                Email VARCHAR(255) NOT NULL UNIQUE,
                Password VARCHAR(255) NOT NULL
            );";
        
            $result = mysqli_query($db, $sql);
        
            $sql = "CREATE TABLE IF NOT EXISTS annonces (
                IdAnnonce INTEGER PRIMARY KEY AUTO_INCREMENT,
                IdUser INTEGER NOT NULL,
                Title VARCHAR(255) NOT NULL,
                CarType VARCHAR(255) NOT NULL,
                City VARCHAR(255) NOT NULL,
                Brand VARCHAR(255) NOT NULL,
                Model VARCHAR(255) NOT NULL,
                Price INTEGER NOT NULL,
                PuissanceDIN INTEGER NOT NULL,
                BoiteType VARCHAR(255) NOT NULL,
                Description TEXT NOT NULL,
                Telephone VARCHAR(255) NOT NULL,
                Email VARCHAR(255) NOT NULL,
                DateStart DATE NOT NULL,
                DateEnd DATE NOT NULL,
                FOREIGN KEY (IdUser) REFERENCES users(IdUser)
            );";
        
            $result = mysqli_query($db, $sql);
        
            $sql = "CREATE TABLE IF NOT EXISTS loue (
                IdUser INTEGER NOT NULL,
                IdAnnonce INTEGER NOT NULL,
                DateDebut DATE NOT NULL,
                DateFin DATE NOT NULL,
                FOREIGN KEY (IdUser) REFERENCES users(IdUser),
                FOREIGN KEY (IdAnnonce) REFERENCES Annonces(IdAnnonce),
                CONSTRAINT PK_loue PRIMARY KEY (IdUser, IdAnnonce)
            );";

            $result = mysqli_query($db, $sql);
        }
    }
    return $db;
};
?>