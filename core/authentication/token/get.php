<?php 

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function getToken($username, $loginEmail) {
    // Email megerositese
    $queryToken = "SELECT HitelesitoKod as vt 
                   FROM szemely, email
                   WHERE Felhasznalonev=:username
                   AND BelepesiEmail=:loginEmail";
    
    $run = $databaseConnection -> prepare($queryToken);
    $run->bindValue(':username', $username);
    $run->bindValue(':loginEmail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    // Eroforras felszabaditasa
    unset($run);
    
    return $resultSet['vt'];
}