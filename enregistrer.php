<?php
include_once("BD.php");
$BD = new BD();

$pseudo = $_GET['username']; 
$phrase = $_GET['sendmessage'];

$timestamp = time();
global $BD;
try {
    $sql = "INSERT INTO chatJS (contenu, userPseudo, horaire) VALUES (:contenu, :userPseudo, :horaire)";
    $stmt = $BD->getBD()->prepare($sql);

    $stmt->bindParam(':contenu', $phrase);
    $stmt->bindParam(':userPseudo', $pseudo);
    $stmt->bindParam(':horaire', $timestamp);

    $stmt->execute();

} catch (PDOException $e) {
    echo "<script>alert('Erreur d'insertion :" . $e->getMessage() . "');</script>";
}
