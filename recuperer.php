<?php
require("BD.php");
$BD = new BD();

function getLast10()
{
    global $BD;
    $req = $BD->getBD()->prepare("SELECT idMessage, contenu, userPseudo, DATE_FORMAT(FROM_UNIXTIME(horaire), '%d/%m/%Y %H:%i:%s') as horaire FROM (SELECT * FROM chatJS ORDER BY idMessage DESC LIMIT 10) sub ORDER BY idMessage ASC");
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode(getLast10());