<?php

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

session_start();

require_once ("../database/config.php");

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
                        WHERE BelepesiEmail=:belepesiemail";

    $run = $databaseConnection -> prepare($queryLoginEmail);
    $run->bindValue(':belepesiemail', $loginEmail, PDO::PARAM_STR);
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
     * Szemelyjog tablaba ID-hoz jogid
     * Email tablaba: belepo email
     * Szemely tablaba: felhnev, statusz, hitelesitokod
     *
     */

    // Jog (2)
    $insertPermission = "INSERT INTO szemelyjog (SzemelyID, JogID) VALUES (:lastUserID, :permissionID)";
    $run = $databaseConnection->prepare($insertPermission);

    $lastUserID = $databaseConnection->lastInsertId();
    $permissionID = 2;

    $run->bindValue(':lastUserID', $lastUserID);
    $run->bindValue(':permissionID',$permissionID);
    $resultSet = $run->execute();

    // Belepo email
    $insertLoginEmail = "INSERT INTO email (BelepesiEmail) VALUES (:loginemail)";
    $run = $databaseConnection->prepare($insertLoginEmail);

    $run->bindValue(':loginemail', $loginEmail);
    $resultSet = $run->execute();

    // Felhnev
    $insertUsername = "INSERT INTO szemely (Felhasznalonev) VALUES (:username)";
    $run = $databaseConnection->prepare($insertUsername);

    $run->bindValue(':username', $username);
    $resultSet = $run->execute();

    // Statusz
    $insertStatus = "INSERT INTO szemely (Statusz) VALUES (:stat)";
    $run = $databaseConnection->prepare($insertStatus);

    $stat = 1;

    $run->bindValue(':status', $stat);
    $resultSet = $run->execute();

    // HitelesitoKod
    $insertToken = "INSERT INTO szemely (HitelesitoKod) VALUES (:token)";
    $run = $databaseConnection->prepare($insertToken);

    $run->bindValue(':token', $token);
    $resultSet = $run->execute();

    if ($resultSet) {
        header("Location: thanks.php");
    } else {
        header("Location: fail.php");
    }
}

