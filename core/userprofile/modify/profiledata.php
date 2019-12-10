<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$loginEmail = $_SESSION["email"];

function updateProfileData($databaseConnection, $newloginEmail, $publicEmail, $username, $lastname, $firstname, $middlename, $landlinetel, $mobiletel, $zipcode, $city, $publicplacename, $publicplacetrait, $housenumber, $building, $loginEmail) {
    $updateUserData = "UPDATE email, szemely
                   SET   email.BelepesiEmail = :newloginemail,
                         email.PublikusEmail = :publicemail,
                         szemely.Felhasznalonev = :username, 
                         szemely.Vezeteknev = :lastname, 
                         szemely.Keresztnev = :firstname, 
                         szemely.Utonev = :middlename, 
                         szemely.VezetekesTel = :landlinetel, 
                         szemely.MobilTel = :mobiletel, 
                         szemely.IRSZ = :zipcode, 
                         szemely.Varos = :city, 
                         szemely.KozteruletNeve = :publicplacename,
                         szemely.KozteruletJellege = :publicplacetrait, 
                         szemely.Hazszam = :housenumber, 
                         szemely.Epulet = :building, 
                  WHERE szemely.ID = email.ID 
                  AND BelepesiEmail=:loginemail";

    $run = $databaseConnection -> prepare($updateUserData);

    $run->bindValue(':newloginemail', $newloginEmail);
    $run->bindValue(':publicemail', $publicEmail);
    $run->bindValue(':username', $username);
    $run->bindValue(':lastname', $lastname);
    $run->bindValue(':firstname', $firstname);
    $run->bindValue(':middlename', $middlename);
    $run->bindValue(':landlinetel', $landlinetel);
    $run->bindValue(':mobiletel', $mobiletel);
    $run->bindValue(':zipcode', $zipcode);
    $run->bindValue(':city', $city);
    $run->bindValue(':publicplacename', $publicplacename);
    $run->bindValue(':publicplacetrait', $publicplacetrait);
    $run->bindValue(':housenumber', $housenumber);
    $run->bindValue(':building', $building);
    $run->bindValue(':loginemail', $loginEmail);

    $run->execute();
    $resultSet = $run -> fetch(PDO::FETCH_ASSOC);
}
