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
     $publicplacetrait = $_POST['listPublicPlaceTrait'];
     $housenumber = $_POST['inputPublicPlaceTrait'];
     $buildingletter = $_POST['inputBuildingLetter'];
     $stat = 4;
     
     $addUserData = "UPDATE szemely p
                     JOIN email e 
                     ON e.ID = p.ID
                     SET p.Vezeteknev = :firstname,
                         p.Keresztnev = :lastname.
                         p.Utonev = :middlename,
                         p.VezetekesTel = :landlinetel,
                         p.MobilTel = :mobiletel,
                         p.IRSZ = :zipcode,
                         p.Varos = :city,
                         p.KozteruletNeve = :publicplacename,
                         p.KozteruletJellege = :publicplacetrait,
                         p.Hazszam = :housenumber,
                         p.Epulet = :buildingletter
                         p.Statusz = :stat
                     WHERE e.BelepesiEmail = :sessionloginemail";

     // A session-ben atadott email cim
     $sessionLoginEmail = $_SESSION['email'];
     
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
     $run->bindValue(':stat', $stat);
     $run->bindValue(':sessionloginemail', $sessionLoginEmail);
     $run->execute();
     $resultSet = $run -> fetch(PDO::FETCH_ASSOC);
     
     if ($resultSet) {
         header('Location: ../../default/frontend/adminapproval.php');
     }
}