<?php

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ("../database/config.php");

session_start();

if (isset($_GET['token'])) {
    $token = isset($_GET['token']);
    $queryGetToken = "SELECT HitelesitoKod as token 
                      FROM szemely
                      WHERE HitelesitoKod=:token
                      LIMIT 1";
    
    $run = $databaseConnection->prepare($queryGetToken);
    $run->bindValue(':token', $token, PDO::PARAM_STR);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    if ($resultSet['token'] > 0) {
        $stat = 2;
        $updateUserStatusStatement = "UPDATE szemely 
                                      SET Statusz=:stat 
                                      WHERE HitelesitoKod=:token";
        
        $run = $databaseConnection->prepare($updateUserStatusStatement);
        $run->bindValue(':stat', $stat, PDO::PARAM_INT);
        $run->bindValue(':token', $token, PDO::PARAM_STR);
        $run->execute();

        // A felhasznalo osszes szukseges adatanak lekerese
        $queryGetCurrentUserInfo = "SELECT ID as id, Felhasznalonev as user, Statusz as stat 
                                    FROM szemely 
                                    WHERE HitelesitoKod=:token";

        $run = $databaseConnection->prepare($queryGetCurrentUserInfo);
        $run->bindValue(':token', $token, PDO::PARAM_STR);
        $run->execute();
        $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

        if (($resultSet['id'] && 
             $resultSet['user'] && 
             $resultSet['stat']) > 0) {
            // Munkamenet adatok beallitasa
            $_SESSION['id'] = $resultSet['id'];
            $_SESSION['user'] = $_SESSION['user'];
            $_SESSION['stat'] = $_SESSION['stat'];
            $_SESSION['message'] = "Sikeresen megerositetted email cimed! A rendszerbe valo bejelentkezeshez atiranyitunk a bejelentkezesi feluletre!";
            header('Location: ../../login.php');
            exit(0);
        } 
    } else {
        echo "A felhasznalo nem talalhato!";
    }
} else {
    echo "A keresben nem talaltam tokent parameterkent!";
}