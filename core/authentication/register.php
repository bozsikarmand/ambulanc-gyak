<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ("../database/config.php");
require_once ("../mail/verificationmailsender.php");

if (isset($_POST['button-sign-up'])) {
    if (empty($_POST['inputUsername'])) {
        $error['inputUsername'] = 'A felhasználónév megadása kötelező!';
    }
    if (empty($_POST['inputLoginEmail'])) {
        $error['inputLoginEmail'] = 'A belépési email cim megadása kötelező!';
    }
    if (empty($_POST['inputPassword'])) {
        $error['inputPassword'] = 'Jelszó megadása kötelező';
    }
    if (empty($_POST['inputPasswordConfirmation'])) {
        $error['inputPasswordConfirmation'] = 'A jelszó újbóli megadása kötelező';
    }
    if (isset($_POST['inputPassword']) &&
        $_POST['inputPassword'] !== $_POST['inputPasswordConfirmation']) {
        $error['passwordsDoNotMatch'] = 'A megadott két jelszó nem egyezik!';
    }

    $username = $_POST['inputUsername'];
    $loginEmail = $_POST['inputLoginEmail'];

    $queryUsername = "SELECT Felhasznalonev as un 
                      FROM szemely
                      WHERE Felhasznalonev=:username";

    $run = $databaseConnection -> prepare($queryUsername);
    $run->bindValue(':username', $username, PDO::PARAM_STR);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    if ($resultSet['un'] > 0) {
        $error['usernameAlreadyExists'] = "A megadott felhasználónév már létezik rendszerünkben!";
    }
    $queryLoginEmail = "SELECT BelepesiEmail as le
                        FROM email
                        WHERE BelepesiEmail=:loginemail";

    $run = $databaseConnection -> prepare($queryLoginEmail);
    $run->bindValue(':loginemail', $loginEmail, PDO::PARAM_STR);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    if ($resultSet['le'] > 0) {
        $error['emailAlreadyExists'] = "A belépési email cim már létezik rendszerünkben!";
    }

    $token = bin2hex(openssl_random_pseudo_bytes(50));
    $password = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
 
    /**
     * 
     * Uj felhasznalo beillesztese a tablaba
     * Elszor a kapcslodo tablak ertekeit allitom be, majd vegul adom hozza a felhasznalot, hogy ne sertsem meg a kulcsfelteteleket
     * 
     * Kell:
     *
     * Email tablaba: belepo email
     * Jelszo tablaba: hash
     * Szemelyjog tablaba ID-hoz jogid
     * Szemely tablaba: felhnev, statusz, hitelesitokod
     *
     */

    // Belepo email
    $insertLoginEmail = "INSERT INTO email (BelepesiEmail) VALUES (:loginemail)";
    $run = $databaseConnection->prepare($insertLoginEmail);

    $run->bindValue(':loginemail', $loginEmail);
    $resultSet = $run->execute();

    // Jelszo hash
    $insertPasswordHash = "INSERT INTO jelszo (JelszoHash) VALUES (:passwordhash)";
    $run = $databaseConnection->prepare($insertPasswordHash);

    $run->bindValue(':passwordhash', $password);
    $resultSet = $run->execute();

    // Jog (Alapbol: 2)
    $insertPermission = "INSERT INTO szemelyjog (SzemelyID, JogID) VALUES (:lastUserID, :permissionID)";
    $run = $databaseConnection->prepare($insertPermission);

    $lastUserID = $databaseConnection->lastInsertId();
    $permissionID = 2;

    $run->bindValue(':lastUserID', $lastUserID);
    $run->bindValue(':permissionID', $permissionID);
    $resultSet = $run->execute();

    // Felhnev, Statusz, Hitelesitokod egyben mivel a tablaban is egy helyen szerepelnek
    $insertUsernameStatusToken = "INSERT INTO szemely (Felhasznalonev, Statusz, HitelesitoKod) VALUES (:username, :stat, :token)";
    $run = $databaseConnection->prepare($insertUsernameStatusToken);

    $run->bindValue(':username', $username);

    /** 
     * 
     * Statusz: 
     * 0: Torolt felhasznalo, 
     * 1: Meg nincs megerositve az email cime, 
     * 2: Mar megerositesre kerult az email cime, am meg nem lepett be elso alkalommal es nem adta meg az adatait,
     * 3: Megadta az adatait, am meg adminisztratori jovahagyasra var
     * 4: Elfogadasra kerult az adminisztrator altal, hasznalatba veheti a rendszert
     * 
     */
    $stat = 1;

    $run->bindValue(':stat', $stat);
    $run->bindValue(':token', $token);

    $resultSet = $run->execute();

    // Email megerositese
    $queryToken = "SELECT HitelesitoKod as vt 
                   FROM szemely
                   WHERE HitelesitoKod=:token";
                   
    $run = $databaseConnection -> prepare($queryToken);
    $run->bindValue(':token', $token);

    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

    if ($resultSet['vt'] > 0) {
        $sentMail = sendVerificationMail($email, $token);
        if ($sentMail) {
            echo "Az email cimedet erositsd meg a kikuldott levelunkben talahato link segitsegevel!";
        } else {
            echo "Az email kuldese soran hiba lepett fel!";
        }
    } 
    else {
        header("Location: fail.php");
    }
}