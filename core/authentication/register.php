<?php

ob_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/timezone.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/mail/sender.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/getURL.php");

if (isset($_POST['button-sign-up'])) {
    if ($_POST['agree-tos'] == 'Yes' && $_POST['agree-pp'] == 'Yes') {
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
     
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = '6LedcL0UAAAAAJyjTUSUNEYaue5pIU-Evp_v8w9C';
        $recaptcha_response = $_POST['recaptcha_response'];

        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha);

        if ($recaptcha->score >= 0.5) {
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
             * Szemely tablaba: felhnev, statusz, hitelesitokod, regisztracio idopontja, utolso belepes idopontja 
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
        
            // Jog (Alapbol: 1)
            $insertPermission = "INSERT INTO szemelyjog (SzemelyID, JogID) VALUES (:lastUserID, :permissionID)";
            $run = $databaseConnection->prepare($insertPermission);
        
            $lastUserID = $databaseConnection->lastInsertId();
            $permissionID = 1;
        
            $run->bindValue(':lastUserID', $lastUserID);
            $run->bindValue(':permissionID', $permissionID);
            $resultSet = $run->execute();
        
            // Felhnev, Statusz, Hitelesitokod egyben mivel a tablaban is egy helyen szerepelnek
            // Illetve meg regisztracio idopontja, utolso belepes idopontja
            $insertUsernameStatusToken = "INSERT INTO szemely (Felhasznalonev, Statusz, HitelesitoKod, RegisztracioIdopontja) VALUES (:username, :stat, :token, :regtime)";
            $run = $databaseConnection->prepare($insertUsernameStatusToken);
        
            $run->bindValue(':username', $username);
        
            /**
             * 
             * Statusz: 
             * 0: Torolt felhasznalo, 
             * 1: Meg nincs megerositve az email cime, 
             * 2: Mar megerositesre kerult az email cime, am meg nem lepett be elso alkalommal es nem adta meg az adatait,
             * 3: Elso alkalommal lepett be
             * 4: Megadta az adatait, am meg a kep megadasa kell 
             * 5: Megadta a kepet, adminisztratori jovahagyasra var
             * 6: Elfogadasra kerult az adminisztrator altal, hasznalatba veheti a rendszert
             * 
             */
            
            $stat = 1;
        
            $run->bindValue(':stat', $stat);
            $run->bindValue(':token', $token);
        
            $regtime = date('Y-m-d H:i:s');
        
            $run->bindValue(':regtime', $regtime);
        
            $resultSet = $run->execute();
            
            $subject = 'Regisztráció megerősitése';
            $body = '<!DOCTYPE html>
                    <html lang="hu">

                    <head>
                        <meta charset="UTF-8">
                        <title>Regisztráció megerősitése</title>
                        <style>
                        .wrapper {
                            padding: 10px;
                            color: #000;
                            font-size: 1.4em;
                        }
                        a {
                            background: #dd3333;
                            text-decoration: none;
                            padding: 8px 10px;
                            color: #fff;
                        }
                        </style>
                    </head>

                    <body>
                        <div class="wrapper">
                        <p>Koszonjuk hogy regisztraltal oldalunkon! Email cimed megerositesehez kattints erre a linkre:</p>
                        <a href="https://ambulanc.bozsikarmand.hu/core/mail/verifyemail.php?token=' . $token . '">Email cim megerositese!</a>
                        </div>
                    </body>
                    </html>';

            $sentMail = sendEmail($loginEmail, $subject, $body);
            
            if ($sentMail) {
                header("Location:" . getURL() . "/core/default/frontend/verifyemail.php");
            } else {
                echo "Az email kuldese soran hiba lepett fel!";
            }
        } else {
            echo "Recaptcha error!";
        }
    } else {
        echo "A nyilatkozatok elfogadasa kotelezo!"; 
    }
}

ob_end_clean();