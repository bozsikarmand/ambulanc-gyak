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
  
if (isset($_POST['button-login'])) {
    if (empty($_POST['inputLoginEmail'])) {
        $error['inputLoginEmail'] = 'A belépési email cim megadása kötelező!';
    }
    if (empty($_POST['inputPassword'])) {
        $error['inputPassword'] = 'Jelszó megadása kötelező';
    }

    $loginEmail = $_POST['inputLoginEmail'];
    $password = $_POST['inputPassword'];

    $queryLoginEmail = "SELECT BelepesiEmail as le
                        FROM email
                        WHERE BelepesiEmail=:loginemail";

    $queryUserPassword = "SELECT szemely.ID as userid, jelszo.ID as pid, jelszo.JelszoHash as ph
                          FROM szemely, jelszo
                          WHERE szemely.ID = jelszo.ID";

    $run = $databaseConnection -> prepare($queryLoginEmail);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    if (password_verify($password, $resultSet['ph'])) {
        $queryStatus = "SELECT Statusz as statusz
                        FROM szemely
                        WHERE Statusz=:querystatus
                        AND BelepesiEmail=:loginemail";

        $status = 2;

        $run = $databaseConnection -> prepare($queryStatus);
        $run->bindValue(':querystatus', $status);
        $run->bindValue(':loginemail', $queryLoginEmail);
        $run->execute();
        $resultSet = $run -> fetch(PDO::FETCH_ASSOC);
        
        if ($resultSet['statusz']) {
            header('Location: /userprofile/add/userdata.php');
        }
    } else {
        $error['emailDoesNotExist'] = "A megadott email cimmel regisztrált felhasználó nem létezik rendszerünkben!";
    }
}
     
     
     