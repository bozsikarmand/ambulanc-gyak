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

function sessionGetToken($loginEmail, $databaseConnection) {
    $resultSet = getToken($loginEmail, $databaseConnection);

    return $resultSet;
}

function sessionGetRoleInfo($loginEmail, $databaseConnection) {
    $resultSet = getRoleInfo($loginEmail, $databaseConnection);

    return $resultSet;
}

function sessionGetUserImage($loginEmail, $databaseConnection) {
    $resultSet = getUserImage($loginEmail, $databaseConnection);

    return $resultSet;
}

function sessionGetUserLoginTimeStamp($loginEmail, $databaseConnection) {
    $resultSet = getUserLoginTimeStamp($loginEmail, $databaseConnection);

    return $resultSet;
}