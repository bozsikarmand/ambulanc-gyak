<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/mail/passwordresetmailsender.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/timezone.php");

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

if ($_POST['button-password-recovery']) {
    $token = bin2hex(openssl_random_pseudo_bytes(50));
    $loginemail = $_POST['inputLoginEmail'];

    $updateToken = "UPDATE szemely 
                    JOIN email 
                    SET szemely.HitelesitoKod=:updatetoken
                    WHERE szemely.ID = email.ID
                    AND email.BelepesiEmail=:loginemail";

    $run = $databaseConnection -> prepare($updateToken);
    $run->bindValue(':updatetoken', $token);
    $run->bindValue(':loginemail', $loginemail);
    $run->execute();

    $queryToken = "SELECT HitelesitoKod as vt 
                   FROM szemely
                   WHERE HitelesitoKod=:querytoken";
                        
    $run = $databaseConnection -> prepare($queryToken);
    $run->bindValue(':querytoken', $token);
    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);
        
    // Eroforras felszabaditasa
    unset($run);
    
    if (!empty($resultSet['vt'])) {
        $sentMail = sendPasswordReset($loginemail, $token);
        if ($sentMail) {
            echo "Allitsd be uj jelszavadat a kikuldott levelunkben talahato link segitsegevel!";
        } else {
            echo "Az email kuldese soran hiba lepett fel!";
        }
    } else {
        header("Location: fail.php");
    }
}