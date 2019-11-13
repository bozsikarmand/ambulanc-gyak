<?php

require_once ("../../database/config.php");

function getToken($username, $loginEmail) {
    // Email megerositese
    $queryToken = "SELECT HitelesitoKod as vt 
                   FROM szemely, email
                   WHERE HitelesitoKod=:querytoken
                   AND Felhasznalonev=:username
                   AND BelepesiEmail=:loginEmail";
    
    $run = $databaseConnection -> prepare($queryToken);
    $run->bindValue(':querytoken', $token);
    $run->bindValue(':username', $username);
    $run->bindValue(':loginEmail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    // Eroforras felszabaditasa
    unset($run);
    
    return $resultSet['vt'];
}