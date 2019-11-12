<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ("../database/config.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $queryGetToken = "SELECT HitelesitoKod as token 
                      FROM szemely
                      WHERE HitelesitoKod=:token
                      LIMIT 1";
    
    $run = $databaseConnection->prepare($queryGetToken);
    $run->bindValue(':token', $token, PDO::PARAM_STR);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    if (!empty($resultSet['token'])) {
        /*$stat = 2;
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

        // Eroforrasok felszabaditasa
        unset($run);

        if ($resultSet['id'] >= 1 && !empty($resultSet['user'])) {
            // Munkamenet adatok beallitasa
            $_SESSION['id'] = $resultSet['id'];
            $_SESSION['user'] = $_SESSION['user'];
            $_SESSION['stat'] = $_SESSION['stat'];
            $_SESSION['message'] = "Sikeresen megerositetted email cimed! A rendszerbe valo elso bejelentkezeshez atiranyitottunk a bejelentkezesi feluletre!";
            header('Location: ../../login.php');
        }
        else {
            echo "A felhasznalo nem talalhato!";
        }*/

        
    }
    else {
        echo "A token nem egyezik vagy nem talalhato!";
    }
}