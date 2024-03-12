<?php
include_once("BD.php");
$BD = new BD();

$pseudo = $_POST['pseudo'];
$phrase = $_POST['phrase'];

$timestamp = time();

function enregistrer($pseudo, $phrase, $timestamp) {
    global $BD;
    try {
        $sql = "INSERT INTO chatJS (contenu, userPseudo, horaire) VALUES (:contenu, :userPseudo, :horaire)";
        $stmt = $BD->getBD()->prepare($sql);

        $stmt->bindParam(':contenu', $pseudo);
        $stmt->bindParam(':userPseudo', $phrase);
        $stmt->bindParam(':horaire', $timestamp);

        $stmt->execute();

    } catch (PDOException $e) {
        die("Erreur d'insertion dans la base de données: " . $e->getMessage());
    }
}


