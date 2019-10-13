<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ("../database/config.php");

/**
 * 
 * Statusz: 
 * 0: Torolt felhasznalo, 
 * 1: Meg nincs megerositve az email cime, 
 * 2: Mar megerositesre kerult az email cime, am meg nem lepett be elso alkalommal es nem adta meg az adatait,
 * 3: Elso alkalommal lepett be
 * 4: Megadta az adatait, am meg adminisztratori jovahagyasra var
 * 5: Elfogadasra kerult az adminisztrator altal, hasznalatba veheti a rendszert
 * 
 */
  
 // Mar megerositesre kerult az email cime, am meg nem lepett be elso alkalommal es nem adta meg az adatait,
if (isset($_POST['button-login'])) {
    if (empty($_POST['inputLoginEmail'])) {
        $error['inputLoginEmail'] = 'A belépési email cim megadása kötelező!';
        echo 'A belépési email cim megadása kötelező!';
    }
    if (empty($_POST['inputPassword'])) {
        $error['inputPassword'] = 'Jelszó megadása kötelező';
        echo 'Jelszó megadása kötelező';
    }

    $loginEmail = $_POST['inputLoginEmail'];
    $password = $_POST['inputPassword'];

    $queryLoginEmail = "SELECT BelepesiEmail as le
                        FROM email
                        WHERE BelepesiEmail=:loginemail";

    $run = $databaseConnection -> prepare($queryLoginEmail);
    $run->bindValue(':loginemail', $loginEmail);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    print_r($resultSet);

    if (!empty($resultSet['le'])) {
        $queryUserPassword = "SELECT szemely.ID as userid, jelszo.ID as pid, jelszo.JelszoHash as ph
                              FROM szemely, jelszo
                              WHERE szemely.ID = jelszo.ID";
        
        $run = $databaseConnection -> prepare($queryUserPassword);
        $run->execute();
        $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

        print_r($resultSet);

        if (password_verify($password, $resultSet['ph'])) {
            $queryStatus = "SELECT szemely.Statusz as statusz, email.BelepesiEmail as le
                            FROM szemely, email
                            WHERE Statusz=:querystatus
                            AND BelepesiEmail=:loginemail";
    
            $status = 2;
    
            $run = $databaseConnection -> prepare($queryStatus);
            $run->bindValue(':querystatus', $status);
            $run->bindValue(':loginemail', $loginEmail);
            $run->execute();
            $resultSet = $run -> fetch(PDO::FETCH_ASSOC);
            
            $status = 3;
                
            $updateUserStatusStatement = "UPDATE szemely p, email e
                                          SET p.Statusz=:stat  
                                          WHERE p.ID = e.ID 
                                          AND e.BelepesiEmail=:loginemail";
                                          
            $run = $databaseConnection -> prepare($updateUserStatusStatement);
            $run->bindValue(':stat', $status);
            $run->bindValue(':loginemail', $loginEmail);
            $run->execute();
    
            //echo "OK";
            header('Location: ../../protected/userprofile/add/userdata.php');

        } else {
            $error['emailOrPassDoesNotExist'] = "A megadott email cimmel regisztrált felhasználó nem létezik rendszerünkben vagy a megadott jelszó hibás!";
            echo "A megadott email cimmel regisztrált felhasználó nem létezik rendszerünkben vagy a megadott jelszó hibás!";
        }
    } else {
        echo "Nem talalom a megadott email cimu felhasznalot!";
    }
} else {
    echo "Nem nyomtad meg!";
}
     
     
     