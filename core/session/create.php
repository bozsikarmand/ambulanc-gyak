<?php

require_once ("utils/getUserData.php");

function sessionCreateDatabaseEntry($loginEmail) {
    $sessionStartTime = date('Y-m-d H:i:s');
    //$userID = getUserID($loginEmail);
    $sessionLive = true;
    $IP = getIPAddress();
    $UA = getBrowser();
    $sessionKey = session_create_id();

    $insertSessionData = "INSERT INTO munkamenet (MunkamenetKezdete, Aktiv, IP, UserAgent, MunkamenetKulcs) 
                                 VALUES (:sessionStartTime, :sessionLive, :IP, :UA, :sessionKey)";
    $run = $databaseConnection->prepare($insertSessionData);
        
    $run->bindValue(':sessionStartTime', $sessionStartTime);
    $run->bindValue(':sessionLive', $sessionLive);
    $run->bindValue(':IP', $IP);
    $run->bindValue(':UA', $UA);
    $run->bindValue(':sessionKey', $sessionKey);

    $resultSet = $run->execute();

    return $resultSet;
}

