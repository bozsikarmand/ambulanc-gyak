<?php

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/utils/getUserData.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function sessionRegenerateExistingMainKey($loginEmail, $databaseConnection) {
    $userID = getUserID($loginEmail, $databaseConnection);
    $newSessionKey = bin2hex(openssl_random_pseudo_bytes(50));
    $oldSessionKey = getCurrentSessionKey($userID, $databaseConnection);

    $updateSessionData = "UPDATE munkamenet
                          SET MunkamenetKulcs = :newSessionKey 
                          WHERE MunkamenetKulcs = :oldSessionKey)";
    $run = $databaseConnection->prepare($updateSessionData);
    
    $run->bindValue(':newSessionKey', $newSessionKey);
    $run->bindValue(':sessionKey', $oldSessionKey);

    $run->execute();
}