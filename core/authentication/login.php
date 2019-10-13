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
            // Beallitok egy munkamenet valtozot amiben eltarolom az email cimet
            $_SESSION["email"] = $queryLoginEmail;
            // Megkeresem azokat akiknel 2 a statusz, es atallitom 3-ra (elso belepes)
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
            
            // Frissitem a statuszt
            $updateUserStatusStatement = "UPDATE szemely p
                                          JOIN email e ON e.ID = p.ID
                                          SET p.Statusz=:stat  
                                          WHERE (p.Statusz < :stat)";
                                          
            $run = $databaseConnection -> prepare($updateUserStatusStatement);
            $run->bindValue(':stat', $status);
            $run->execute();
    
            // Az elobb a statuszt 2-rol 3-ra frissitettem.
            // Tehat eloszor leptem be. Ekkor kotelezo az adatmegadas, oda iranyitok
            $queryStatus = "SELECT szemely.Statusz as statusz, email.BelepesiEmail as le
                            FROM szemely, email
                            WHERE Statusz=:querystatus
                            AND BelepesiEmail=:loginemail";
    
            $status = 3;
    
            $run = $databaseConnection -> prepare($queryStatus);
            $run->bindValue(':querystatus', $status);
            $run->bindValue(':loginemail', $loginEmail);
            $run->execute();
            $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

            if (!empty($resultSet)) {
                header('Location: ../../protected/userprofile/add/profiledata.php');
            }

            // Ha a statusz 4, akkor megadta az adatait, am adminisztratori jovahagyasra var
            $queryStatus = "SELECT szemely.Statusz as statusz, email.BelepesiEmail as le
                            FROM szemely, email
                            WHERE Statusz=:querystatus
                            AND BelepesiEmail=:loginemail";

            $status = 4;

            $run = $databaseConnection -> prepare($queryStatus);
            $run->bindValue(':querystatus', $status);
            $run->bindValue(':loginemail', $loginEmail);
            $run->execute();
            $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

            if (!empty($resultSet)) {
                header('Location: ../../core/default/adminapproval.php');
            }

            // Ha 5 akkor jobahagytak, es belephet
            $queryStatus = "SELECT szemely.Statusz as statusz, email.BelepesiEmail as le
                            FROM szemely, email
                            WHERE Statusz=:querystatus
                            AND BelepesiEmail=:loginemail";

            $status = 5;

            $run = $databaseConnection -> prepare($queryStatus);
            $run->bindValue(':querystatus', $status);
            $run->bindValue(':loginemail', $loginEmail);
            $run->execute();
            $resultSet = $run -> fetch(PDO::FETCH_ASSOC);

            if (!empty($resultSet)) {
                header('Location: ../../protected/dashboard/adminapproval.php');
            }
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
     
     
     