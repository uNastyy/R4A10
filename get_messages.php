<?php
require("BD.php");
$BD = new BD();

function getMessages()
{
    global $BD;
    $req = $BD->getBD()->prepare("SELECT idMessage, contenu, userPseudo, DATE_FORMAT(FROM_UNIXTIME(horaire), '%d/%m/%Y %H:%i:%s') as horaire FROM chatJS ORDER BY idMessage ASC");
    $req->execute();
    return $req->fetchAll();
}
$results = getMessages();

foreach ($results as $result) {
    echo '<div class="message">';
    echo '<p class="contenu">' . htmlspecialchars($result["contenu"]) . '</p>';
    echo '<span class="userPseudo">' . htmlspecialchars($result["userPseudo"]) . '</span> | ';
    echo '<span class="horaire">' . htmlspecialchars($result["horaire"]) . '</span>';
    echo '</div>';
}