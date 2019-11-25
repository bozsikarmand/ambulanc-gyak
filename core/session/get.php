<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/utils/getUserData.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function sessionGetName($loginEmail, $databaseConnection) {
    $resultSet = getName($loginEmail, $databaseConnection);
    
    return $resultSet;
}

function sessionGetInfo($loginEmail, $databaseConnection) {
    $resultSet = getInfo($loginEmail, $databaseConnection);
    
    return $resultSet;
}
