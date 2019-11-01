<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", "1"); 
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

require_once ("../../database/config.php");

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

if (isset($_POST['button-request-admin-approval'])) {
     $lastname = $_POST['inputLastName'];
     $firstname = $_POST['inputFirstName'];
     $middlename = $_POST['inputMiddleName'];
     $landlinetel = $_POST['inputLandlineTel'];
     $mobiletel = $_POST['inputMobileTel'];
     $zipcode = $_POST['inputZIPCode'];
     $city = $_POST['inputCity'];
     $publicplacename = $_POST['inputPublicPlaceName'];
     $publicplacetrait = $_POST['inputPublicPlaceTrait'];
     $housenumber = $_POST['inputHouseNumber'];
     $buildingletter = $_POST['inputBuildingLetter'];
     $stat = 3;
     $newStat = 4; 
     

     // A session-ben atadott email cim
     $sessionLoginEmail = $_SESSION['email'];
     // A sessionben atadott felhasznalonev
     //$sessionUsername = $_SESSION['username'];
     
     $addUserData = "UPDATE szemely
                     JOIN email 
                     ON email.ID = szemely.ID
                     SET szemely.Vezeteknev = :firstname,
                         szemely.Keresztnev = :lastname,
                         szemely.Utonev = :middlename,
                         szemely.VezetekesTel = :landlinetel,
                         szemely.MobilTel = :mobiletel,
                         szemely.IRSZ = :zipcode,
                         szemely.Varos = :city,
                         szemely.KozteruletNeve = :publicplacename,
                         szemely.KozteruletJellege = :publicplacetrait,
                         szemely.Hazszam = :housenumber,
                         szemely.Epulet = :buildingletter,
                         szemely.Statusz = :newStat
                   WHERE szemely.Vezeteknev IS NULL
                   AND szemely.Keresztnev IS NULL
                   AND szemely.Utonev IS NULL
                   AND szemely.VezetekesTel IS NULL
                   AND szemely.MobilTel IS NULL
                   AND szemely.IRSZ IS NULL
                   AND szemely.Varos IS NULL
                   AND szemely.KozteruletNeve IS NULL
                   AND szemely.KozteruletJellege IS NULL
                   AND szemely.Hazszam IS NULL
                   AND szemely.Epulet IS NULL
                   AND szemely.Statusz = :stat
                   AND email.BelepesiEmail = :sessionloginemail";
     
    $run = $databaseConnection -> prepare($addUserData);
    $run->bindValue(':firstname', $firstname);
    $run->bindValue(':lastname', $lastname);
    $run->bindValue(':middlename', $middlename);
    $run->bindValue(':landlinetel', $landlinetel);
    $run->bindValue(':mobiletel', $mobiletel);
    $run->bindValue(':zipcode', $zipcode);
    $run->bindValue(':city', $city);
    $run->bindValue(':publicplacename', $publicplacename);
    $run->bindValue(':publicplacetrait', $publicplacetrait);
    $run->bindValue(':housenumber', $housenumber);
    $run->bindValue(':buildingletter', $buildingletter);
    $run->bindValue(':newStat', $newStat);
    $run->bindValue(':stat', $stat);
    $run->bindValue(':sessionloginemail', $sessionLoginEmail);
    $exitcode = $run->execute();
            
    if ($exitcode) {
        header('Location: ../../default/frontend/profilepicture.php');
        //header('Location: ../../default/frontend/adminapproval.php');
    }
}