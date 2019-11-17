<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/utils/getUserData.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function sessionCreateDatabaseEntry($loginEmail, $databaseConnection) {
    $sessionStartTime = date('Y-m-d H:i:s');
    $sessionLive = true;
    $IP = getIPAddress();
    $UA = getBrowser();
    $sessionKey = session_id();

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

function sessionUserLinkCreateDatabaseEntry($loginEmail, $databaseConnection) {
    $userID = getUserID($loginEmail, $databaseConnection);
    $sessionID = $databaseConnection->lastInsertId();
    
    $insertSessionUserLinkData = "INSERT INTO szemelymunkamenet (SzemelyID, MunkamenetID) 
                                         VALUES (:userID, :sessionID)";
    $run = $databaseConnection->prepare($insertSessionData);
        
    $run->bindValue(':userID', $sessionStartTime);
    $run->bindValue(':sessionLive', $sessionLive);
    $run->bindValue(':IP', $IP);
    $run->bindValue(':UA', $UA);
    $run->bindValue(':sessionKey', $sessionKey);

    $resultSet = $run->execute();

    return $resultSet;
}

