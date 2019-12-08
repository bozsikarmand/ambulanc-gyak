<?php

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/utils/getUserData.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function sessionCreateDatabaseEntry($loginEmail, $databaseConnection) {
    $sessionStartTime = date('Y-m-d H:i:s');
    $sessionLive = true;
    $IP = getIPAddress();
    $UA = getBrowser();
    $sessionKey = bin2hex(openssl_random_pseudo_bytes(50));

    $insertSessionData = "INSERT INTO munkamenet (MunkamenetKezdete, Aktiv, IP, UserAgent, MunkamenetKulcs) 
                                 VALUES (:sessionStartTime, :sessionLive, :IP, :UA, :sessionKey)";
    $run = $databaseConnection->prepare($insertSessionData);
        
    $run->bindValue(':sessionStartTime', $sessionStartTime);
    $run->bindValue(':sessionLive', $sessionLive);
    $run->bindValue(':IP', $IP);
    $run->bindValue(':UA', $UA);
    $run->bindValue(':sessionKey', $sessionKey);

    $run->execute();

    $insertSessionUserLinkData = "INSERT INTO szemelymunkamenet (SzemelyID, MunkamenetID) 
                                         VALUES (:userID, :sessionID)";
    $run = $databaseConnection->prepare($insertSessionUserLinkData);

    $sessionID = $databaseConnection->lastInsertId();
    $userID = getUserID($loginEmail, $databaseConnection);

    $run->bindValue(':userID', $userID);
    $run->bindValue(':sessionID', $sessionID);

    $resultSet = $run->execute();
    return $resultSet;
}

function sessionCheckPrivilege($loginEmail, $databaseConnection) {
    $sessionGetUserID = getUserID($loginEmail, $databaseConnection);

    $querySessionPrivilege = "SELECT szemelyjog.JogID as privid 
                              FROM szemelyjog, szemely
                              WHERE szemelyjog.SzemelyID = :sessionGetUserID";
    
    $run = $databaseConnection->prepare($querySessionPrivilege);

    $run->bindValue(':sessionGetUserID', $sessionGetUserID);
    
    $resultSet = $run->fetchColumn();
    echo $resultSet;
}

function getSessionKey($loginEmail, $databaseConnection)
{
    $sessionGetUserID = getUserID($loginEmail, $databaseConnection);
    $resultSet = getCurrentSessionKey($sessionGetUserID, $databaseConnection);
    return $resultSet;
}

function getSessionUsername($loginEmail, $databaseConnection)
{
    $resultSet = getCurrentSessionUsername($loginEmail, $databaseConnection);
    return $resultSet;
}