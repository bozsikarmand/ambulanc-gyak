<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

function queryUserData($sessionKey, $databaseConnection)
{
    $queryUserData = "SELECT email.BelepesiEmail,
                         email.PublikusEmail,
                         szemely.Felhasznalonev, 
                         szemely.Vezeteknev, 
                         szemely.Keresztnev, 
                         szemely.Utonev, 
                         szemely.VezetekesTel, 
                         szemely.MobilTel, 
                         szemely.IRSZ, 
                         szemely.Varos, 
                         szemely.KozteruletNeve, 
                         szemely.Hazszam, 
                         szemely.Epulet, 
                  FROM email, szemely, szemelymunkamenet, munkamenet
                  WHERE szemely.ID = email.ID 
                  AND szemely.ID = szemelymunkamant.Szemely.ID 
                  AND szemelymunkamenet.MunkamenetID = munkamenet.MunkamenetID 
                  AND munkamenet.MunkamenetKulcs=:sessionkey";

$run = $databaseConnection -> prepare($queryUserData);
$run->bindValue(':sessionkey', $sessionKey);
$run->execute();
$resultSet = $run -> fetch(PDO::FETCH_ASSOC);

return $resultSet;
}